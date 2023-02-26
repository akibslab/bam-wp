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
 * Elementor widget for Approach.
 */
class TJ_Approach extends Widget_Base {

  /**
   * Retrieve the widget name.
   */
  public function get_name() {
    return 'tj-approach';
  }

  /**
   * Retrieve the widget title.
   */
  public function get_title() {
    return __('TJ Approach', 'tjcore');
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
      'approach',
      'approachs',
      'tj approach',
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
      'approaches',
      [
        'label' => esc_html__('Approaches', 'tjcore'),
        'type' => Controls_Manager::REPEATER,
        'fields' => [
          [
            'name' => 'approach_image',
            'label' => esc_html__('Image', 'tjcore'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
              'url' => Utils::get_placeholder_image_src(),
            ]
          ],
          [
            'name' => 'approach_title',
            'label' => esc_html__('Title', 'tjcore'),
            'type' => Controls_Manager::TEXT,
            'default' => tj_kses('Approach title'),
            'label_block' => true,
          ],
          [
            'name' => 'tj_title_tag',
            'label' => esc_html__('Title HTML Tag', 'tjcore'), 'type' => Controls_Manager::CHOOSE,
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
          ],
          [
            'name' => 'approach_content',
            'label' => esc_html__('Content', 'tjcore'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => tj_kses('Approach Content'),
          ],
          [
            'name' => 'tj_btn_text',
            'label' => esc_html__('Button Text', 'tjcore'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Button Text', 'tjcore'),
            'label_block' => true,
          ],
          [
            'name' => 'tj_btn_link',
            'label' => esc_html__('Button link', 'textdomain'),
            'type' => Controls_Manager::URL,
            'placeholder' => esc_html__('https://your-link.com', 'textdomain'),
            'options' => ['url', 'is_external', 'nofollow'],
            'default' => [
              'url' => '',
              'is_external' => true,
              'nofollow' => true,
              // 'custom_attributes' => '',
            ],
            'label_block' => true,
          ],
        ],
        'default' => [
          [
            'approach_image' => [
              'url' => get_template_directory_uri() . '/assets/img/approach/1.jpg'
            ],
            'approach_title' => tj_kses('<span>Programmation</span> architecturale'),
            'approach_content' => tj_kses('<span>C’est l’étape essentielle d’un projet, celle où 80% des éléments d’un projet sont
            définis.</span>
          Nous partons de votre vision du projet, nous challengeons vos hypothèses et les faisons évoluer
          au gré de nos recherches et de vos ambitions. Notre mission: définir un programme pertinent
          alliant sobriété, résilience et réversibilité.'),
            'tj_btn_text' => esc_html__('En savoir plus', 'tjcore'),
          ],
          [
            'approach_image' => [
              'url' => get_template_directory_uri() . '/assets/img/approach/2.jpg'
            ],
            'approach_title' => tj_kses('<span>Organisation</span> de concours'),
            'approach_content' => tj_kses('Faire émerger un projet hors du commun, innovant, écologique : c’est notre
            spécialité.</span>

          Nous fédérons des équipes de maitrise d’oeuvre internationales autour de projet d’exception.
          Notre mission: faire émerger des équipes et des projets à l’image de vos ambitions.'),
            'tj_btn_text' => esc_html__('En savoir plus', 'tjcore'),
          ],
          [
            'approach_image' => [
              'url' => get_template_directory_uri() . '/assets/img/approach/3.jpg'
            ],
            'approach_title' => tj_kses('<span>Suivi</span> de projet (AMO / MOD)'),
            'approach_content' => tj_kses('<span>Respect d’un projet, d’un délai et d’un budget.</span>

            Nous vous accompagnons sur le suivi opérationnel des études et de la réalisation des travaux.
            Notre équipe, dédiée à votre projet met en œuvre toute son expertise pour la réussite de votre
            projet.'),
            'tj_btn_text' => esc_html__('En savoir plus', 'tjcore'),
          ],
        ],

        'title_field' => '{{{ approach_title }}}',
      ]
    );
    $this->end_controls_section();


    // TAB_STYLE
    $this->start_controls_section(
      'section_title',
      [
        'label' => __('Title', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'selector' => '{{WRAPPER}} .single_approach_item .approach_content .title',
      ]
    );
    $this->add_control(
      'title_color',
      [
        'label' => esc_html__('Title Color', 'tjcore'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .single_approach_item .approach_content .title' => 'color: {{VALUE}}',
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
          '{{WRAPPER}} .single_approach_item .approach_content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
          '{{WRAPPER}} .single_approach_item .approach_content .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before',
      ]
    );
    $this->end_controls_section();

    // TAB_STYLE
    $this->start_controls_section(
      'section_content',
      [
        'label' => __('Content', 'tjcore'),
        'tab' => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'content_typography',
        'selector' => '{{WRAPPER}} .single_approach_item .approach_content p',
      ]
    );
    $this->add_control(
      'content_color',
      [
        'label' => esc_html__('Color', 'tjcore'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .single_approach_item .approach_content p' => 'color: {{VALUE}}',
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
          '{{WRAPPER}} .single_approach_item .approach_content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
          '{{WRAPPER}} .single_approach_item .approach_content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

    $approaches = $settings['approaches'];

    $this->add_render_attribute('title_args', 'class', 'title');
?>

    <!-- start: Approach Section -->
    <?php if (!empty($approaches)) : ?>
      <section class="approach-section">
        <div class="container gx-0 gx-md-4 overflow-hidden">
          <div class="row">
            <div class="col">
              <div class="approach_section_content haspadding">
                <div class="content_wrap">

                  <div class="approach_items">
                    <?php foreach ($approaches as $approach) :                    ?>
                      <div class="single_approach_item">
                        <div class="approach_img">
                          <img src="<?php echo esc_url($approach['approach_image']['url']); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($approach['approach_image']['url']), '_wp_attachment_image_alt', true); ?>">
                        </div>
                        <div class="approach_content">
                          <?php
                          if (!empty($approach['approach_title'])) :
                            printf(
                              '<%1$s %2$s>%3$s</%1$s>',
                              tag_escape($approach['tj_title_tag']),
                              $this->get_render_attribute_string('title_args'),
                              tj_kses($approach['approach_title'])
                            );
                          endif;
                          ?>
                          <p><?php echo tj_kses($approach['approach_content']) ?></p>

                          <a href="<?php echo esc_html($approach['tj_btn_link']['url']); ?>" class="btn inline-btn"><?php echo esc_html($approach['tj_btn_text']); ?></a>

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
      esc_html_e('No approach found', 'tjcore');
    endif; ?>
    <!-- end: Approach Section -->


<?php
  }
}

$widgets_manager->register(new TJ_Approach());
