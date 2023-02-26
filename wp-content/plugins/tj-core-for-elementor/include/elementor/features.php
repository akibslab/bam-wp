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
 * Elementor widget for Features.
 */
class TJ_Features extends Widget_Base {

  /**
   * Retrieve the widget name.
   */
  public function get_name() {
    return 'tj-features';
  }

  /**
   * Retrieve the widget title.
   */
  public function get_title() {
    return __('TJ Features', 'tjcore');
  }

  /**
   * Retrieve the widget icon.
   */
  public function get_icon() {
    return 'eicon-gallery-group tj-icon';
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
      'feature',
      'features',
      'tj feature',
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
      'features',
      [
        'label' => esc_html__('Features', 'tjcore'),
        'type' => Controls_Manager::REPEATER,
        'fields' => [
          [
            'name' => 'feature_image',
            'label' => esc_html__('Image', 'tjcore'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
              'url' => Utils::get_placeholder_image_src(),
            ]
          ],
          [
            'name' => 'feature_title',
            'label' => esc_html__('Title', 'tjcore'),
            'type' => Controls_Manager::TEXT,
            'default' => tj_kses('Features title'),
            'label_block' => true,
          ],
          [
            'name' => 'feature_content',
            'label' => esc_html__('Content', 'tjcore'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => tj_kses('Features Content'),
          ],
          [
            'name' => 'feature_collapse_content',
            'label' => esc_html__('Collapse Content', 'tjcore'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => tj_kses('Features Collapse Content'),
          ],
        ],
        'default' => [
          [
            'feature_image' => [
              'url' => get_template_directory_uri() . '/assets/img/feature/1.jpg'
            ],
            'feature_title' => tj_kses('<span>Frugalité</span> et Sobriété'),
            'feature_content' => tj_kses('C’est au cours de la phase de programmation, bien avant la conception du projet
            architectural, que 70% de l’impact environnemental d’un bâtiment sur l’ensemble
            de son cycle de vie est déterminé'),
            'feature_collapse_content' => tj_kses("La recherche de la qualité architecturale au sens large est à l'origine
            de la création de BAM. Pour réaliser votre projet, nous concevons avec
            vous le cahier des charges exhaustif qui sera mis à disposition de
            l'équipe de maîtrise d'œuvre. Il impose un niveau d’exigence et de
            pertinence élevé : la qualité de la commande conditionne la qualité
            architecturale. La programmation et la sélection des concepteurs sont
            des facteurs de qualité architecturale considérables. Ils sont
            déterminants, bien avant la conception du projet."),
          ],
          [
            'feature_image' => [
              'url' => get_template_directory_uri() . '/assets/img/feature/2.jpg'
            ],
            'feature_title' => tj_kses('<span>Coût global</span> du bâtiment'),
            'feature_content' => tj_kses('Nos outils de programmation technique et architecturale innovants ont pour
            objectif de mettre en place des dispositifs intelligents permettant d’amortir le
            coût de construction du bâtiment en minimisant les charges de son exploitation et
            assurant son bon fonctionnement tout au long de sa vie.'),
            'feature_collapse_content' => tj_kses("La recherche de la qualité architecturale au sens large est à l'origine
            de la création de BAM. Pour réaliser votre projet, nous concevons avec
            vous le cahier des charges exhaustif qui sera mis à disposition de
            l'équipe de maîtrise d'œuvre. Il impose un niveau d’exigence et de
            pertinence élevé : la qualité de la commande conditionne la qualité
            architecturale. La programmation et la sélection des concepteurs sont
            des facteurs de qualité architecturale considérables. Ils sont
            déterminants, bien avant la conception du projet."),
          ],
          [
            'feature_image' => [
              'url' => get_template_directory_uri() . '/assets/img/feature/3.jpg'
            ],
            'feature_title' => tj_kses('<span>Architecture</span> matters'),
            'feature_content' => tj_kses('La qualité de la commande conditionne la qualité architecturale, le véritable
            ambassadeur silencieux de votre marque'),
            'feature_collapse_content' => tj_kses("La recherche de la qualité architecturale au sens large est à l'origine
            de la création de BAM. Pour réaliser votre projet, nous concevons avec
            vous le cahier des charges exhaustif qui sera mis à disposition de
            l'équipe de maîtrise d'œuvre. Il impose un niveau d’exigence et de
            pertinence élevé : la qualité de la commande conditionne la qualité
            architecturale. La programmation et la sélection des concepteurs sont
            des facteurs de qualité architecturale considérables. Ils sont
            déterminants, bien avant la conception du projet."),
          ],
        ],
        'title_field' => '{{{ feature_title }}}',
      ]
    );
    $this->end_controls_section();


    // TAB_STYLE
    $this->start_controls_section(
      'title_style',
      [
        'label' => __('Title', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'selector' => '{{WRAPPER}} .feature_inner .feature_content h2',
      ]
    );
    $this->add_control(
      'title_color',
      [
        'label' => esc_html__('Title Color', 'tjcore'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .feature_inner .feature_content h2' => 'color: {{VALUE}}',
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
          '{{WRAPPER}} .feature_inner .feature_content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
          '{{WRAPPER}} .feature_inner .feature_content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before',
      ]
    );
    $this->end_controls_section();


    // TAB_STYLE
    $this->start_controls_section(
      'content_style',
      [
        'label' => __('Content', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'content_typography',
        'selector' => '{{WRAPPER}} .feature_inner .feature_content p',
      ]
    );
    $this->add_control(
      'content_color',
      [
        'label' => esc_html__('Color', 'tjcore'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .feature_inner .feature_content p' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_responsive_control(
      'content_margin',
      [
        'label' => esc_html__('Margin', 'tjcore'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .feature_inner .feature_content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before',
      ]
    );
    $this->add_responsive_control(
      'content_padding',
      [
        'label' => esc_html__('Padding', 'tjcore'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .feature_inner .feature_content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before',
      ]
    );
    $this->end_controls_section();


    // TAB_STYLE
    $this->start_controls_section(
      'c_content_style',
      [
        'label' => __('Collapse Content', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'c_content_typography',
        'selector' => '{{WRAPPER}} .feature_accordion .accordion_content > p',
      ]
    );
    $this->add_control(
      'c_content_color',
      [
        'label' => esc_html__('Color', 'tjcore'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .feature_accordion .accordion_content > p' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_responsive_control(
      'c_content_margin',
      [
        'label' => esc_html__('Margin', 'tjcore'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .feature_accordion .accordion_content > p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before',
      ]
    );
    $this->add_responsive_control(
      'c_content_padding',
      [
        'label' => esc_html__('Padding', 'tjcore'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'custom'],
        'selectors' => [
          '{{WRAPPER}} .feature_accordion .accordion_content > p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

    $features = $settings['features'];
?>
    <!-- start: Feature Section -->
    <?php if (!empty($features)) : ?>
      <section class="feature-section">
        <div class="container gx-0 gx-md-4 overflow-hidden">
          <div class="row">
            <div class="col">
              <div class="feature_section_content haspadding">
                <div class="content_wrap">
                  <div class="features">
                    <?php foreach ($features as $feature) : ?>
                      <div class="single_feature">
                        <div class="feature_inner">
                          <div class="feature_content">
                            <h2><?php echo tj_kses($feature['feature_title']); ?></h2>
                            <p><?php echo tj_kses($feature['feature_content']); ?></p>

                            <div class="" id="featureAccordion">
                              <div class="feature_accordion">
                                <button class="accordion_button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                  <?php esc_html_e('En savoir plus', 'tjcore'); ?>
                                </button>
                                <div id="collapseOne" class="accordion_content collapse" data-bs-parent="#featureAccordion">
                                  <p><?php echo tj_kses($feature['feature_collapse_content']); ?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="feature_img">
                            <img src="<?php echo esc_url($feature['feature_image']['url']); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($feature['feature_image']['url']), '_wp_attachment_image_alt', true); ?>">
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php else :
      esc_html_e('No feature found', 'tjcore');
    endif; ?>
    <!-- end: Feature Section -->


<?php
  }
}

$widgets_manager->register(new TJ_Features());
