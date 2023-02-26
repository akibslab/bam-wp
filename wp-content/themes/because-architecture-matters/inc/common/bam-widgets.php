<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bam_widgets_init() {
    /**
     * blog sidebar
     */
    register_sidebar([
        'name'          => esc_html__('Blog Sidebar', 'bam'),
        'id'            => 'blog-sidebar',
        'before_widget' => '<div id="%1$s" class="ss-sidebar__widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="ss-sidebar-widget__head"><h3 class="ss-sidebar-widget__title">',
        'after_title'   => '</h3></div>',
    ]);

    register_sidebar([
        'name'          => esc_html__('Footer Widget 1', 'bam'),
        'id'            => 'footer-widget-1',
        'description'   => esc_html__('This widget content will be show widget 1', 'bam'),
        'before_widget' => '<div id="%1$s" class="footer_widget footer-column__1 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="footer-widget_title">',
        'after_title'   => '</h5>',
    ]);
    register_sidebar([
        'name'          => esc_html__('Footer Widget 2', 'bam'),
        'id'            => 'footer-widget-2',
        'description'   => esc_html__('This widget content will be show widget 2', 'bam'),
        'before_widget' => '<div id="%1$s" class="footer_widget footer-column__2 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="footer-widget_title">',
        'after_title'   => '</h5>',
    ]);
    register_sidebar([
        'name'          => esc_html__('Footer Widget 3', 'bam'),
        'id'            => 'footer-widget-3',
        'description'   => esc_html__('This widget content will be show widget 3', 'bam'),
        'before_widget' => '<div id="%1$s" class="footer_widget footer-column__3 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="footer-widget_title">',
        'after_title'   => '</h5>',
    ]);
    register_sidebar([
        'name'          => esc_html__('Footer Widget 4', 'bam'),
        'id'            => 'footer-widget-4',
        'description'   => esc_html__('This widget content will be show widget 4', 'bam'),
        'before_widget' => '<div id="%1$s" class="footer_widget footer-column__4 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="footer-widget_title">',
        'after_title'   => '</h5>',
    ]);
    register_sidebar([
        'name'          => esc_html__('Footer Widget 5', 'bam'),
        'id'            => 'footer-widget-5',
        'description'   => esc_html__('This widget content will be show widget 5', 'bam'),
        'before_widget' => '<div id="%1$s" class="footer_widget footer-column__5 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="footer-widget_title">',
        'after_title'   => '</h5>',
    ]);
}
add_action('widgets_init', 'bam_widgets_init');
