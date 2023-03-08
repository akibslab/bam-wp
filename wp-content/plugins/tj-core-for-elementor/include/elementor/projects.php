<?php

namespace TJCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Elementor widget for Projects.
 *
 */
class TJ_Projects extends Widget_Base {

  /**
   * Retrieve the widget name.
   *
   */
  public function get_name() {
    return 'tj-projects';
  }

  /**
   * Retrieve the widget title.
   *
   */
  public function get_title() {
    return __('TJ Projects', 'tjcore');
  }

  /**
   * Retrieve the widget icon.
   *
   */
  public function get_icon() {
    return 'eicon-posts-masonry tj-icon';
  }


  /**
   * Widget categories.
   */
  public function get_categories() {
    return ['tjcore'];
  }

  /**
   * Widget scripts dependencies.
   */
  public function get_script_depends() {
    return ['tjcore'];
  }

  /**
   * Widget keywords.
   */
  public function get_keywords() {
    return [
      'project',
      'projects',
      'tj projects',
      'tj',
      'tj addons',
      'tjcore',
    ];
  }

  /**
   * Widget custom url.
   */
  public function get_custom_help_url() {
    return 'https://go.elementor.com/';
  }

  /**
   * Register the widget controls.
   *
   */
  protected function register_controls() {

    // layout Panel
    $this->start_controls_section(
      'tj_layout',
      [
        'label' => esc_html__('Design Layout', 'tjcore'),
      ]
    );
    $this->add_control(
      'tj_design_style',
      [
        'label' => esc_html__('Select Layout', 'tjcore'),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'layout-1' => esc_html__('Layout 1', 'tjcore'),
          'layout-2' => esc_html__('Layout 2', 'tjcore'),
          'layout-3' => esc_html__('Layout 3', 'tjcore'),
        ],
        'default' => 'layout-3',
      ]
    );
    $this->end_controls_section();

    // layout Panel
    $this->start_controls_section(
      'tj_heading',
      [
        'label' => esc_html__('Section heading', 'tjcore'),
        'condition' => [
          'tj_design_style' => ['layout-1', 'layout-3']
        ]
      ]
    );

    $this->add_control(
      'tj_title',
      [
        'label' => esc_html__('Title', 'tjcore'),
        'description' => tj_get_allowed_html_desc('intermediate'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => tj_kses('Des projets <span>résilients</span>, <br> pensés pour un monde <span>post-carbone</span>'),
        'placeholder' => esc_html__('Type section title here.', 'tjcore'),
        'label_block' => true,
      ]
    );
    $this->add_control(
      'tj_title_tag',
      [
        'label' => esc_html__('Title HTML Tag', 'tjcore'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'h1' => [
            'title' => esc_html__('H1', 'tjcore'),
            'icon' => 'eicon-editor-h1'
          ],
          'h2' => [
            'title' => esc_html__('H2', 'tjcore'),
            'icon' => 'eicon-editor-h2'
          ],
          'h3' => [
            'title' => esc_html__('H3', 'tjcore'),
            'icon' => 'eicon-editor-h3'
          ],
          'h4' => [
            'title' => esc_html__('H4', 'tjcore'),
            'icon' => 'eicon-editor-h4'
          ],
          'h5' => [
            'title' => esc_html__('H5', 'tjcore'),
            'icon' => 'eicon-editor-h5'
          ],
          'h6' => [
            'title' => esc_html__('H6', 'tjcore'),
            'icon' => 'eicon-editor-h6'
          ]
        ],
        'default' => 'h2',
      ]
    );
    $this->add_control(
      'tj_desc',
      [
        'label' => esc_html__('Description', 'tjcore'),
        'description' => tj_get_allowed_html_desc('intermediate'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => tj_kses('Découvrez nos projets en cours de réalisation et le récit des maîtres d’ouvrage que nous
        accompagnons dans leurs travaux hors du commun'),
        'placeholder' => esc_html__('Type description text here.', 'tjcore'),
        'label_block' => true,
      ]
    );
    $this->add_control(
      'tj_btn_button_show',
      [
        'label' => esc_html__('Show Button', 'tjcore'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Show', 'tjcore'),
        'label_off' => esc_html__('Hide', 'tjcore'),
        'return_value' => 'yes',
        'default' => 'yes',
        'separator' => 'before'
      ]
    );

    $this->add_control(
      'tj_btn_text',
      [
        'label' => esc_html__('Button Text', 'tjcore'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Découvrir les projets', 'tjcore'),
        'title' => esc_html__('Enter button text', 'tjcore'),
        'label_block' => true,
        'condition' => [
          'tj_btn_button_show' => 'yes'
        ],
      ]
    );
    $this->add_control(
      'tj_btn_link_type',
      [
        'label' => esc_html__('Button Link Type', 'tjcore'),
        'type' => Controls_Manager::SELECT,
        'options' => [
          '1' => 'Custom Link',
          '2' => 'Internal Page',
        ],
        'default' => '1',
        'label_block' => true,
        'condition' => [
          'tj_btn_button_show' => 'yes'
        ],
      ]
    );

    $this->add_control(
      'tj_btn_link',
      [
        'label' => esc_html__('Button link', 'tjcore'),
        'type' => Controls_Manager::URL,
        'dynamic' => [
          'active' => true,
        ],
        'placeholder' => esc_html__('https://your-link.com', 'tjcore'),
        'show_external' => false,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
          'custom_attributes' => '',
        ],
        'condition' => [
          'tj_btn_link_type' => '1',
          'tj_btn_button_show' => 'yes'
        ],
        'label_block' => true,
      ]
    );
    $this->add_control(
      'tj_btn_page_link',
      [
        'label' => esc_html__('Select Button Page', 'tjcore'),
        'type' => Controls_Manager::SELECT2,
        'label_block' => true,
        'options' => tj_get_all_pages(),
        'condition' => [
          'tj_btn_link_type' => '2',
          'tj_btn_button_show' => 'yes'
        ]
      ]
    );
    $this->end_controls_section();

    $this->start_controls_section(
      'tj_content',
      [
        'label' => esc_html__('Content', 'tjcore'),
      ]
    );
    $this->add_control(
      'show_item',
      [
        'label' => esc_html__('Show Item', 'tjcore'),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'min' => 1,
        'max' => 10,
        'step' => 1,
        'default' => 4,
        'separator' => 'before'
      ]
    );
    $this->add_control(
      'order',
      [
        'label'   => esc_html__('Order', 'bruno'),
        'type'    => \Elementor\Controls_Manager::SELECT,
        'default' => 'DESC',
        'options' => [
          'DESC'  => esc_html__('Descending', 'bruno'),
          'ASC' => esc_html__('Ascending', 'bruno'),
        ],
      ]
    );

    $this->add_control(
      'project_title_tag',
      [
        'label' => esc_html__('Project Title HTML Tag', 'tjcore'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'h1' => [
            'title' => esc_html__('H1', 'tjcore'),
            'icon' => 'eicon-editor-h1'
          ],
          'h2' => [
            'title' => esc_html__('H2', 'tjcore'),
            'icon' => 'eicon-editor-h2'
          ],
          'h3' => [
            'title' => esc_html__('H3', 'tjcore'),
            'icon' => 'eicon-editor-h3'
          ],
          'h4' => [
            'title' => esc_html__('H4', 'tjcore'),
            'icon' => 'eicon-editor-h4'
          ],
          'h5' => [
            'title' => esc_html__('H5', 'tjcore'),
            'icon' => 'eicon-editor-h5'
          ],
          'h6' => [
            'title' => esc_html__('H6', 'tjcore'),
            'icon' => 'eicon-editor-h6'
          ]
        ],
        'default' => 'h3',
        'condition' => [
          'tj_design_style' => ['layout-1', 'layout-3']
        ]
      ]
    );
    $this->add_control(
      'project2_title_tag',
      [
        'label' => esc_html__('Project Title HTML Tag', 'tjcore'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'h1' => [
            'title' => esc_html__('H1', 'tjcore'),
            'icon' => 'eicon-editor-h1'
          ],
          'h2' => [
            'title' => esc_html__('H2', 'tjcore'),
            'icon' => 'eicon-editor-h2'
          ],
          'h3' => [
            'title' => esc_html__('H3', 'tjcore'),
            'icon' => 'eicon-editor-h3'
          ],
          'h4' => [
            'title' => esc_html__('H4', 'tjcore'),
            'icon' => 'eicon-editor-h4'
          ],
          'h5' => [
            'title' => esc_html__('H5', 'tjcore'),
            'icon' => 'eicon-editor-h5'
          ],
          'h6' => [
            'title' => esc_html__('H6', 'tjcore'),
            'icon' => 'eicon-editor-h6'
          ]
        ],
        'default' => 'h2',
        'condition' => [
          'tj_design_style' => 'layout-2'
        ]
      ]
    );
    $this->end_controls_section();

    // TAB_STYLE
    $this->start_controls_section(
      'pro_heading',
      [
        'label' => __('Heading', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'selector' => '{{WRAPPER}} .project_content_heading .section_title h2',
      ]
    );
    $this->add_control(
      'title_color',
      [
        'label' => esc_html__('Title Color', 'tjcore'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .project_content_heading .section_title h2' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_responsive_control(
      'title_margin',
      [
        'label' => esc_html__('Margin', 'tjcore'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .project_content_heading .section_title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before',
      ]
    );
    $this->add_responsive_control(
      'title_padding',
      [
        'label' => esc_html__('Padding', 'tjcore'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .project_content_heading .section_title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before',
      ]
    );
    $this->add_control(
      'heading_desc',
      [
        'label' => esc_html__('Description', 'tjcore'),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'desc_typography',
        'selector' => '{{WRAPPER}} .project_content_heading > p',
      ]
    );
    $this->add_control(
      'desc_color',
      [
        'label' => esc_html__('Desc Color', 'tjcore'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .project_content_heading > p' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_responsive_control(
      'desc_margin',
      [
        'label' => esc_html__('Margin', 'tjcore'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .project_content_heading > p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before',
      ]
    );
    $this->add_responsive_control(
      'desc_padding',
      [
        'label' => esc_html__('Padding', 'tjcore'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .project_content_heading > p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before',
      ]
    );
    $this->end_controls_section();

    // Projects
    $this->start_controls_section(
      'projects',
      [
        'label' => __('Projects', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'p_title_typography',
        'selector' => '{{WRAPPER}} .project_item .project_title h3',
      ]
    );
    $this->add_control(
      'p_title_color',
      [
        'label' => esc_html__('Color', 'tjcore'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .project_item .project_title h3' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_responsive_control(
      'p_title_margin',
      [
        'label' => esc_html__('Margin', 'tjcore'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .project_item .project_title h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before',
      ]
    );
    $this->add_responsive_control(
      'p_title_padding',
      [
        'label' => esc_html__('Padding', 'tjcore'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .project_item .project_title h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before',
      ]
    );
    $this->add_control(
      'p_excerpt_desc',
      [
        'label' => esc_html__('Excerpt', 'tjcore'),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
    $this->add_control(
      'p_ex_color',
      [
        'label' => esc_html__('Color', 'tjcore'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .project_item .project_title h3 > span.excerpt' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->end_controls_section();
  }

  /**
   * Render the widget output on the frontend.
   *
   */
  protected function render() {
    $settings = $this->get_settings_for_display();

    $args = [
      'posts_per_page' => $settings['show_item'],
      'post_type' => 'projects',
      'order' => $settings['order'],
    ];

    $projects = new \WP_Query($args);

    if ($settings['tj_design_style']  == 'layout-3') :

      $this->add_render_attribute('title_args', 'class', 'title');

      $title = $settings['tj_title'];
      $description = $settings['tj_desc'];

      if ('2' == $settings['tj_btn_link_type']) {
        $this->add_render_attribute('tj-button-arg', 'href', get_permalink($settings['tj_btn_page_link']));
        $this->add_render_attribute('tj-button-arg', 'target', '_self');
        $this->add_render_attribute('tj-button-arg', 'rel', 'nofollow');
        $this->add_render_attribute('tj-button-arg', 'class', 'btn d-none d-md-inline-block');

        $this->add_render_attribute('tj-button-arg-2', 'href', get_permalink($settings['tj_btn_page_link']));
        $this->add_render_attribute('tj-button-arg-2', 'target', '_self');
        $this->add_render_attribute('tj-button-arg-2', 'rel', 'nofollow');
        $this->add_render_attribute('tj-button-arg-2', 'class', 'btn');
      } else {
        if (!empty($settings['tj_btn_link']['url'])) {
          $this->add_link_attributes('tj-button-arg', $settings['tj_btn_link']);
          $this->add_render_attribute('tj-button-arg', 'class', 'btn d-none d-md-inline-block');

          $this->add_link_attributes('tj-button-arg-2', $settings['tj_btn_link']);
          $this->add_render_attribute('tj-button-arg-2', 'class', 'btn');
        }
      }

?>
      <!-- start: Project Section -->
      <section class="project-section home-projects">
        <div class="container gx-0 gx-md-4 overflow-hidden">
          <div class="row">
            <div class="col">
              <div class="project_section_content">
                <div class="content_wrap">

                  <div class="project_content_heading">
                    <div class="section_title">
                      <?php
                      if (!empty($title)) :
                        printf(
                          '<%1$s %2$s>%3$s</%1$s>',
                          tag_escape($settings['tj_title_tag']),
                          $this->get_render_attribute_string('title_args'),
                          tj_kses($title)
                        );
                      endif;
                      ?>
                    </div>
                    <p><?php echo tj_kses($description); ?></p>

                    <?php if (!empty($settings['tj_btn_button_show'])) : ?>
                      <a <?php echo $this->get_render_attribute_string('tj-button-arg'); ?>>
                        <?php echo $settings['tj_btn_text']; ?>
                      </a>
                    <?php endif; ?>
                  </div>

                  <?php if ($projects->have_posts()) : ?>
                    <div class="project_items">

                      <?php while ($projects->have_posts()) : $projects->the_post();
                        $delivery_date = function_exists('get_field') ? get_field('delivery_date', get_the_ID()) : '';
                        $pro_stat = get_the_terms(get_the_ID(), 'projects-status');
                      ?>

                        <a href="<?php the_permalink(); ?>" class="project_item">
                          <div class="project_img">
                            <?php the_post_thumbnail(); ?>
                          </div>
                          <div class="project_title">

                            <<?php echo tag_escape($settings['project_title_tag']); ?> class="title"> <?php the_title();

                                                                                                      if (!empty($delivery_date)) :
                                                                                                      ?>
                                <span class="delivery">Livraison <?php echo $delivery_date; ?></span>
                              <?php endif; ?>
                            </<?php echo tag_escape($settings['project_title_tag']); ?>>
                          </div>
                        </a>

                      <?php endwhile;
                      wp_reset_postdata(); ?>

                    </div>
                  <?php else :
                    esc_html_e('No project item found!', 'tjcore');
                  endif; ?>

                  <div class="button d-md-none text-center">
                    <?php if (!empty($settings['tj_btn_button_show'])) : ?>
                      <a <?php echo $this->get_render_attribute_string('tj-button-arg-2'); ?>>
                        <?php echo $settings['tj_btn_text']; ?>
                      </a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>
      <!-- end: Project Section -->

    <?php
    elseif ($settings['tj_design_style']  == 'layout-2') :
    ?>

      <!-- start: Projects Section -->
      <section class="projects-section">
        <div class="container gx-0 gx-md-4 overflow-hidden">
          <div class="row">
            <div class="col">
              <div class="projects_section_content haspadding">
                <div class="content_wrap">
                  <?php if ($projects->have_posts()) : ?>
                    <div class="page_projects" id="ajax-projects">

                      <?php while ($projects->have_posts()) : $projects->the_post();
                        $excerpt = function_exists('get_field') ? get_field('excerpt', get_the_ID()) : '';
                        $address = function_exists('get_field') ? get_field('address', get_the_ID()) : '';
                        $pro_stat = get_the_terms(get_the_ID(), 'projects-status');

                        if ($projects->current_post < 3) :
                      ?>
                          <!-- side -->
                          <div class="single_project-side">
                            <div class="project_side-inner">
                              <a href="<?php the_permalink(); ?>" class="project_img">
                                <?php the_post_thumbnail(); ?>
                                <?php
                                if (!empty($pro_stat)) :
                                  foreach ($pro_stat as $status) {
                                    echo '<span class="status">' . $status->name . '</span>';
                                  }
                                endif;
                                ?>
                              </a>
                              <div class="project_content">

                                <<?php echo tag_escape($settings['project2_title_tag']); ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></<?php echo tag_escape($settings['project2_title_tag']); ?>>
                                <div class="project_meta">
                                  <span class="address"><?php echo esc_html($address); ?></span>
                                </div>
                                <p><?php echo wp_trim_words($excerpt, 25, ''); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn"><?php esc_html_e('Découvrir le récit client', 'tjcore'); ?></a>
                              </div>
                            </div>
                          </div>

                        <?php else : ?>
                          <!-- grid -->
                          <div class="single_project-grid d-none d-md-block">
                            <a href="<?php the_permalink(); ?>" class="project_grid-inner">
                              <div class="project_img">
                                <?php the_post_thumbnail(); ?>
                              </div>
                              <div class="project_content">
                                <h3><?php the_title();
                                    if (!empty($address)) : ?> <span class="address">— <?php echo esc_html($address); ?></span> <?php endif; ?>
                                </h3>
                              </div>
                            </a>
                          </div>
                      <?php
                        endif;
                      endwhile;
                      wp_reset_postdata(); ?>

                      <!-- mobile carousel -->
                      <?php if ($projects->have_posts()) : ?>
                        <div class="project_grid_carousel d-md-none">
                          <div class="meta_headline">
                            <h6><?php esc_html_e('et aussi…', 'tjcore'); ?></h6>
                          </div>

                          <div class="grid_carousel_inner">
                            <?php while ($projects->have_posts()) : $projects->the_post();
                              $excerpt = function_exists('get_field') ? get_field('excerpt', get_the_ID()) : '';
                              $address = function_exists('get_field') ? get_field('address', get_the_ID()) : '';
                              $pro_stat = get_the_terms(get_the_ID(), 'projects-status');

                              if ($projects->current_post > 2) :
                            ?>
                                <div class="single_project-grid">
                                  <a href="<?php the_permalink(); ?>" class="project_grid-inner">
                                    <div class="project_img">
                                      <?php the_post_thumbnail(); ?>
                                    </div>
                                    <div class="project_content">
                                      <h3><?php the_title();
                                          if (!empty($address)) : ?> <span class="address">— <?php echo esc_html($address); ?></span> <?php endif; ?>
                                      </h3>
                                    </div>
                                  </a>
                                </div>
                            <?php
                              endif;
                            endwhile;
                            wp_reset_postdata(); ?>

                          </div>
                        </div>
                      <?php endif; ?>
                      <!-- !mobile carousel -->

                    </div>

                    <div class="show-more-btn text-center d-none d-md-block">
                      <a href="javascript:void(0)" id="more_projects" class="btn"><?php esc_html_e('Afficher davantage', 'tjcore'); ?></a>
                    </div>

                  <?php else :
                    esc_html_e('No project item found!', 'tjcore');
                  endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end: Projects Section -->

    <?php else :
      $this->add_render_attribute('title_args', 'class', 'title');

      $title = $settings['tj_title'];
      $description = $settings['tj_desc'];

      if ('2' == $settings['tj_btn_link_type']) {
        $this->add_render_attribute('tj-button-arg', 'href', get_permalink($settings['tj_btn_page_link']));
        $this->add_render_attribute('tj-button-arg', 'target', '_self');
        $this->add_render_attribute('tj-button-arg', 'rel', 'nofollow');
        $this->add_render_attribute('tj-button-arg', 'class', 'btn d-none d-md-inline-block');

        $this->add_render_attribute('tj-button-arg-2', 'href', get_permalink($settings['tj_btn_page_link']));
        $this->add_render_attribute('tj-button-arg-2', 'target', '_self');
        $this->add_render_attribute('tj-button-arg-2', 'rel', 'nofollow');
        $this->add_render_attribute('tj-button-arg-2', 'class', 'btn');
      } else {
        if (!empty($settings['tj_btn_link']['url'])) {
          $this->add_link_attributes('tj-button-arg', $settings['tj_btn_link']);
          $this->add_render_attribute('tj-button-arg', 'class', 'btn d-none d-md-inline-block');

          $this->add_link_attributes('tj-button-arg-2', $settings['tj_btn_link']);
          $this->add_render_attribute('tj-button-arg-2', 'class', 'btn');
        }
      }
    ?>
      <!-- start: Project Section -->
      <section class="project-section">
        <div class="container gx-0 gx-md-4 overflow-hidden">
          <div class="row">
            <div class="col">
              <div class="project_section_content haspadding">
                <div class="content_wrap">
                  <div class="project_content_heading">
                    <div class="section_title">
                      <?php
                      if (!empty($title)) :
                        printf(
                          '<%1$s %2$s>%3$s</%1$s>',
                          tag_escape($settings['tj_title_tag']),
                          $this->get_render_attribute_string('title_args'),
                          tj_kses($title)
                        );
                      endif;
                      ?>
                    </div>
                    <p><?php echo tj_kses($description); ?></p>

                    <?php if (!empty($settings['tj_btn_button_show'])) : ?>
                      <a <?php echo $this->get_render_attribute_string('tj-button-arg'); ?>>
                        <?php echo $settings['tj_btn_text']; ?>
                      </a>
                    <?php endif; ?>
                  </div>
                  <?php if ($projects->have_posts()) : ?>
                    <div class="project_items">

                      <?php while ($projects->have_posts()) : $projects->the_post();
                        $excerpt = function_exists('get_field') ? get_field('excerpt', get_the_ID()) : '';
                        $pro_stat = get_the_terms(get_the_ID(), 'projects-status');
                      ?>

                        <a href="<?php the_permalink(); ?>" class="project_item">
                          <div class="project_img">
                            <?php the_post_thumbnail(); ?>

                            <?php
                            if (!empty($pro_stat)) :
                              foreach ($pro_stat as $status) {
                                echo '<span class="status">' . $status->name . '</span>';
                              }
                            endif;
                            ?>

                          </div>
                          <div class="project_title">

                            <<?php echo tag_escape($settings['project_title_tag']); ?>><?php the_title();

                                                                                        if (!empty($excerpt)) :
                                                                                        ?>
                                <span class="excerpt">— <?php echo wp_trim_words($excerpt, 7, ''); ?></span>
                              <?php endif; ?>
                            </<?php echo tag_escape($settings['project_title_tag']); ?>>
                          </div>
                        </a>

                      <?php endwhile;
                      wp_reset_postdata(); ?>

                    </div>
                  <?php else :
                    esc_html_e('No project item found!', 'tjcore');
                  endif; ?>

                  <div class="button d-md-none text-center">
                    <?php if (!empty($settings['tj_btn_button_show'])) : ?>
                      <a <?php echo $this->get_render_attribute_string('tj-button-arg-2'); ?>>
                        <?php echo $settings['tj_btn_text']; ?>
                      </a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>
      <!-- end: Project Section -->
    <?php endif; ?>


<?php
  }
}

$widgets_manager->register(new TJ_Projects());
