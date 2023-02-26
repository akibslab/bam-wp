<?php

namespace TJCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Control_Media;

use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Elementor widget for Competition.
 */
class TJ_Competition extends Widget_Base {

  /**
   * Retrieve the widget name.
   */
  public function get_name() {
    return 'tj-competition';
  }

  /**
   * Retrieve the widget title.
   */
  public function get_title() {
    return __('TJ Competition', 'tjcore');
  }

  /**
   * Retrieve the widget icon.
   */
  public function get_icon() {
    return 'eicon-editor-list-ol tj-icon';
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
      'competition',
      'list',
      'tj competition',
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

    // tj_section_title
    $this->start_controls_section(
      'tj_content',
      [
        'label' => esc_html__('Content', 'tjcore'),
      ]
    );
    $this->add_control(
      'tj_title',
      [
        'label' => esc_html__('Heading', 'tjcore'),
        'description' => tj_get_allowed_html_desc('intermediate'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => esc_html__('Pourquoi organiser un concours d’achitecture pour votre projet ?', 'tjcore'),
        'placeholder' => esc_html__('Type section title here.', 'tjcore'),
        'label_block' => true,
      ]
    );
    $this->add_control(
      'com_list',
      [
        'label' => esc_html__('List', 'tjcore'),
        'type' => Controls_Manager::REPEATER,
        'fields' => [
          [
            'name' => 'list_title',
            'label' => esc_html__('Content', 'tjcore'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('List content', 'tjcore'),
            'label_block' => true,
          ],
        ],
        'default' => [
          [
            'list_title' => esc_html__('Accéder à des équipes insoupçonnées et inédites', 'tjcore'),
          ],
          [
            'list_title' => esc_html__('Obtenir un projet abouti en un temps record', 'tjcore'),
          ],
          [
            'list_title' => esc_html__('Stimuler la créativité architecturale', 'tjcore'),
          ],
          [
            'list_title' => esc_html__('Devenir une référence de la construction bas carbone', 'tjcore'),
          ],
        ],
      ]
    );
    $this->end_controls_section();


    // TAB_STYLE
    $this->start_controls_section(
      'section_style',
      [
        'label' => __('Style', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'selector' => '{{WRAPPER}} .architectural_competition_inner .title',
      ]
    );
    $this->add_control(
      'title_color',
      [
        'label' => esc_html__('Title Color', 'tjcore'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .architectural_competition_inner .title' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_responsive_control(
      'margin',
      [
        'label' => esc_html__('Margin', 'tjcore'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .architectural_competition_inner .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before',
      ]
    );
    $this->add_responsive_control(
      'padding',
      [
        'label' => esc_html__('Padding', 'tjcore'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .architectural_competition_inner .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before',
      ]
    );
    $this->end_controls_section();

    // List Style
    $this->start_controls_section(
      'list_style',
      [
        'label' => __('List', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'list_typography',
        'selector' => '{{WRAPPER}} .architectural_competition_inner ul > li',
      ]
    );
    $this->add_control(
      'list_color',
      [
        'label' => esc_html__('List Color', 'tjcore'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .architectural_competition_inner ul > li' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_responsive_control(
      'list_margin',
      [
        'label' => esc_html__('Margin', 'tjcore'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .architectural_competition_inner ul > li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before',
      ]
    );
    $this->add_responsive_control(
      'list_padding',
      [
        'label' => esc_html__('Padding', 'tjcore'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .architectural_competition_inner ul > li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before',
      ]
    );
    $this->end_controls_section();
  }

  /**
   * Render the widget output on the frontend.
   *
   * Written in PHP and used to generate the final HTML.
   *
   * @since 1.0.0
   *
   * @access protected
   */
  protected function render() {
    $settings = $this->get_settings_for_display();

    $title = $settings['tj_title'];
    $com_list = $settings['com_list'];
?>

    <!-- start: Architectural Competition -->
    <section class="architectural-competition">
      <div class="container gx-0 gx-md-4 overflow-hidden">
        <div class="row">
          <div class="col">
            <div class="architectural_competiton_content haspadding">
              <div class="content_wrap">
                <div class="architectural_competition_inner">
                  <?php if (!empty($title)) : ?>
                    <p class="title"><?php echo tj_kses($title); ?></p>
                  <?php endif;

                  if (!empty($com_list)) :
                  ?>
                    <ul>
                      <?php foreach ($com_list as $list) : ?>
                        <li><?php echo tj_kses($list['list_title']); ?></li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif;  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end: Architectural Competition -->


    <div class="section_title d-none">
      <?php
      if (!empty($settings['tj_title'])) :
        printf(
          '<%1$s %2$s>%3$s</%1$s>',
          tag_escape($settings['tj_title_tag']),
          $this->get_render_attribute_string('title_args'),
          tj_kses($settings['tj_title'])
        );
      endif;
      ?>
    </div>

<?php
  }
}

$widgets_manager->register(new TJ_Competition());
