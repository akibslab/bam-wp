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
 * Elementor widget for Heading.
 */
class TJ_Marquee extends Widget_Base {

  /**
   * Retrieve the widget name.
   */
  public function get_name() {
    return 'tj-marquee';
  }

  /**
   * Retrieve the widget title.
   */
  public function get_title() {
    return __('TJ Marquee', 'tjcore');
  }

  /**
   * Retrieve the widget icon.
   */
  public function get_icon() {
    return 'eicon-wordart tj-icon';
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
      'marquee',
      'marquees',
      'tj marquee',
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
      'marquees',
      [
        'label' => esc_html__('Marque Title', 'tjcore'),
        'type' => Controls_Manager::REPEATER,
        'fields' => [
          [
            'name' => 'marquee_title',
            'label' => esc_html__('Title', 'tjcore'),
            'type' => Controls_Manager::TEXT,
            'default' => tj_kses('Marquee title'),
            'label_block' => true,
          ],
        ],
        'default' => [
          [
            'marquee_title' => tj_kses('<span>Top 5%</span> des architectes mondiaux présents à chaque concours'),
          ],
          [
            'marquee_title' => tj_kses('<span>150 candidatures</span> en moyenne par concours'),
          ],
        ],
        'title_field' => '{{{ marquee_title }}}',
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
        'selector' => '{{WRAPPER}} .marquee-title h2',
      ]
    );
    $this->add_control(
      'title_color',
      [
        'label' => esc_html__('Title Color', 'tjcore'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .marquee-title h2' => 'color: {{VALUE}}',
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
          '{{WRAPPER}} .marquee-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
          '{{WRAPPER}} .marquee-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
?>

    <?php if (!empty($settings['marquees'])) : ?>
      <marquee behavior="scroll" direction="left" class="marquee-title" onmouseover="this.stop();" onmouseout="this.start();">
        <?php foreach ($settings['marquees'] as $marquee) : ?>
          <h2><?php echo tj_kses($marquee['marquee_title']) ?></h2>
        <?php endforeach; ?>
      </marquee>
    <?php endif; ?>

<?php
  }
}

$widgets_manager->register(new TJ_Marquee());
