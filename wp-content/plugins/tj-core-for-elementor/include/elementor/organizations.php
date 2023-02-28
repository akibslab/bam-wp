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
 * Elementor widget for Organizations.
 *
 */
class TJ_Organizations extends Widget_Base {

  /**
   * Retrieve the widget name.
   *
   */
  public function get_name() {
    return 'tj-organizations';
  }

  /**
   * Retrieve the widget title.
   *
   */
  public function get_title() {
    return __('TJ Organizations', 'tjcore');
  }

  /**
   * Retrieve the widget icon.
   *
   */
  public function get_icon() {
    return 'eicon-time-line tj-icon';
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
      'organization',
      'organizations',
      'tj organizations',
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
        ],
        'default' => 'layout-1',
      ]
    );
    $this->end_controls_section();

    // layout Panel
    $this->start_controls_section(
      'tj_heading',
      [
        'label' => esc_html__('Section heading', 'tjcore'),
        'condition' => [
          'tj_design_style' => ['layout-2']
        ]
      ]
    );

    $this->add_control(
      'tj_heading_title',
      [
        'label' => esc_html__('Title', 'tjcore'),
        'description' => tj_get_allowed_html_desc('intermediate'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => tj_kses('Nous organisons des <span>concours d’architecture clé-en-main</span> pour des clients exceptionnels'),
        'placeholder' => esc_html__('Type section title here.', 'tjcore'),
        'label_block' => true,
      ]
    );
    $this->add_control(
      'tj_heading_title_tag',
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
      'tj_btn_button_show',
      [
        'label' => esc_html__('Show Buttons', 'tjcore'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Show', 'tjcore'),
        'label_off' => esc_html__('Hide', 'tjcore'),
        'return_value' => 'yes',
        'default' => 'yes',
        'separator' => 'before'
      ]
    );

    $this->add_control(
      'button_1',
      [
        'label' => esc_html__('Button 1', 'textdomain'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
        'condition' => [
          'tj_btn_button_show' => 'yes'
        ],
      ]
    );

    $this->add_control(
      'tj_btn_text',
      [
        'label' => esc_html__('Button Text', 'tjcore'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Voir tous les concours', 'tjcore'),
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

    $this->add_control(
      'button_2',
      [
        'label' => esc_html__('Button 2', 'textdomain'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
        'condition' => [
          'tj_btn_button_show' => 'yes'
        ],
      ]
    );
    $this->add_control(
      'tj_btn2_text',
      [
        'label' => esc_html__('Button Text', 'tjcore'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Organiser un concours', 'tjcore'),
        'title' => esc_html__('Enter button text', 'tjcore'),
        'label_block' => true,
        'condition' => [
          'tj_btn_button_show' => 'yes'
        ],
      ]
    );
    $this->add_control(
      'tj_btn2_link_type',
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
      'tj_btn2_link',
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
          'tj_btn2_link_type' => '1',
          'tj_btn_button_show' => 'yes'
        ],
        'label_block' => true,
      ]
    );
    $this->add_control(
      'tj_btn2_page_link',
      [
        'label' => esc_html__('Select Button Page', 'tjcore'),
        'type' => Controls_Manager::SELECT2,
        'label_block' => true,
        'options' => tj_get_all_pages(),
        'condition' => [
          'tj_btn2_link_type' => '2',
          'tj_btn_button_show' => 'yes'
        ]
      ]
    );
    $this->end_controls_section();

    //  content
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
        'default' => 6,
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
        'default' => 'h3',
      ]
    );
    $this->end_controls_section();

    // Projects
    $this->start_controls_section(
      'organization_style',
      [
        'label' => __('Style', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'selector' => '{{WRAPPER}} .stages_organization .organization_content h3',
      ]
    );
    $this->add_control(
      'title_color',
      [
        'label' => esc_html__('Color', 'tjcore'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .stages_organization .organization_content h3' => 'color: {{VALUE}}',
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
          '{{WRAPPER}} .stages_organization .organization_content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
          '{{WRAPPER}} .stages_organization .organization_content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before',
      ]
    );
    $this->add_control(
      'excerpt',
      [
        'label' => esc_html__('Excerpt', 'tjcore'),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'excerpt_typography',
        'selector' => '{{WRAPPER}} .stages_organization .organization_content p',
      ]
    );
    $this->add_control(
      'excerpt_color',
      [
        'label' => esc_html__('Color', 'tjcore'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .stages_organization .organization_content p' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_responsive_control(
      'excerpt_margin',
      [
        'label' => esc_html__('Margin', 'tjcore'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .stages_organization .organization_content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before',
      ]
    );
    $this->add_responsive_control(
      'excerpt_padding',
      [
        'label' => esc_html__('Padding', 'tjcore'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .stages_organization .organization_content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before',
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
      'post_type' => 'organizations',
      'order' => $settings['order'],
    ];

    $organizations = new \WP_Query($args);


    if ($settings['tj_design_style'] == 'layout-2') :

      $this->add_render_attribute('heading_title_args', 'class', 'title');
      $headingTitle = $settings['tj_heading_title'];

      if ('2' == $settings['tj_btn_link_type']) {
        $this->add_render_attribute('tj-button-arg', 'href', get_permalink($settings['tj_btn_page_link']));
        $this->add_render_attribute('tj-button-arg', 'target', '_self');
        $this->add_render_attribute('tj-button-arg', 'rel', 'nofollow');
        $this->add_render_attribute('tj-button-arg', 'class', 'btn');
      } else {
        if (!empty($settings['tj_btn_link']['url'])) {
          $this->add_link_attributes('tj-button-arg', $settings['tj_btn_link']);
          $this->add_render_attribute('tj-button-arg', 'class', 'btn');
        }
      }

      if ('2' == $settings['tj_btn2_link_type']) {
        $this->add_render_attribute('tj-button2-arg', 'href', get_permalink($settings['tj_btn2_page_link']));
        $this->add_render_attribute('tj-button2-arg', 'target', '_self');
        $this->add_render_attribute('tj-button2-arg', 'rel', 'nofollow');
        $this->add_render_attribute('tj-button2-arg', 'class', 'btn');
      } else {
        if (!empty($settings['tj_btn2_link']['url'])) {
          $this->add_link_attributes('tj-button2-arg', $settings['tj_btn2_link']);
          $this->add_render_attribute('tj-button2-arg', 'class', 'btn');
        }
      }
?>

      <!-- start: Stage Organization -->
      <section class="stages-organization home-organization">
        <div class="container gx-0 gx-md-4 overflow-hidden">
          <div class="row">
            <div class="col">
              <div class="stages_organization_content">

                <div class="organization_content_heading">
                  <div class="section_title">
                    <?php
                    if (!empty($headingTitle)) :
                      printf(
                        '<%1$s %2$s>%3$s</%1$s>',
                        tag_escape($settings['tj_heading_title_tag']),
                        $this->get_render_attribute_string('heading_title_args'),
                        tj_kses($headingTitle),
                      );
                    endif;
                    ?>
                  </div>

                  <?php if (!empty($settings['tj_btn_button_show'])) : ?>
                    <div class="buttons">
                      <?php if (!empty($settings['tj_btn_text'])) : ?>
                        <a <?php echo $this->get_render_attribute_string('tj-button-arg'); ?>>
                          <?php echo $settings['tj_btn_text']; ?>
                        </a>
                      <?php endif; ?>
                      <?php if (!empty($settings['tj_btn2_text'])) : ?>
                        <a <?php echo $this->get_render_attribute_string('tj-button2-arg'); ?>>
                          <?php echo $settings['tj_btn2_text']; ?>
                        </a>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>




                </div>

                <?php if ($organizations->have_posts()) : ?>
                  <div class="stages_organization">
                    <div class="row gx-3">
                      <?php while ($organizations->have_posts()) : $organizations->the_post();

                        $status = function_exists('get_field') ? get_field('status', get_the_ID()) : '';
                        $this->add_render_attribute('title_args', 'class', 'title');
                      ?>
                        <div class="col-lg-4 col-md-6">
                          <a href="<?php the_permalink(); ?>" class="stage_organization">
                            <div class="organization_img">
                              <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="organization_content">
                              <?php if (!empty(get_the_title())) : ?>
                                <div class="content_title">
                                  <?php printf(
                                    '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape($settings['tj_title_tag']),
                                    $this->get_render_attribute_string('title_args'),
                                    get_the_title()
                                  ); ?>
                                </div>
                              <?php endif;
                              if (!empty($status)) : ?>
                                <div class="content_status">
                                  <span><?php echo $status; ?></span>
                                </div>
                              <?php endif; ?>
                            </div>
                          </a>
                        </div>
                      <?php endwhile;
                      wp_reset_postdata(); ?>
                    </div>
                  </div>
                <?php else :
                  esc_html_e('No organization item found!', 'tjcore');
                endif; ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- start: Stage Organization -->


    <?php else : ?>
      <!-- start: Stage Organization -->
      <section class="stages-organization">
        <div class="container gx-0 gx-md-4 overflow-hidden">
          <div class="row">
            <div class="col">
              <div class="stages_organization_content">
                <?php if ($organizations->have_posts()) : ?>
                  <div class="stages_organization">
                    <div class="row gx-4 gx-lg-5">
                      <?php while ($organizations->have_posts()) : $organizations->the_post();
                        $excerpt = function_exists('get_field') ? get_field('excerpt', get_the_ID()) : '';

                        $this->add_render_attribute('title_args', 'class', 'title');
                      ?>
                        <div class="col-lg-4 col-md-6">
                          <a href="<?php the_permalink(); ?>" class="stage_organization">
                            <div class="organization_img">
                              <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="organization_content">
                              <?php
                              if (!empty(get_the_title())) :
                                printf(
                                  '<%1$s %2$s>%3$s</%1$s>',
                                  tag_escape($settings['tj_title_tag']),
                                  $this->get_render_attribute_string('title_args'),
                                  get_the_title()
                                );
                              endif;
                              ?>
                              <p><?php echo tj_kses($excerpt); ?></p>
                            </div>
                          </a>
                        </div>
                      <?php endwhile;
                      wp_reset_postdata(); ?>
                    </div>
                  </div>
                <?php else :
                  esc_html_e('No organization item found!', 'tjcore');
                endif; ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- start: Stage Organization -->
    <?php endif; ?>


<?php
  }
}

$widgets_manager->register(new TJ_Organizations());
