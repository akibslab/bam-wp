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
 * Elementor widget for Expertise.
 */
class TJ_Expertise extends Widget_Base {

  /**
   * Retrieve the widget name.
   */
  public function get_name() {
    return 'tj-expertise';
  }

  /**
   * Retrieve the widget title.
   */
  public function get_title() {
    return __('TJ Expertise', 'tjcore');
  }

  /**
   * Retrieve the widget icon.
   */
  public function get_icon() {
    return 'eicon-export-kit tj-icon';
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
      'expertise',
      'expert',
      'tj expertise',
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
      'tj_paragraph_1',
      [
        'label' => esc_html__('Paragraph 1', 'tjcore'),
        'description' => tj_get_allowed_html_desc('intermediate'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => tj_kses('Le chai est un programme aussi complexe que fascinant. Il est à la fois un bâtiment
        technique de production, un bâtiment agricole, un lieu de réception et de
        représentation, d’exposition, de vente, de stockage…
        <br>
        Parallèlement, les contraintes techniques peuvent s’avérer complexes et nécessitent une
        réelle maîtrise des processus d’élaboration du vin, de la vigne aux chais. Notre
        accompagnement complet vous offre le moyen de rationaliser le fonctionnement du chai
        afin d’optimiser le travail de chacun et l’exploitation des locaux, sans dénaturer la
        dimension presque sacrée de ces lieux.'),
        'placeholder' => esc_html__('Type first paragraph text here.', 'tjcore'),
        'label_block' => true,
      ]
    );
    $this->add_control(
      'tj_carousel_image_1',
      [
        'label' => esc_html__('Image 1', 'textdomain'),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => get_template_directory_uri() . '/assets/img/expertise/1.jpg',
        ],
      ]
    );
    $this->add_control(
      'tj_carousel_image_2',
      [
        'label' => esc_html__('Image 2', 'textdomain'),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => get_template_directory_uri() . '/assets/img/expertise/1.1.jpg',
        ],
      ]
    );
    $this->add_control(
      'tj_paragraph_2',
      [
        'label' => esc_html__('Paragraph 2', 'tjcore'),
        'description' => tj_get_allowed_html_desc('intermediate'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => tj_kses("Il est également primordial d'appréhender le bâtiment comme un outil de travail dont il
        faut respecter les cycles de production et la saisonnalité. La conception du projet
        sera également soumise au planning des travaux réalisés en site occupé sans ralentir la
        production ni altérer la qualité du vin.
        <br>
        Dans ce type de programme, l’enjeu n’est pas seulement de construire ou agrandir, il
        est avant tout d’améliorer les conditions de production, de remédier à un manque de
        rationalité résultant des agrandissements successifs, et de travail sans sacrifier ses
        valeurs ni perturber l’environnement naturel, l’essence même de la viticulture et de la
        viniculture."),
        'placeholder' => esc_html__('Type second paragraph text here.', 'tjcore'),
        'label_block' => true,
      ]
    );
    $this->add_control(
      'tj_bottom_image',
      [
        'label' => esc_html__('Bottom Image', 'textdomain'),
        'type' => Controls_Manager::MEDIA,
        'default' => [
          'url' => get_template_directory_uri() . '/assets/img/expertise/2.png',
        ],
      ]
    );
    $this->end_controls_section();

    $this->start_controls_section(
      '_tj_button',
      [
        'label' => __('Button', 'tjcore'),
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
      'tj_button_title',
      [
        'label' => esc_html__('Button Title', 'tjcore'),
        'description' => tj_get_allowed_html_desc('intermediate'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Vous avez un projet ?', 'tjcore'),
        'placeholder' => esc_html__('Type button title text here.', 'tjcore'),
        'label_block' => true,
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
        'default' => esc_html__('Nous contacter', 'tjcore'),
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
        'name' => 'text_typography',
        'selector' => '{{WRAPPER}} .expertise_content_inner .text > p',
      ]
    );
    $this->add_control(
      'text_color',
      [
        'label' => esc_html__('Text Color', 'tjcore'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .expertise_content_inner .text > p' => 'color: {{VALUE}}',
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
          '{{WRAPPER}} .expertise_content_inner .text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
          '{{WRAPPER}} ..expertise_content_inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

    $paragraph_1 = $settings['tj_paragraph_1'];
    $paragraph_2 = $settings['tj_paragraph_2'];

    $carousel_img1 = $settings['tj_carousel_image_1'];
    $carousel_img2 = $settings['tj_carousel_image_2'];

    $bottom_img = $settings['tj_bottom_image'];

    $button_show = $settings['tj_btn_button_show'];
    $button_title = $settings['tj_button_title'];

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
?>

    <!-- start: Expertise Section -->
    <section class="expertise-section">
      <div class="container gx-0 gx-md-4 overflow-hidden">
        <div class="row">
          <div class="col">
            <div class="expertise_section_content haspadding">
              <div class="content_wrap">
                <div class="expertise_content_inner">
                  <?php if (!empty($paragraph_1)) : ?>
                    <div class="text">
                      <p><?php echo tj_kses($paragraph_1); ?></p>
                    </div>
                  <?php endif; ?>
                  <div class="image image-carousel">
                    <?php if (!empty($carousel_img1)) : ?>
                      <img src="<?php echo esc_url($carousel_img1['url']); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($carousel_img1['url']), '_wp_attachment_image_alt', true); ?>">
                    <?php endif;
                    if (!empty($carousel_img2)) : ?>
                      <img src="<?php echo esc_url($carousel_img2['url']); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($carousel_img2['url']), '_wp_attachment_image_alt', true); ?>">
                    <?php endif; ?>
                  </div>
                  <?php if (!empty($paragraph_2)) : ?>
                    <div class="text">
                      <p><?php echo tj_kses($paragraph_2) ?></p>
                    </div>
                  <?php endif;
                  if (!empty($bottom_img)) : ?>
                    <div class="image">
                      <img src="<?php echo esc_url($bottom_img['url']); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($bottom_img['url']), '_wp_attachment_image_alt', true); ?>">
                    </div>
                  <?php endif; ?>
                </div>

                <?php if (!empty($button_show)) : ?>
                  <div class="expertise_right d-none d-lg-block">
                    <p><?php echo tj_kses($button_title); ?></p>
                    <a <?php echo $this->get_render_attribute_string('tj-button-arg'); ?>>
                      <?php echo $settings['tj_btn_text']; ?>
                    </a>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end: Expertise Section -->

<?php
  }
}

$widgets_manager->register(new TJ_Expertise());
