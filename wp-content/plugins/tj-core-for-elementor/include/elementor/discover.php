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
 * Elementor widget for Discover.
 */
class TJ_Discover extends Widget_Base {

  /**
   * Retrieve the widget name.
   */
  public function get_name() {
    return 'tj-discover';
  }

  /**
   * Retrieve the widget title.
   */
  public function get_title() {
    return __('TJ Discover', 'tjcore');
  }

  /**
   * Retrieve the widget icon.
   */
  public function get_icon() {
    return 'eicon-video-playlist tj-icon';
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
      'discover',
      'discovers',
      'tj discover',
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
        'label' => esc_html__('Title', 'tjcore'),
        'description' => tj_get_allowed_html_desc('intermediate'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => tj_kses('Découvrir <span>notre approche</span> en 2 min'),
        'placeholder' => esc_html__('Type section title here.', 'tjcore'),
        'label_block' => true,
      ]
    );
    $this->add_control(
      'discover_video',
      [
        'label' => esc_html__('Background Video', 'textdomain'),
        'type' => Controls_Manager::MEDIA,
        'media_types' => ['video'],
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ],
      ]
    );
    $this->add_control(
      'popup_video',
      [
        'label' => esc_html__('Popup Video', 'textdomain'),
        'type' => Controls_Manager::URL,
        'placeholder' => esc_html__('https://your-link.com', 'textdomain'),
        'options' => ['url'],
        'default' => [
          'url' => 'https://player.vimeo.com/video/118901221',
        ],
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
        'default' => 'h3',
      ]
    );
    $this->add_responsive_control(
      'tj_align',
      [
        'label' => esc_html__('Alignment', 'tjcore'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => esc_html__('Left', 'tjcore'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => esc_html__('Center', 'tjcore'),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => esc_html__('Right', 'tjcore'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'center',
        'selectors' => [
          '{{WRAPPER}} .section_title' => 'text-align: {{VALUE}};'
        ]
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
        'selector' => '{{WRAPPER}} .section_title .title',
      ]
    );
    $this->add_control(
      'title_color',
      [
        'label' => esc_html__('Title Color', 'tjcore'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .section_title .title' => 'color: {{VALUE}}',
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
          '{{WRAPPER}} .section_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
          '{{WRAPPER}} .section_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

    $this->add_render_attribute('title_args', 'class', 'title');
?>
    <!-- start: Discover Section -->
    <script>
      jQuery(document).ready(function($) {
        $(".video_play .paly_btn").magnificPopup({
          type: "iframe",
        });

        $('discover_video').vide({}, {
          muted: true,
          loop: true,
          className: '',
        });
      })
    </script>
    <section class="discover-section">
      <div class="container gx-0 gx-md-4 overflow-hidden">
        <div class="row">
          <div class="col">
            <div class="discover_section_content">
              <?php
              if (!empty($settings['tj_title'])) : ?>
                <div class="section_title ">
                  <?php printf(
                    '<%1$s %2$s>%3$s</%1$s>',
                    tag_escape($settings['tj_title_tag']),
                    $this->get_render_attribute_string('title_args'),
                    tj_kses($settings['tj_title'])
                  ); ?>
                </div>
              <?php endif;
              ?>
              <div class="discover_video" data-vide-bg="<?php echo esc_attr($settings['discover_video']['url']); ?>">
                <div class="video_play">
                  <a class="paly_btn" href="<?php echo esc_url($settings['popup_video']['url']); ?>"><i class="fas fa-play"></i>
                    notre approche</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end: Discover Section -->


<?php
  }
}

$widgets_manager->register(new TJ_Discover());
