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
 * Elementor widget for Services.
 *
 */
class TJ_Services extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     */
    public function get_name() {
        return 'tj-services';
    }

    /**
     * Retrieve the widget title.
     *
     */
    public function get_title() {
        return __('TJ Services', 'tjcore');
    }

    /**
     * Retrieve the widget icon.
     *
     */
    public function get_icon() {
        return 'eicon-featured-image tj-icon';
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
            'service',
            'services',
            'tj services',
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
                'default' => 3,
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
                'default' => 'h2',
            ]
        );
        $this->end_controls_section();

        // TAB_STYLE
        $this->start_controls_section(
            'service_title',
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
            'title_margin',
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
            'title_padding',
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

        // descripton_STYLE
        $this->start_controls_section(
            'service_desc',
            [
                'label' => __('Description', 'tjcore'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'selector' => '{{WRAPPER}} .feature_inner .feature_content p',
            ]
        );
        $this->add_control(
            'desc_color',
            [
                'label' => esc_html__('Description Color', 'tjcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_inner .feature_content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'desc_margin',
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
            'desc_padding',
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

        $args = [
            'posts_per_page' => $settings['show_item'],
            'post_type' => 'services',
            'order' => $settings['order'],
        ];

        $services = new \WP_Query($args);

?>
        <!-- start: Feature Section -->
        <section class="feature-section">
            <div class="container gx-0 gx-md-4 overflow-hidden">
                <div class="row">
                    <div class="col">
                        <div class="feature_section_content haspadding">
                            <div class="content_wrap">
                                <?php if ($services->have_posts()) : ?>
                                    <div class="features">
                                        <?php while ($services->have_posts()) : $services->the_post();
                                            $excerpt = function_exists('get_field') ? get_field('excerpt', get_the_ID()) : '';
                                            $this->add_render_attribute('title_args', 'class', 'title');
                                        ?>


                                            <div class="single_feature">
                                                <div class="feature_inner">
                                                    <div class="feature_content">
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
                                                        <a href="<?php the_permalink(); ?>" class="btn"><?php esc_html_e('En savoir plus', 'tjcore') ?></a>
                                                    </div>
                                                    <div class="feature_img">
                                                        <?php the_post_thumbnail(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile;
                                        wp_reset_postdata(); ?>
                                    </div>
                                <?php else :
                                    esc_html_e('No service item found!', 'tjcore');
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: Feature Section -->

<?php
    }
}

$widgets_manager->register(new TJ_Services());
