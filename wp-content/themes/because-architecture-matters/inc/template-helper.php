<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bam
 */

/**
 * [bam_header_lang description]
 * @return [type] [description]
 */
function bam_lang() {
    $bam_header_lang = get_theme_mod('header_lang', true);
    if ($bam_header_lang) : ?>

        <ul>
            <li><a href="javascript:void(0)"><?php echo esc_html__('FR', 'bam'); ?> <i class="fas fa-globe"></i></a>
                <?php do_action('bam_language'); ?>
            </li>
        </ul>
    <?php endif; ?>
<?php
}

/**
 * [bam_language_list description]
 * @return [type] [description]
 */
function _bam_language($mar) {
    return $mar;
}
function bam_language_list() {

    $mar = '';
    $languages = apply_filters('wpml_active_languages', NULL, 'orderby=id&order=desc');

    if (!empty($languages)) {
        $mar = '<ul>';
        foreach ($languages as $lan) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar = "<ul>";
        $mar .= '<li><a href="' . esc_url('#') . '">' . esc_html__('En', 'bam') . '<i class="fas fa-globe"></i></a><li>';
        $mar .= '<li><a href="' . esc_url('#') . '">' . esc_html__('Es', 'bam') . '<i class="fas fa-globe"></i></a><li>';
        $mar .= "</ul>";
    }
    print _bam_language($mar);
}
add_action('bam_language', 'bam_language_list');


// Header logo
function bam_header_logo() { ?>
    <?php
    // site logo
    $bam_white_logo = get_template_directory_uri() . '/assets/img/logo/LogolongWhite.png';
    $bam_black_logo = get_template_directory_uri() . '/assets/img/logo/Logolong.png';
    $bam_site_white_logo = get_theme_mod('site_logo_white', $bam_white_logo);
    $bam_site_black_logo = get_theme_mod('site_logo_black', $bam_black_logo);
    ?>
    <a href="<?php print esc_url(home_url('/')); ?>">
        <img class="white" src="<?php echo esc_url($bam_site_white_logo); ?>" alt="<?php print esc_attr__('logo', 'bam'); ?>" />
        <img class="black" src="<?php echo esc_url($bam_site_black_logo); ?>" alt="<?php print esc_attr__('logo', 'bam'); ?>" />
    </a>
    <?php
}

function bam_site_icon() {
    $bam_site_icon = get_template_directory_uri() . '/assets/img/logo/LogolongWhite.png';
    $site_icon = get_theme_mod('favicon_logo', $bam_site_icon);
    if (!has_site_icon()) { ?>
        <link rel="shortcut icon" href="<?php echo esc_url($site_icon); ?>" type="image/x-icon">
    <?php
    }
}


// Header Mobile Logo
function bam_mobile_logo() {
    // side info
    $bam_mobile_logo_hide = get_theme_mod('bam_mobile_logo_hide', false);

    $bam_site_logo = get_theme_mod('primary_logo', get_template_directory_uri() . '/assets/img/logo/logo-white.png');

    if (!empty($bam_mobile_logo_hide)) : ?>
        <div class="side__logo mb-25">
            <a class="sideinfo-logo" href="<?php print esc_url(home_url('/')); ?>">
                <img src="<?php print esc_url($bam_site_logo); ?>" alt="<?php print esc_attr__('logo', 'bam'); ?>" />
            </a>
        </div>
    <?php endif;
}

/**
 * [bam_socials description]
 * @return [type] [description]
 */
function bam_socials() {
    $facebook_link = get_theme_mod('facebook_link', __('https://facebook.com/', 'bam'));
    $instagram_link = get_theme_mod('header_ig_link', __('https://instagram.com/', 'bam'));
    $twitter_link = get_theme_mod('header_twitter_link', __('https://twitter.com/', 'bam'));
    $linkedin_link = get_theme_mod('header_linkedin_link', __('', 'bam'));
    $youtube_link = get_theme_mod('header_youtube_link', __('', 'bam'));


    if (!empty($facebook_link)) : ?>
        <li><a href="<?php echo esc_url($facebook_link); ?>"><i class="fab fa-facebook-f"></i></a></li>
    <?php endif;
    if (!empty($instagram_link)) : ?>
        <li><a href="<?php echo esc_url($instagram_link); ?>"><i class="fab fa-instagram"></i></a></li>
    <?php endif;
    if (!empty($linkedin_link)) : ?>
        <li><a href="<?php echo esc_url($linkedin_link); ?>"><i class="fab fa-linkedin-in"></i></a></li>
    <?php endif;
    if (!empty($twitter_link)) : ?>
        <li><a href="<?php echo esc_url($twitter_link); ?>"><i class="fab fa-twitter"></i></a></li>
    <?php endif;
    if (!empty($youtube_link)) : ?>
        <li><a href="<?php echo esc_url($youtube_link); ?>"><i class="fab fa-youtube"></i></a></li>
<?php endif;
}


/**
 * [bam_header_menu description]
 * @return [type] [description]
 */
function bam_header_menu() {

    wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'Bam_Navwalker_Class::fallback',
        'walker'         => new Bam_Navwalker_Class,
    ]);
}

/**
 * [bam_header_menu description]
 * @return [type] [description]
 */
function bam_mobile_menu() {

    wp_nav_menu([
        'theme_location' => 'mobile-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'Bam_Navwalker_Class::fallback',
        'walker'         => new Bam_Navwalker_Class,
    ]);
}


/**
 * [bam_footer_menu description]
 * @return [type] [description]
 */
function bam_footer_menu() {
    wp_nav_menu([
        'theme_location' => 'footer-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'Bam_Navwalker_Class::fallback',
        'walker'         => new Bam_Navwalker_Class,
    ]);
}
// bam_copyright_text
function bam_copyright_text() {
    print get_theme_mod('bam_copyright', bam_kses('&copy; 2023, Because Architecture Matters'));
}


/**
 *
 * pagination
 */
if (!function_exists('bam_pagination')) {

    function _bam_pagi_callback($pagination) {
        return $pagination;
    }

    //page navigation
    function bam_pagination($prev, $next, $pages, $args) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if (!$pages) {
                $pages = 1;
            }
        }

        $pagination = [
            'base'      => add_query_arg('paged', '%#%'),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ($wp_rewrite->using_permalinks()) {
            $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');
        }

        if (!empty($wp_query->query_vars['s'])) {
            $pagination['add_args'] = ['s' => get_query_var('s')];
        }

        $pagi = '';
        if (paginate_links($pagination) != '') {
            $paginations = paginate_links($pagination);
            $pagi .= '<ul>';
            foreach ($paginations as $key => $pg) {
                $pagi .= '<li>' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _bam_pagi_callback($pagi);
    }
}


// header top bg color
function bam_breadcrumb_bg_color() {
    $color_code = get_theme_mod('bam_breadcrumb_bg_color', '#222');
    wp_enqueue_style('bam-custom', BAM_THEME_CSS_DIR . 'bam-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: " . $color_code . "}";

        wp_add_inline_style('bam-breadcrumb-bg', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bam_breadcrumb_bg_color');

// breadcrumb-spacing top
function bam_breadcrumb_spacing() {
    $padding_px = get_theme_mod('bam_breadcrumb_spacing', '160px');
    wp_enqueue_style('bam-custom', BAM_THEME_CSS_DIR . 'bam-custom.css', []);
    if ($padding_px != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: " . $padding_px . "}";

        wp_add_inline_style('bam-breadcrumb-top-spacing', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bam_breadcrumb_spacing');

// breadcrumb-spacing bottom
function bam_breadcrumb_bottom_spacing() {
    $padding_px = get_theme_mod('bam_breadcrumb_bottom_spacing', '160px');
    wp_enqueue_style('bam-custom', BAM_THEME_CSS_DIR . 'bam-custom.css', []);
    if ($padding_px != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: " . $padding_px . "}";

        wp_add_inline_style('bam-breadcrumb-bottom-spacing', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bam_breadcrumb_bottom_spacing');

// scrollUp
function bam_scrollup_switch() {
    $scrollup_switch = get_theme_mod('bam_scrollup_switch', false);
    wp_enqueue_style('bam-custom', BAM_THEME_CSS_DIR . 'bam-custom.css', []);
    if ($scrollup_switch) {
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style('bam-scrollup-switch', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bam_scrollup_switch');

// theme custom color
function bam_custom_color() {
    $color_code = get_theme_mod('bam_color_option', '#2b4eff');
    wp_enqueue_style('bam-custom', BAM_THEME_CSS_DIR . 'bam-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".demo-class { background-color: " . $color_code . "}";

        $custom_css .= ".demo-class { color: " . $color_code . "}";

        $custom_css .= ".demo-class { border-color: " . $color_code . "}";
        $custom_css .= ".demo-class { border-left-color: " . $color_code . "}";
        $custom_css .= ".demo-class { stroke: " . $color_code . "}";
        $custom_css .= ".demo-class { border-color: " . $color_code . "}";
        wp_add_inline_style('bam-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bam_custom_color');


// theme primary color
function bam_custom_color_primary() {
    $color_code = get_theme_mod('bam_color_option_2', '#f2277e');
    wp_enqueue_style('bam-custom', BAM_THEME_CSS_DIR . 'bam-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".demo-class { background-color: " . $color_code . "}";

        $custom_css .= ".demo-class { color: " . $color_code . "}";

        $custom_css .= ".demo-class { border-left-color: " . $color_code . "}";
        wp_add_inline_style('bam-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bam_custom_color_primary');

// theme scrollUp color
function bam_custom_color_scrollup() {
    $color_code = get_theme_mod('bam_color_scrollup', '#2b4eff');
    wp_enqueue_style('bam-custom', BAM_THEME_CSS_DIR . 'bam-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".demo-class { color: " . $color_code . "}";
        $custom_css .= ".demo-class { stroke: " . $color_code . "}";
        wp_add_inline_style('bam-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bam_custom_color_scrollup');

// theme secondary color
function bam_custom_color_secondary() {
    $color_code = get_theme_mod('bam_color_option_3', '#30a820');
    wp_enqueue_style('bam-custom', BAM_THEME_CSS_DIR . 'bam-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".demo-class { background-color: " . $color_code . "}";

        $custom_css .= ".demo-class { color: " . $color_code . "}";

        $custom_css .= ".asdf { border-color: " . $color_code . "}";
        wp_add_inline_style('bam-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bam_custom_color_secondary');

// theme secondary 2 color
function bam_custom_color_secondary_2() {
    $color_code = get_theme_mod('bam_color_option_3_2', '#ffb352');
    wp_enqueue_style('bam-custom', BAM_THEME_CSS_DIR . 'bam-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".demo-class { background-color: " . $color_code . "}";

        $custom_css .= ".demo-class { color: " . $color_code . "}";

        $custom_css .= ".demo-class { border-color: " . $color_code . "}";
        wp_add_inline_style('bam-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bam_custom_color_secondary_2');


// bam_kses_intermediate
function bam_kses_intermediate($string = '') {
    return wp_kses($string, bam_get_allowed_html_tags('intermediate'));
}

function bam_get_allowed_html_tags($level = 'basic') {
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}

// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function bam_kses($raw) {

    $allowed_tags = array(
        'a'                         => array(
            'class'   => array(),
            'href'    => array(),
            'rel'  => array(),
            'title'   => array(),
            'target' => array(),
        ),
        'abbr'                      => array(
            'title' => array(),
        ),
        'b'                         => array(),
        'blockquote'                => array(
            'cite' => array(),
        ),
        'cite'                      => array(
            'title' => array(),
        ),
        'code'                      => array(),
        'del'                    => array(
            'datetime'   => array(),
            'title'      => array(),
        ),
        'dd'                     => array(),
        'div'                    => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'dl'                     => array(),
        'dt'                     => array(),
        'em'                     => array(),
        'h1'                     => array(),
        'h2'                     => array(),
        'h3'                     => array(),
        'h4'                     => array(),
        'h5'                     => array(),
        'h6'                     => array(),
        'i'                         => array(
            'class' => array(),
        ),
        'img'                    => array(
            'alt'  => array(),
            'class'   => array(),
            'height' => array(),
            'src'  => array(),
            'width'   => array(),
        ),
        'li'                     => array(
            'class' => array(),
        ),
        'ol'                     => array(
            'class' => array(),
        ),
        'p'                         => array(
            'class' => array(),
        ),
        'q'                         => array(
            'cite'    => array(),
            'title'   => array(),
        ),
        'span'                      => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'iframe'                 => array(
            'width'         => array(),
            'height'     => array(),
            'scrolling'     => array(),
            'frameborder'   => array(),
            'allow'         => array(),
            'src'        => array(),
        ),
        'strike'                 => array(),
        'br'                     => array(),
        'strong'                 => array(),
        'data-wow-duration'            => array(),
        'data-wow-delay'            => array(),
        'data-wallpaper-options'       => array(),
        'data-stellar-background-ratio'   => array(),
        'ul'                     => array(
            'class' => array(),
        ),
        'svg' => array(
            'class' => true,
            'aria-hidden' => true,
            'aria-labelledby' => true,
            'role' => true,
            'xmlns' => true,
            'width' => true,
            'height' => true,
            'viewbox' => true, // <= Must be lower case!
        ),
        'g'     => array('fill' => true),
        'title' => array('title' => true),
        'path'  => array('d' => true, 'fill' => true,),
    );

    if (function_exists('wp_kses')) { // WP is here
        $allowed = wp_kses($raw, $allowed_tags);
    } else {
        $allowed = $raw;
    }

    return $allowed;
}



// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

    global $wp_version;
    if ($wp_version !== '4.7.1') {
        return $data;
    }

    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

function tp_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'tp_mime_types');
