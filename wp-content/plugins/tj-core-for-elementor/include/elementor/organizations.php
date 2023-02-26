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

    $organizations = new \WP_Query($args); ?>

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

<?php
  }
}

$widgets_manager->register(new TJ_Organizations());
