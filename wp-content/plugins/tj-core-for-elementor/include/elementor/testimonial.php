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
 * Elementor widget for Testimonial.
 */
class TJ_Testimonial extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     */
    public function get_name() {
        return 'tj-testimonial';
    }

    /**
     * Retrieve the widget title.
     *
     */
    public function get_title() {
        return __('TJ Testimonial', 'tjcore');
    }

    /**
     * Retrieve the widget icon.
     *
     */
    public function get_icon() {
        return 'eicon-testimonial tj-icon';
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
            'testimonial',
            'review',
            'tj testimonial',
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

        // tj_content
        $this->start_controls_section(
            'tj_content',
            [
                'label' => esc_html__('Content', 'tjcore'),
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'tj_content_layout',
            [
                'label' => esc_html__('Content Layout', 'tjcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'content' => esc_html__('Content', 'tjcore'),
                    'image' => esc_html__('Image', 'tjcore'),
                ],
                'default' => 'content',
            ]
        );
        $repeater->add_control(
            'tj_review_text',
            [
                'label' => esc_html__('Review Text', 'tjcore'),
                'description' => tj_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Type review text here', 'tjcore'),
                'condition' => [
                    'tj_content_layout' => 'content'
                ],
            ]
        );
        $repeater->add_control(
            'tj_reviewer_name',
            [
                'label' => esc_html__('Reviewer Name', 'tjcore'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type reviewer name here', 'tjcore'),
                'label_block' => true,
                'condition' => [
                    'tj_content_layout' => 'content'
                ],
            ]
        );
        $repeater->add_control(
            'tj_review_image',
            [
                'label' => esc_html__('Choose Image', 'tjcore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'tj_content_layout' => 'image'
                ],
            ]
        );
        $this->add_control(
            'reviews_list',
            [
                'label' => esc_html__('Reviews List', 'tjcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' =>  $repeater->get_controls(),
                'default' => [
                    [
                        'tj_content_layout' => 'content',
                        'tj_review_text' => esc_html__('“Un projet mené de main de maître”', 'tjcore'),
                        'tj_reviewer_name' => esc_html__('Saskia de Rothschild', 'tjcore'),
                    ],
                    [
                        'tj_content_layout' => 'image',
                        'tj_review_image' => [
                            'url' => get_template_directory_uri() . "/assets/img/clients/lafite.png"
                        ],
                    ],
                    [
                        'tj_content_layout' => 'content',
                        'tj_review_text' => esc_html__('“Je recommande cet AMO nouvelle génération. Un suivi précieux”', 'tjcore'),
                        'tj_reviewer_name' => esc_html__('François Perrin', 'tjcore'),
                    ],
                    [
                        'tj_content_layout' => 'content',
                        'tj_review_text' => esc_html__('“Un projet mené de main de maître”', 'tjcore'),
                        'tj_reviewer_name' => esc_html__('Saskia de Rothschild', 'tjcore'),
                    ],
                    [
                        'tj_content_layout' => 'image',
                        'tj_review_image' => [
                            'url' => get_template_directory_uri() . "/assets/img/clients/lafite.png"
                        ],
                    ],
                    [
                        'tj_content_layout' => 'content',
                        'tj_review_text' => esc_html__('“Je recommande cet AMO nouvelle génération. Un suivi précieux”', 'tjcore'),
                        'tj_reviewer_name' => esc_html__('François Perrin', 'tjcore'),
                    ],

                ],
                'title_field' => '{{{ tj_reviewer_name }}}',
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
                'default' => 'false',
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
                    '{{WRAPPER}} .testimonial-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        $reviews = $settings['reviews_list'];

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

        <!-- start: Testimonial Section -->
        <section class="testimonial-section">
            <div class="testimonial_section_content">
                <div class="container-fluid gx-0 overflow-hidden">
                    <div class="row">
                        <div class="col">
                            <?php if ($settings['tj_design_style']  == 'layout-2') : ?>
                                <script>
                                    jQuery(document).ready(function($) {
                                        if ($("#testimonial-active-2-<?php echo esc_attr($this->get_id()); ?>").length > 0) {
                                            $("#testimonial-active-2-<?php echo esc_attr($this->get_id()); ?>").slick({
                                                infinite: <?php echo $loop;  ?>,
                                                slidesToShow: 3,
                                                slidesToScroll: 1,
                                                dots: false,
                                                arrows: false,
                                                centerMode: true,
                                                variableWidth: true,
                                                autoplay: <?php echo $autoplay;  ?>,
                                                autoplaySpeed: 0,
                                                speed: <?php echo $settings['carousel_speed'] ?>,
                                                responsive: [{
                                                    breakpoint: 768,
                                                    settings: {
                                                        slidesToShow: 1,
                                                        dots: true,
                                                    },
                                                }, ],
                                            });
                                        }
                                    })
                                </script>
                                <div class="testimonials style-2 testimonial_active-2" id="testimonial-active-2-<?php echo esc_attr($this->get_id()); ?>">
                                    <?php foreach ($reviews as $review) :  ?>
                                        <div class="single_testimonial">
                                            <div class="testimonial_inner">
                                                <div class="testi_content">
                                                    <?php if ("content" == $review['tj_content_layout']) : ?>
                                                        <p class="text"><?php echo tj_kses($review['tj_review_text']); ?></p>
                                                        <span class="name"><?php echo tj_kses($review['tj_reviewer_name']); ?></span>
                                                    <?php elseif ("image" == $review['tj_content_layout']) : ?>
                                                        <img src="<?php echo esc_url($review['tj_review_image']['url']); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($review['tj_review_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <div class="testimonial_nav">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <div class="testimonial_nav_content">
                                                    <ul>
                                                        <li class="prev"><i class="fas fa-arrow-left"></i> <?php echo esc_html__('Voir le projet précédent', 'tjcore'); ?></li>
                                                        <li class="next"><?php echo esc_html__('Voir le projet précédent', 'tjcore'); ?> <i class="fas fa-arrow-right"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php else : ?>
                                <script>
                                    jQuery(document).ready(function($) {
                                        if ($("#testimonial-active-<?php echo esc_attr($this->get_id()); ?>").length > 0) {
                                            $("#testimonial-active-<?php echo esc_attr($this->get_id()); ?>").slick({
                                                infinite: <?php echo $loop;  ?>,
                                                slidesToShow: 3,
                                                slidesToScroll: 1,
                                                dots: false,
                                                arrows: false,
                                                centerMode: true,
                                                variableWidth: true,
                                                autoplay: <?php echo $autoplay;  ?>,
                                                autoplaySpeed: 0,
                                                speed: <?php echo $settings['carousel_speed'] ?>,
                                                responsive: [{
                                                    breakpoint: 768,
                                                    settings: {
                                                        slidesToShow: 1,
                                                        dots: true,
                                                    },
                                                }, ],
                                            });
                                        }
                                    })
                                </script>
                                <div class="testimonials testimonial_active" id="testimonial-active-<?php echo esc_attr($this->get_id()); ?>">
                                    <?php foreach ($reviews as $review) :  ?>
                                        <div class="single_testimonial">
                                            <div class="testimonial_inner">
                                                <div class="testi_content">
                                                    <?php if ("content" == $review['tj_content_layout']) : ?>
                                                        <p class="text"><?php echo tj_kses($review['tj_review_text']); ?></p>
                                                        <span class="name"><?php echo tj_kses($review['tj_reviewer_name']); ?></span>
                                                    <?php elseif ("image" == $review['tj_content_layout']) : ?>
                                                        <img src="<?php echo esc_url($review['tj_review_image']['url']); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($review['tj_review_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- end: Testimonial Section -->

<?php
    }
}

$widgets_manager->register(new TJ_Testimonial());
