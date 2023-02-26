<?php

/**
 * bam functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bam
 */

if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if (!function_exists('bam_setup')) :

   function bam_setup() {
      /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
      load_theme_textdomain('bam', get_template_directory() . '/languages');

      /**
       * Add default posts and comments RSS feed links to head.
       * */
      add_theme_support('automatic-feed-links');

      /*
      * Let WordPress manage the document title.
      */
      add_theme_support('title-tag');

      /*
      * Enable support for Post Thumbnails on posts and pages.
      */
      add_theme_support('post-thumbnails');

      /*
      * Switch default core markup for search form, comment form, and comments
      * to output valid HTML5.
      */
      add_theme_support(
         'html5',
         array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
            'navigation-widgets',
         )
      );

      /**
       * Set up the WordPress core custom background feature.
       */
      add_theme_support(
         'custom-background',
         apply_filters(
            'bam_custom_background_args',
            array(
               'default-color' => 'ffffff',
               'default-image' => '',
            )
         )
      );

      /**
       * Add theme support for selective refresh for widgets.
       */
      add_theme_support('customize-selective-refresh-widgets');

      // Add support for custom header
      add_theme_support("custom-header");


      /**
       * Add post-formats support.
       */
      add_theme_support(
         'post-formats',
         array(
            'image',
            'audio',
            'video',
            'gallery',
            'quote',
            // 'link',
            // 'aside',
            // 'status',
            // 'chat',
         )
      );

      // Add support for Block Styles.
      add_theme_support('wp-block-styles');

      // Add support for full and wide align images.
      add_theme_support('align-wide');

      // Add support for editor styles.
      add_theme_support('editor-styles');

      // Add support for responsive embedded content.
      add_theme_support('responsive-embeds');

      // remove block widgets
      remove_theme_support('widgets-block-editor');

      /**
       * This theme uses wp_nav_menu() in one location.
       */
      register_nav_menus([
         'main-menu' => esc_html__('Main Menu', 'bam'),
         'mobile-menu' => esc_html__('Mobile Menu', 'bam'),
         'footer-menu' => esc_html__('Footer Menu', 'bam'),
      ]);
   }
endif;
add_action('after_setup_theme', 'bam_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bam_content_width() {
   // This variable is intended to be overruled from themes.
   // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
   // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
   $GLOBALS['content_width'] = apply_filters('bam_content_width', 640);
}
add_action('after_setup_theme', 'bam_content_width', 0);


/**
 * Enqueue scripts and styles.
 */

define('BAM_THEME_DIR', get_template_directory());
define('BAM_THEME_URI', get_template_directory_uri());
define('BAM_THEME_CSS_DIR', BAM_THEME_URI . '/assets/css/');
define('BAM_THEME_JS_DIR', BAM_THEME_URI . '/assets/js/');
define('BAM_THEME_INC', BAM_THEME_DIR . '/inc/');

// wp_body_open
if (!function_exists('wp_body_open')) {
   function wp_body_open() {
      do_action('wp_body_open');
   }
}


/**
 * Implement the Custom Header feature.
 */
require BAM_THEME_INC . 'custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require BAM_THEME_INC . 'template-functions.php';

/**
 * Custom template helper function for this theme.
 */
require BAM_THEME_INC . 'template-helper.php';

/**
 * initialize kirki customizer class.
 */
include_once BAM_THEME_INC . 'bam-customizer.php';
include_once BAM_THEME_INC . 'class-kirki-customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
   require BAM_THEME_INC . 'jetpack.php';
}

/**
 * include bam functions file
 */
require_once BAM_THEME_INC . 'class-navwalker.php';
if (!class_exists('TGM_Plugin_Activation')) {
   require_once BAM_THEME_INC . 'required-plugin.php';
}
require_once BAM_THEME_INC . '/common/bam-breadcrumb.php';
require_once BAM_THEME_INC . '/common/bam-scripts.php';
require_once BAM_THEME_INC . '/common/bam-widgets.php';

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function bam_pingback_header() {
   if (is_singular() && pings_open()) {
      printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
   }
}
add_action('wp_head', 'bam_pingback_header');

// Change position in comment form
// ----------------------------------------------------------------------------------------
function bam_theme_comment_field($fields) {
   $comment = $fields['comment'];
   $author  = $fields['author'];
   $email   = $fields['email'];
   $url     = $fields['url'];
   $cookies = $fields['cookies'];

   unset($fields['comment']);
   unset($fields['author']);
   unset($fields['email']);
   unset($fields['url']);
   unset($fields['cookies']);

   $fields['author']  = $author;
   $fields['email']   = $email;
   $fields['url']     = $url;
   $fields['comment'] = $comment;
   $fields['cookies'] = $cookies;

   return $fields;
}
add_filter('comment_form_fields', 'bam_theme_comment_field');


// bam_comment 
if (!function_exists('bam_comment')) {
   function bam_comment($comment, $args, $depth) {
      $GLOBAL['comment'] = $comment;
      extract($args, EXTR_SKIP);
      $args['reply_text'] = 'Reply';
      $replayClass = 'comment-depth-' . esc_attr($depth);
?>
      <li class="ss__comment" id="comment-<?php comment_ID(); ?>">
         <div class="ss-comment__wrap">
            <div class="comment__avatar">
               <?php print get_avatar($comment, 102, null, null, ['class' => []]); ?>
            </div>
            <div class="comment__text">
               <div class="avatar__name">
                  <h5><?php print get_comment_author_link(); ?></h5>
                  <span><?php comment_time(get_option('date_format')); ?></span>
               </div>
               <?php comment_text(); ?>

               <div class="comment__reply">
                  <?php comment_reply_link(array_merge($args, ['depth' => $depth, 'max_depth' => $args['max_depth']])); ?>
               </div>

            </div>
         </div>
   <?php
   }
}

/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function bam_shortcode_extra_content_remove($content) {

   $array = [
      '<p>['    => '[',
      ']</p>'   => ']',
      ']<br />' => ']',
   ];
   return strtr($content, $array);
}
add_filter('the_content', 'bam_shortcode_extra_content_remove');

/**
 * Change the excerpt more string
 */
function bam_excerpt_more($more) {
   return '&hellip;';
}
add_filter('excerpt_more', 'bam_excerpt_more');

// bam_search_filter_form
if (!function_exists('bam_search_filter_form')) {
   function bam_search_filter_form($form) {

      $form = sprintf(
         '<div class="ss-widget__search"><div class="search-px"><form action="%s" method="get">
        <input type="text" value="%s" required name="s" placeholder="%s">
        <button type="submit"> <i class="fa-light fa-magnifying-glass"></i> </button>
     </form></div></div>',
         esc_url(home_url('/')),
         esc_attr(get_search_query()),
         esc_html__('Search', 'bam')
      );

      return $form;
   }
   add_filter('get_search_form', 'bam_search_filter_form');
}


add_action('admin_enqueue_scripts', 'bam_admin_custom_scripts');
function bam_admin_custom_scripts() {
   wp_enqueue_media();
   wp_enqueue_style('customizer-style', get_template_directory_uri() . '/inc/css/customizer-style.css', array());
   wp_enqueue_script('bam-admin-custom', get_template_directory_uri() . '/inc/js/admin_custom.js', ['jquery'], '', true);
}

/**
 * Register Elementor Locations.
 *
 * @param ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager theme manager.
 *
 * @return void
 */
function bam_register_elementor_locations($elementor_theme_manager) {

   $elementor_theme_manager->register_all_core_location();
}
add_action('elementor/theme/register_locations', 'bam_register_elementor_locations');

/**
 * Check hide title.
 *
 * @param bool $val default value.
 *
 * @return bool
 */
if (!function_exists('bam_check_hide_title')) {
   function bam_check_hide_title($val) {
      if (defined('ELEMENTOR_VERSION')) {
         $current_doc = Elementor\Plugin::instance()->documents->get(get_the_ID());
         if ($current_doc && 'yes' === $current_doc->get_settings('hide_title')) {
            $val = false;
         }
      }
      return $val;
   }
}
add_filter('bam_page_title', 'bam_check_hide_title');

// ACF Data
// ----------------------------------------------------------------------------------------
if (class_exists('ACF')) {
   include_once 'inc/acf/metabox-and-options.php';
}

// load more
function more_project_ajax() {

   $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
   $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

   header("Content-Type: text/html");

   $args = array(
      'suppress_filters' => true,
      'post_type' => 'projects',
      'posts_per_page' => $ppp,
      'paged'    => $page,
   );

   $loop = new WP_Query($args);

   $out = '';

   if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();
         $address = function_exists('get_field') ? get_field('address', get_the_ID()) : '';
         $out .= '
         <div class="single_project-grid d-none d-md-block">
                            <a href="' . get_the_permalink() . '" class="project_grid-inner">
                              <div class="project_img">
                                ' . get_the_post_thumbnail() . '
                              </div>
                              <div class="project_content">
                                <h3>' . get_the_title() . '';
         if (!empty($address)) :

            $out .= ' <span class="address">— ' . $address . '</span>';

         endif;


         $out .= '</h3>
                              </div>
                            </a>
                          </div>';

      endwhile;
   endif;
   wp_reset_postdata();
   die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_project_ajax');
add_action('wp_ajax_more_post_ajax', 'more_project_ajax');
