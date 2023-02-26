<?php

/**
 * bam customizer
 *
 * @package bam
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

/**
 * Added Panels & Sections
 */
function bam_customizer_panels_sections($wp_customize) {

  //Add panel
  $wp_customize->add_panel('bam_customizer', [
    'priority' => 10,
    'title'    => esc_html__('Bam Customizer', 'bam'),
  ]);

  /**
   * Customizer Section
   *
   */
  // Logos & Favicon
  $wp_customize->add_section('bam_theme_logos_favicon', [
    'title'       => esc_html__('Logos & Favicon', 'bam'),
    'description' => '',
    'priority'    => 10,
    'capability'  => 'edit_theme_options',
    'panel'       => 'bam_customizer',
  ]);

  // Header Settings
  $wp_customize->add_section('header_settings', [
    'title'       => esc_html__('Header Setting', 'bam'),
    'description' => '',
    'priority'    => 11,
    'capability'  => 'edit_theme_options',
    'panel'       => 'bam_customizer',
  ]);

  // Mobile Menu Settings
  $wp_customize->add_section('mobile_menu_settings', [
    'title'       => esc_html__('Mobile Menu Settings', 'bam'),
    'description' => '',
    'priority'    => 12,
    'capability'  => 'edit_theme_options',
    'panel'       => 'bam_customizer',
  ]);

  // Socials Settings
  $wp_customize->add_section('socials_settings', [
    'title'       => esc_html__('Socials', 'bam'),
    'description' => '',
    'priority'    => 13,
    'capability'  => 'edit_theme_options',
    'panel'       => 'bam_customizer',
  ]);

  // Breadcrumb Settings
  // $wp_customize->add_section('breadcrumb_setting', [
  //   'title'       => esc_html__('Breadcrumb Setting', 'bam'),
  //   'priority'    => 15,
  //   'capability'  => 'edit_theme_options',
  //   'panel'       => 'bam_customizer',
  // ]);

  // $wp_customize->add_section('blog_setting', [
  //   'title'       => esc_html__('Blog Setting', 'bam'),
  //   'description' => '',
  //   'priority'    => 15,
  //   'capability'  => 'edit_theme_options',
  //   'panel'       => 'bam_customizer',
  // ]);

  // Footer Settins
  $wp_customize->add_section('footer_setting', [
    'title'       => esc_html__('Footer Settings', 'bam'),
    'description' => '',
    'priority'    => 16,
    'capability'  => 'edit_theme_options',
    'panel'       => 'bam_customizer',
  ]);

  // 404 Pages
  $wp_customize->add_section('404_page', [
    'title'       => esc_html__('404 Page', 'bam'),
    'description' => '',
    'priority'    => 18,
    'capability'  => 'edit_theme_options',
    'panel'       => 'bam_customizer',
  ]);

  // $wp_customize->add_section('typo_setting', [
  //   'title'       => esc_html__('Typography Setting', 'bam'),
  //   'description' => '',
  //   'priority'    => 21,
  //   'capability'  => 'edit_theme_options',
  //   'panel'       => 'bam_customizer',
  // ]);
}
add_action('customize_register', 'bam_customizer_panels_sections');


/************************************ Customizer Fields *********************************
 * 
 * General Settings
 */
function _theme_general_settings_fields($fields) {
  // preloader
  $fields[] = [
    'type'     => 'switch',
    'settings' => 'bam_preloader',
    'label'    => esc_html__('Preloader?', 'bam'),
    'description' => esc_html__('Show preloader.', 'bam'),
    'section'  => 'bam_theme_general_settings',
    'default'  => '0',
    'priority' => 10,
    'choices'  => [
      'on'  => esc_html__('Enable', 'bam'),
      'off' => esc_html__('Disable', 'bam'),
    ],
  ];

  // backToTop
  $fields[] = [
    'type'     => 'switch',
    'settings' => 'bam_backtotop',
    'label'    => esc_html__('Back to Top', 'bam'),
    'description'    => esc_html__('Show back to top button', 'bam'),
    'section'  => 'bam_theme_general_settings',
    'default'  => '0',
    'priority' => 10,
    'choices'  => [
      'on'  => esc_html__('Enable', 'bam'),
      'off' => esc_html__('Disable', 'bam'),
    ],
  ];

  return $fields;
}
add_filter('kirki/fields', '_theme_general_settings_fields');

// logos & favicon fields
function _theme_logos_favicon_fields($fields) {
  // primary logo
  $fields[] = [
    'type'        => 'image',
    'settings'    => 'site_logo_white',
    'label'       => esc_html__('White Logo', 'bam'),
    'description' => esc_html__('Upload Your Logo.', 'bam'),
    'section'     => 'bam_theme_logos_favicon',
    'default'     => get_template_directory_uri() . '/assets/img/logo/LogolongWhite.png',
  ];
  $fields[] = [
    'type'        => 'image',
    'settings'    => 'site_logo_black',
    'label'       => esc_html__('Black Logo', 'bam'),
    'description' => esc_html__('Upload Your Logo.', 'bam'),
    'section'     => 'bam_theme_logos_favicon',
    'default'     => get_template_directory_uri() . '/assets/img/logo/Logolong.png',
  ];
  // preloader logo
  $fields[] = [
    'type'        => 'image',
    'settings'    => 'favicon_logo',
    'label'       => esc_html__('Favicon Logo', 'bam'),
    'description' => esc_html__('Upload Preloader Logo.', 'bam'),
    'section'     => 'bam_theme_logos_favicon',
    // 'default'     => get_template_directory_uri() . '/assets/img/logo/',
  ];

  return $fields;
}
add_filter('kirki/fields', '_theme_logos_favicon_fields');

// Header Settings
function _header_setting_fields($fields) {
  // header language
  $fields[] = [
    'type'     => 'switch',
    'settings' => 'header_lang',
    'label'    => esc_html__('Header language', 'bam'),
    'description'    => esc_html__('Show header language list.', 'bam'),
    'section'  => 'header_settings',
    'default'  => '1',
    'priority' => 10,
    'choices'  => [
      'on'  => esc_html__('Enable', 'bam'),
      'off' => esc_html__('Disable', 'bam'),
    ],
  ];

  return $fields;
}
add_filter('kirki/fields', '_header_setting_fields');

// mobile_menu_settings_fields
function _mobile_menu_settings_fields($fields) {
  // achievement_switch
  $fields[] = [
    'type'     => 'switch',
    'settings' => 'achievement_switch',
    'label'    => esc_html__('Achievement Switcher', 'bam'),
    'section'  => 'mobile_menu_settings',
    'default'  => '1',
    'priority' => 10,
    'choices'  => [
      'on'  => esc_html__('Enable', 'bam'),
      'off' => esc_html__('Disable', 'bam'),
    ],
  ];
  // achievement_title
  $fields[] = [
    'type'     => 'text',
    'settings' => 'achievement_title',
    'label'    => esc_html__('Achievement Title', 'bam'),
    'section'  => 'mobile_menu_settings',
    'default'  => esc_html__('Nos réalisations', 'bam'),
    'priority' => 10,
    'active_callback' => [
      [
        'setting'  => 'achievement_switch',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];
  // Project Link
  $fields[] = [
    'type'     => 'text',
    'settings' => 'projects_link',
    'label'    => esc_html__('Projects Link', 'bam'),
    'section'  => 'mobile_menu_settings',
    'default'  => esc_html__('#', 'bam'),
    'priority' => 10,
    'active_callback' => [
      [
        'setting'  => 'achievement_switch',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];
  // Competitions Link
  $fields[] = [
    'type'     => 'text',
    'settings' => 'competitions_link',
    'label'    => esc_html__('Competitions Link', 'bam'),
    'section'  => 'mobile_menu_settings',
    'default'  => esc_html__('#', 'bam'),
    'priority' => 10,
    'active_callback' => [
      [
        'setting'  => 'achievement_switch',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];
  // mobile_menu_switch
  $fields[] = [
    'type'     => 'switch',
    'settings' => 'mobile_menu_switch',
    'label'    => esc_html__('Mobile Menu Switcher', 'bam'),
    'section'  => 'mobile_menu_settings',
    'default'  => '1',
    'priority' => 10,
    'choices'  => [
      'on'  => esc_html__('Enable', 'bam'),
      'off' => esc_html__('Disable', 'bam'),
    ],
  ];
  // mobile_menu_title
  $fields[] = [
    'type'     => 'text',
    'settings' => 'mobile_menu_title',
    'label'    => esc_html__('Mobile Menu Title', 'bam'),
    'section'  => 'mobile_menu_settings',
    'default'  => esc_html__('À propos de nous', 'bam'),
    'priority' => 10,
    'active_callback' => [
      [
        'setting'  => 'mobile_menu_switch',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];
  // information_switch
  $fields[] = [
    'type'     => 'switch',
    'settings' => 'information_switch',
    'label'    => esc_html__('Information Switcher', 'bam'),
    'section'  => 'mobile_menu_settings',
    'default'  => '1',
    'priority' => 10,
    'choices'  => [
      'on'  => esc_html__('Enable', 'bam'),
      'off' => esc_html__('Disable', 'bam'),
    ],
  ];
  // information_title
  $fields[] = [
    'type'     => 'text',
    'settings' => 'information_title',
    'label'    => esc_html__('Information Title', 'bam'),
    'section'  => 'mobile_menu_settings',
    'default'  => esc_html__('Infos pratiques', 'bam'),
    'priority' => 10,
    'active_callback' => [
      [
        'setting'  => 'information_switch',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];
  // contact_link
  $fields[] = [
    'type'     => 'text',
    'settings' => 'contact_link',
    'label'    => esc_html__('Contact Link', 'bam'),
    'section'  => 'mobile_menu_settings',
    'default'  => esc_html__('#', 'bam'),
    'priority' => 10,
    'active_callback' => [
      [
        'setting'  => 'information_switch',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];
  // contest_link
  $fields[] = [
    'type'     => 'text',
    'settings' => 'contest_link',
    'label'    => esc_html__('Contest Link', 'bam'),
    'section'  => 'mobile_menu_settings',
    'default'  => esc_html__('#', 'bam'),
    'priority' => 10,
    'active_callback' => [
      [
        'setting'  => 'information_switch',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];

  return $fields;
}
add_filter('kirki/fields', '_mobile_menu_settings_fields');

// socials_settings_fields
function _socials_settings_fields($fields) {
  // social_switch
  $fields[] = [
    'type'     => 'switch',
    'settings' => 'social_switch',
    'label'    => esc_html__('Socials Switcher', 'bam'),
    'section'  => 'socials_settings',
    'default'  => '1',
    'priority' => 10,
    'choices'  => [
      'on'  => esc_html__('Enable', 'bam'),
      'off' => esc_html__('Disable', 'bam'),
    ],
  ];
  // facebook
  $fields[] = [
    'type'     => 'text',
    'settings' => 'facebook_link',
    'label'    => esc_html__('Facebook Link', 'bam'),
    'section'  => 'socials_settings',
    'default'  => esc_html__('https://facebook.com/', 'bam'),
    'priority' => 10,
    'active_callback' => [
      [
        'setting'  => 'social_switch',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];
  // instagram
  $fields[] = [
    'type'     => 'text',
    'settings' => 'instagram_link',
    'label'    => esc_html__('Instagram Link', 'bam'),
    'section'  => 'socials_settings',
    'default'  => esc_html__('https://instagram.com/', 'bam'),
    'priority' => 10,
    'active_callback' => [
      [
        'setting'  => 'social_switch',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];
  // twitter
  $fields[] = [
    'type'     => 'text',
    'settings' => 'twitter_link',
    'label'    => esc_html__('Twitter Link', 'bam'),
    'section'  => 'socials_settings',
    'default'  => esc_html__('https://twitter.com/', 'bam'),
    'priority' => 10,
    'active_callback' => [
      [
        'setting'  => 'social_switch',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];
  // linkedin
  $fields[] = [
    'type'     => 'text',
    'settings' => 'linkedin_link',
    'label'    => esc_html__('Linkedin Link', 'bam'),
    'section'  => 'socials_settings',
    'default'  => esc_html__(' ', 'bam'),
    'priority' => 10,
    'active_callback' => [
      [
        'setting'  => 'social_switch',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];
  // youtube
  $fields[] = [
    'type'     => 'text',
    'settings' => 'youtube_link',
    'label'    => esc_html__('Youtube Link', 'bam'),
    'section'  => 'socials_settings',
    'default'  => esc_html__(' ', 'bam'),
    'priority' => 10,
    'active_callback' => [
      [
        'setting'  => 'social_switch',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];

  return $fields;
}
add_filter('kirki/fields', '_socials_settings_fields');

// Breadcrumb Settings
function _breadcrumb_setting_fields($fields) {
  // Breadcrumb Setting
  $fields[] = [
    'type'        => 'image',
    'settings'    => 'breadcrumb_bg_img',
    'label'       => esc_html__('Background Image', 'bam'),
    'description' => esc_html__('', 'bam'),
    'section'     => 'breadcrumb_setting',
    // 'default'     => get_template_directory_uri() . '/assets/img/bg/page-bg.jpg',
  ];
  $fields[] = [
    'type'        => 'color',
    'settings'    => 'breadcrumb_bg_color',
    'label'       => __('Background Color', 'bam'),
    'description' => esc_html__('', 'bam'),
    'section'     => 'breadcrumb_setting',
    'default'     => '#343a40',
    'priority'    => 10,
  ];

  $fields[] = [
    'type'     => 'switch',
    'settings' => 'breadcrumb_info_switch',
    'label'    => esc_html__('Breadcrumb Info switch', 'bam'),
    'section'  => 'breadcrumb_setting',
    'default'  => '1',
    'priority' => 10,
    'choices'  => [
      'on'  => esc_html__('Enable', 'bam'),
      'off' => esc_html__('Disable', 'bam'),
    ],
  ];

  return $fields;
}
add_filter('kirki/fields', '_breadcrumb_setting_fields');

/*
Header Social
*/
function _header_blog_fields($fields) {
  // Blog Setting
  $fields[] = [
    'type'     => 'switch',
    'settings' => 'bam_blog_btn_switch',
    'label'    => esc_html__('Blog BTN On/Off', 'bam'),
    'section'  => 'blog_setting',
    'default'  => '1',
    'priority' => 10,
    'choices'  => [
      'on'  => esc_html__('Enable', 'bam'),
      'off' => esc_html__('Disable', 'bam'),
    ],
  ];

  $fields[] = [
    'type'     => 'switch',
    'settings' => 'bam_blog_cat',
    'label'    => esc_html__('Blog Category Meta On/Off', 'bam'),
    'section'  => 'blog_setting',
    'default'  => '1',
    'priority' => 10,
    'choices'  => [
      'on'  => esc_html__('Enable', 'bam'),
      'off' => esc_html__('Disable', 'bam'),
    ],
  ];

  $fields[] = [
    'type'     => 'switch',
    'settings' => 'bam_blog_author',
    'label'    => esc_html__('Blog Author Meta On/Off', 'bam'),
    'section'  => 'blog_setting',
    'default'  => '1',
    'priority' => 10,
    'choices'  => [
      'on'  => esc_html__('Enable', 'bam'),
      'off' => esc_html__('Disable', 'bam'),
    ],
  ];
  $fields[] = [
    'type'     => 'switch',
    'settings' => 'bam_blog_date',
    'label'    => esc_html__('Blog Date Meta On/Off', 'bam'),
    'section'  => 'blog_setting',
    'default'  => '1',
    'priority' => 10,
    'choices'  => [
      'on'  => esc_html__('Enable', 'bam'),
      'off' => esc_html__('Disable', 'bam'),
    ],
  ];
  $fields[] = [
    'type'     => 'switch',
    'settings' => 'bam_blog_comments',
    'label'    => esc_html__('Blog Comments Meta On/Off', 'bam'),
    'section'  => 'blog_setting',
    'default'  => '1',
    'priority' => 10,
    'choices'  => [
      'on'  => esc_html__('Enable', 'bam'),
      'off' => esc_html__('Disable', 'bam'),
    ],
  ];

  $fields[] = [
    'type'     => 'text',
    'settings' => 'breadcrumb_blog_title',
    'label'    => esc_html__('Blog Page Title', 'bam'),
    'section'  => 'blog_setting',
    'default'  => esc_html__('Blog', 'bam'),
    'priority' => 10,
  ];

  $fields[] = [
    'type'     => 'text',
    'settings' => 'bam_blog_btn',
    'label'    => esc_html__('Blog Button text', 'bam'),
    'section'  => 'blog_setting',
    'default'  => esc_html__('Read More', 'bam'),
    'priority' => 10,
  ];


  $fields[] = [
    'type'     => 'text',
    'settings' => 'breadcrumb_blog_title_details',
    'label'    => esc_html__('Blog Details Title', 'bam'),
    'section'  => 'blog_setting',
    'default'  => esc_html__('Blog Details', 'bam'),
    'priority' => 10,
  ];
  return $fields;
}
add_filter('kirki/fields', '_header_blog_fields');

/*
Footer
*/
function _footer_setting_fields($fields) {
  // footer_cta_switcher
  $fields[] = [
    'type'     => 'switch',
    'settings' => 'footer_cta_switcher',
    'label'    => esc_html__('Footer CTA Switcher', 'bam'),
    'description'    => esc_html__('Footer cta on/off?', 'bam'),
    'section'  => 'footer_setting',
    'default'  => '1',
    'priority' => 10,
    'choices'  => [
      'on'  => esc_html__('Enable', 'bam'),
      'off' => esc_html__('Disable', 'bam'),
    ],
  ];
  // footer_cta_title
  $fields[] = [
    'type'     => 'textarea',
    'settings' => 'footer_cta_title',
    'label'    => esc_html__('CTA Title', 'bam'),
    'section'  => 'footer_setting',
    'default'  => bam_kses('Vous avez un projet ? <span>Discutons-en</span>', 'bam'),
    'priority' => 10,
    'active_callback' => [
      [
        'setting'  => 'footer_cta_switcher',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];
  // footer_cta_btn_text
  $fields[] = [
    'type'     => 'text',
    'settings' => 'footer_cta_btn_text',
    'label'    => esc_html__('Button Text', 'bam'),
    'section'  => 'footer_setting',
    'default'  => esc_html__('Prendre un rdv téléphonique', 'bam'),
    'priority' => 10,
    'active_callback' => [
      [
        'setting'  => 'footer_cta_switcher',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];
  // footer_cta_btn_link
  $fields[] = [
    'type'     => 'text',
    'settings' => 'footer_cta_btn_link',
    'label'    => esc_html__('Button Link', 'bam'),
    'section'  => 'footer_setting',
    'default'  => esc_html__('#', 'bam'),
    'priority' => 10,
    'active_callback' => [
      [
        'setting'  => 'footer_cta_switcher',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];
  // footer_marquee_switcher
  $fields[] = [
    'type'     => 'switch',
    'settings' => 'footer_marquee_switcher',
    'label'    => esc_html__('Footer Marquee Switcher', 'bam'),
    'description'    => esc_html__('Marquee on/off?', 'bam'),
    'section'  => 'footer_setting',
    'default'  => '1',
    'priority' => 10,
    'choices'  => [
      'on'  => esc_html__('Enable', 'bam'),
      'off' => esc_html__('Disable', 'bam'),
    ],
  ];
  // marquee_headline
  $fields[] = [
    'type'     => 'text',
    'settings' => 'marquee_headline',
    'label'    => esc_html__('Marquee Headline', 'bam'),
    'section'  => 'footer_setting',
    'default'  => esc_html__('Domaines d’activité', 'bam'),
    'priority' => 10,
    'active_callback' => [
      [
        'setting'  => 'footer_marquee_switcher',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];
  // marquee_images
  $fields[] = [
    'type'     => 'repeater',
    'label'    => esc_html__('Marquee Images', 'bam'),
    'section'  => 'footer_setting',
    'priority' => 10,
    'row_label' => [
      'type'     => 'text',
      'value'    => esc_html__('Image', 'bam'),
    ],

    'button_label' => esc_html__('Add Image', 'bam'),

    'settings'     => 'marquee_images',
    'fields' => [
      'bam_marquee_image' => [
        'type'         => 'image',
        'label'        => esc_html__('Image', 'bam'),
        'description'  => esc_attr__('Upload marquee image', 'bam'),
      ]
    ],
    'active_callback' => [
      [
        'setting'  => 'footer_marquee_switcher',
        'operator' => '==',
        'value'    => true,
      ],
    ],
  ];

  $fields[] = [
    'type'     => 'text',
    'settings' => 'bam_copyright',
    'label'    => esc_html__('Copyright Text', 'bam'),
    'section'  => 'footer_setting',
    'default'  => esc_html__('&copy; 2023, Because Architecture Matters', 'bam'),
    'priority' => 11,
  ];

  $fields[] = [
    'type'     => 'text',
    'settings' => 'footer_bottom_right_btn_text',
    'label'    => esc_html__('Right Button Text', 'bam'),
    'section'  => 'footer_setting',
    'default'  => esc_html__('site by pepperclip studio', 'bam'),
    'priority' => 11,
  ];
  $fields[] = [
    'type'     => 'text',
    'settings' => 'footer_bottom_right_btn_link',
    'label'    => esc_html__('Right Button Link', 'bam'),
    'section'  => 'footer_setting',
    'default'  => esc_html__('#', 'bam'),
    'priority' => 11,
  ];


  return $fields;
}
add_filter('kirki/fields', '_footer_setting_fields');


// 404
function bam_404_fields($fields) {
  // 404 settings
  $fields[] = [
    'type'        => 'image',
    'settings'    => 'bam_404_bg',
    'label'       => esc_html__('404 Image.', 'bam'),
    'description' => esc_html__('404 Image.', 'bam'),
    'section'     => '404_page',
  ];
  $fields[] = [
    'type'     => 'text',
    'settings' => 'bam_error_title',
    'label'    => esc_html__('Not Found Title', 'bam'),
    'section'  => '404_page',
    'default'  => esc_html__('Page not found', 'bam'),
    'priority' => 10,
  ];
  $fields[] = [
    'type'     => 'textarea',
    'settings' => 'bam_error_desc',
    'label'    => esc_html__('404 Description Text', 'bam'),
    'section'  => '404_page',
    'default'  => esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted', 'bam'),
    'priority' => 10,
  ];
  $fields[] = [
    'type'     => 'text',
    'settings' => 'bam_error_link_text',
    'label'    => esc_html__('404 Link Text', 'bam'),
    'section'  => '404_page',
    'default'  => esc_html__('Back To Home', 'bam'),
    'priority' => 10,
  ];
  return $fields;
}
add_filter('kirki/fields', 'bam_404_fields');


/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function Bam_Theme_option($name) {
  $value = '';
  if (class_exists('bam')) {
    $value = Kirki::get_option(bam_get_theme(), $name);
  }

  return apply_filters('Bam_Theme_option', $value, $name);
}

/**
 * Get config ID
 *
 * @return string
 */
function bam_get_theme() {
  return 'bam';
}
