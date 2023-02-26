<?php

namespace TJCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Elementor widget for Clients.
 *
 */
class TJ_Clients extends Widget_Base {

  /**
   * Retrieve the widget name.
   *
   */
  public function get_name() {
    return 'clients';
  }

  /**
   * Retrieve the widget title.
   *
   */
  public function get_title() {
    return __('TJ Clients', 'tjcore');
  }

  /**
   * Retrieve the widget icon.
   *
   */
  public function get_icon() {
    return 'eicon-slider-album tj-icon';
  }

  /**
   * Widget categories
   *     
   * */
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
      'clients',
      'partners',
      'tj clients',
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

    // tj_content
    $this->start_controls_section(
      'tj_content',
      [
        'label' => esc_html__('Content', 'tjcore'),
      ]
    );
    $repeater = new Repeater();

    $repeater->add_control(
      'client_brand_name',
      [
        'label' => esc_html__('Brand Name', 'tjcore'),
        'type' => Controls_Manager::TEXT,
        'label_block' => true,
      ]
    );
    $repeater->add_control(
      'client_brand_logo',
      [
        'label' => esc_html__('Brand Logo', 'tjcore'),
        'type' => Controls_Manager::MEDIA,
        'description' => esc_html__('Upload client brand logo', 'tjcore'),
        'default' => [
          'url' => Utils::get_placeholder_image_src(),
        ]
      ]
    );
    $this->add_control(
      'tj_clients_list',
      [
        'label' => esc_html__('Clients list', 'tjcore'),
        'type' => Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'client_brand_name' => esc_html__('Notaires', 'tjcore'),
            'client_brand_logo' => [
              'url' => get_template_directory_uri() . "/assets/img/clients/notaires.png"
            ],
          ],
          [
            'client_brand_name' => esc_html__('Lafite', 'tjcore'),
            'client_brand_logo' => [
              'url' => get_template_directory_uri() . "/assets/img/clients/lafite.png"
            ],
          ],
          [
            'client_brand_name' => esc_html__('Belargus', 'tjcore'),
            'client_brand_logo' => [
              'url' => get_template_directory_uri() . "/assets/img/clients/belargus.png"
            ],
          ],
          [
            'client_brand_name' => esc_html__('Famille', 'tjcore'),
            'client_brand_logo' => [
              'url' => get_template_directory_uri() . "/assets/img/clients/famille.png"
            ],
          ],
          [
            'client_brand_name' => esc_html__('Groupama', 'tjcore'),
            'client_brand_logo' => [
              'url' => get_template_directory_uri() . "/assets/img/clients/groupama.png"
            ],
          ],
        ],
        'title_field' => '{{{ client_brand_name }}}',
      ]
    );
    $this->end_controls_section();

    // tj_carousel_settings
    $this->start_controls_section(
      'tj_carousel_settings',
      [
        'label' => esc_html__('Carousel Settings', 'tjcore'),
      ]
    );
    $this->add_control(
      'carousel_loop',
      [
        'label' => esc_html__('Loop', 'tjcore'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => esc_html__('True', 'tjcore'),
        'label_off' => esc_html__('False', 'tjcore'),
        'return_value' => 'true',
        'default' => 'true',
      ]
    );
    $this->add_control(
      'carousel_autoplay',
      [
        'label' => esc_html__('Autoplay', 'tjcore'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => esc_html__('True', 'tjcore'),
        'label_off' => esc_html__('False', 'tjcore'),
        'return_value' => 'true',
        'default' => 'true',
      ]
    );
    $this->add_control(
      'carousel_speed',
      [
        'label' => esc_html__('Autoplay Speed', 'tjcore'),
        'type' => Controls_Manager::TEXT,
        'default' => '2000',
      ]
    );
    $this->end_controls_section();


    // TAB_STYLE
    $this->start_controls_section(
      'tj_style',
      [
        'label' => __('Style', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_responsive_control(
      'margin',
      [
        'label' => esc_html__('Margin', 'tjcore'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .clients_carousel' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
          '{{WRAPPER}} .clients_carousel' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

    $clients = $settings['tj_clients_list'];

    if ("true" === $settings['carousel_loop']) {
      $loop = 'true';
    } else {
      $loop = 'false';
    }
    if ("true" === $settings['carousel_autoplay']) {
      $autoplay = 'true';
    } else {
      $autoplay = 'false';
    }

?>

    <!-- start: Clients Section  -->
    <script>
      jQuery(document).ready(function($) {
        if ($("#clients-<?php echo esc_attr($this->get_id()) ?>").length > 0) {
          $("#clients-<?php echo esc_attr($this->get_id()) ?>").slick({
            infinite: <?php echo $loop;  ?>,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: <?php echo $autoplay;  ?>,
            autoplaySpeed: 0,
            speed: <?php echo $settings['carousel_speed'] ?>,
            dots: false,
            arrows: false,
            centerMode: true,
            variableWidth: true,
            responsive: [{
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
              },
            }, ],
          });
        }
      })
    </script>
    <section class="clients-section">
      <div class="container-fluid gx-0 overflow-hidden">
        <div class="row">
          <div class="col">
            <div class="clients_carousel " id="clients-<?php echo esc_attr($this->get_id()) ?>">
              <?php foreach ($clients as $client) : ?>
                <div class="single_client">
                  <div class="client_inner">
                    <img src="<?php echo esc_url($client['client_brand_logo']['url']); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($client['client_brand_logo']['url']), '_wp_attachment_image_alt', true); ?>">
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end: Clients Section  -->

<?php
  }
}

$widgets_manager->register(new TJ_Clients());
