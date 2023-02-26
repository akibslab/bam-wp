<?php

/**
 * bam_scripts description
 * @return [type] [description]
 */
function bam_scripts() {

    /**
     * all css files
     */

    wp_enqueue_style('bootstrap', BAM_THEME_CSS_DIR . 'bootstrap.min.css', []);
    wp_enqueue_style('font-awesome-pro', BAM_THEME_CSS_DIR . 'font-awesome-pro.css', []);
    wp_enqueue_style('magnific-popup', BAM_THEME_CSS_DIR . 'magnific-popup.min.css', []);
    wp_enqueue_style('slick', BAM_THEME_CSS_DIR . 'slick.css', []);
    wp_enqueue_style('bam-core', BAM_THEME_CSS_DIR . 'bam-core.css', []);
    wp_enqueue_style('bam-unit', BAM_THEME_CSS_DIR . 'bam-unit.css', []);
    wp_enqueue_style('bam-responsive', BAM_THEME_CSS_DIR . 'bam-responsive.css', []);
    wp_enqueue_style('bam-custom', BAM_THEME_CSS_DIR . 'bam-custom.css', []);
    wp_enqueue_style('bam-style', get_stylesheet_uri());

    // all js
    wp_enqueue_script('bootstrap-bundle', BAM_THEME_JS_DIR . 'bootstrap.bundle.min.js', ['jquery'], '', true);
    wp_enqueue_script('magnific-popup', BAM_THEME_JS_DIR . 'magnific-popup.min.js', ['jquery'], '', true);
    wp_enqueue_script('nav', BAM_THEME_JS_DIR . 'jquery.nav.js', ['jquery'], '', true);
    wp_enqueue_script('slick', BAM_THEME_JS_DIR . 'slick.min.js', ['jquery'], '', true);
    wp_enqueue_script('vide', BAM_THEME_JS_DIR . 'vide.min.js', ['jquery'], '', true);
    wp_enqueue_script('bam-main', BAM_THEME_JS_DIR . 'main.js', ['jquery'], false, true);

    wp_localize_script('bam-main', 'ajax_projects', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'noposts' => __('No older posts found', 'bam'),
    ));

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'bam_scripts');
