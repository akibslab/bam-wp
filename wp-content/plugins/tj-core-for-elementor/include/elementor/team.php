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
 * Elementor widget for Team.
 *
 */
class TJ_Team extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     */
    public function get_name() {
        return 'tj-team';
    }

    /**
     * Retrieve the widget title.
     *
     */
    public function get_title() {
        return __('TJ Team', 'tjcore');
    }

    /**
     * Retrieve the widget icon.
     *
     */
    public function get_icon() {
        return 'eicon-person tj-icon';
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
            'team',
            'users',
            'tj team',
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

        // member list
        $this->start_controls_section(
            'tj_content',
            [
                'label' => __('Content', 'tjcore'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'tj_member_img',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __('Image', 'tjcore'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tj_member_name',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Name', 'tjcore'),
                'default' => __('TJ member name', 'tjcore'),
                'placeholder' => __('Type member name here.', 'tjcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $repeater->add_control(
            'tj_member_designation',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'label' => __('Designation', 'tjcore'),
                'default' => __('TJ Officer', 'tjcore'),
                'placeholder' => __('Type designation here', 'tjcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        // REPEATER
        $this->add_control(
            'team_members',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ tj_member_name }}}',
                'default' => [
                    [
                        'tj_member_name' => tj_kses('<span>Anaïs</span> Rogeon'),
                        'tj_member_designation' => tj_kses('Architecte
                    & Programmiste'),
                        'tj_member_img' => [
                            'url' => get_template_directory_uri() . "/assets/img/team/1.png"
                        ],
                    ],
                    [
                        'tj_member_name' => tj_kses('<span>Bastien</span> Treille'),
                        'tj_member_designation' => tj_kses('Architecte
                        & Resp. Pôle AMO'),
                        'tj_member_img' => [
                            'url' => get_template_directory_uri() . "/assets/img/team/2.png"
                        ],
                    ],
                    [
                        'tj_member_name' => tj_kses('<span>Boris</span> Lefèvre'),
                        'tj_member_designation' => tj_kses('Architecte
                        & COO'),
                        'tj_member_img' => [
                            'url' => get_template_directory_uri() . "/assets/img/team/3.png"
                        ],
                    ],
                    [
                        'tj_member_name' => tj_kses('<span>Florent</span> Souchère'),
                        'tj_member_designation' => tj_kses('Communication
                        visuelle'),
                        'tj_member_img' => [
                            'url' => get_template_directory_uri() . "/assets/img/team/4.png"
                        ],
                    ],
                    [
                        'tj_member_name' => tj_kses('<span>Mathias</span> Boutier'),
                        'tj_member_designation' => tj_kses('CEO'),
                        'tj_member_img' => [
                            'url' => get_template_directory_uri() . "/assets/img/team/5.png"
                        ],
                    ],
                    [
                        'tj_member_name' => tj_kses('<span>Victor</span> Daweritz'),
                        'tj_member_designation' => tj_kses('Ingénieur Génie
                        Environnement'),
                        'tj_member_img' => [
                            'url' => get_template_directory_uri() . "/assets/img/team/6.png"
                        ],
                    ],
                ]
            ]
        );
        $this->end_controls_section();

        // STYLE TAB
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'tjcore'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_transform',
            [
                'label' => __('Text Transform', 'tjcore'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => __('None', 'tjcore'),
                    'uppercase' => __('UPPERCASE', 'tjcore'),
                    'lowercase' => __('lowercase', 'tjcore'),
                    'capitalize' => __('Capitalize', 'tjcore'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
                ],
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

?>
        <!-- start: Team Section -->
        <?php if (!empty($settings['team_members'])) : ?>
            <section class="team-section">
                <div class="container gx-0 gx-md-4 overflow-hidden">
                    <div class="row">
                        <div class="col">
                            <div class="team_section_content haspadding">
                                <div class="teams">
                                    <div class="row gx-4 gx-lg-5 team-carousel">

                                        <?php foreach ($settings['team_members'] as $member) : ?>
                                            <div class="col-md-6 col-lg-4">
                                                <div class="single_team">
                                                    <div class="image">
                                                        <img src="<?php echo esc_url($member['tj_member_img']['url']) ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($member['tj_member_img']['url']), '_wp_attachment_image_alt', true); ?>">
                                                    </div>
                                                    <div class="team_content">
                                                        <h3><?php echo tj_kses($member['tj_member_name']); ?> <span class="designation">— <?php echo tj_kses($member['tj_member_designation']); ?></span></h3>
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
        <?php endif; ?>
        <!-- end: Team Section -->

<?php
    }
}

$widgets_manager->register(new TJ_Team());
