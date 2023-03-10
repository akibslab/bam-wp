<?php

/**
 * Widget API: WP_Nav_Menu_Widget class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement the Navigation Menu widget.
 *
 * @since 3.0.0
 *
 * @see WP_Widget
 */

add_action('widgets_init', 'Tj_Navigation_Widget');
function Tj_Navigation_Widget() {
  register_widget('Tj_Navigation_Widget');
}
class Tj_Navigation_Widget extends WP_Widget {

  /**
   * Sets up a new Navigation Menu widget instance.
   */
  public function __construct() {
    parent::__construct('tj-navigation', 'TJ Navigation', array(
      'description'  => 'TJ Navigation List'
    ));
  }

  /**
   * Outputs the content for the current Navigation Menu widget instance.
   *
   */
  public function widget($args, $instance) {
    // Get menu.
    $nav_menu = !empty($instance['nav_menu']) ? wp_get_nav_menu_object($instance['nav_menu']) : false;

    if (!$nav_menu) {
      return;
    }

    $default_title = __('Menu');
    $title         = !empty($instance['title']) ? $instance['title'] : '';

    echo $args['before_widget'];

    /**
     * Filters the HTML format of widgets with navigation links.
     *
     * @since 5.5.0
     *
     * @param string $format The type of markup to use in widgets with navigation links.
     *                       Accepts 'html5', 'xhtml'.
     */
    $format = current_theme_supports('html5', 'tj-navigation') ? 'html5' : 'xhtml';
?>

    <ul class="footer_menu">
      <li class="footer_title"><?php echo $title;



                                if ('html5' === $format) {
                                  // The title may be filtered: Strip out HTML and make sure the aria-label is never empty.
                                  $title      = trim(strip_tags($title));
                                  $aria_label = $title ? $title : $default_title;

                                  $nav_menu_args = array(
                                    'fallback_cb'          => 'Bam_Navwalker_Class::fallback',
                                    'menu'                 => $nav_menu,
                                    'container'            => false,
                                    // 'container_aria_label' => $aria_label,
                                    // 'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'walker'         => new Bam_Navwalker_Class,
                                  );
                                } else {
                                  $nav_menu_args = array(
                                    'fallback_cb' => '',
                                    'menu'        => $nav_menu,
                                    'container'            => false,
                                  );
                                }
                                wp_nav_menu(apply_filters('widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance));

                                ?>


      </li>
    </ul>


  <?php
    echo $args['after_widget'];
  }


  /**
   * Outputs the settings form for the Navigation Menu widget.
   *
   */
  public function form($instance) {
    global $wp_customize;
    $title    = isset($instance['title']) ? $instance['title'] : '';
    $nav_menu = isset($instance['nav_menu']) ? $instance['nav_menu'] : '';

    // Get menus.
    $menus = wp_get_nav_menus();

    $empty_menus_style     = '';
    $not_empty_menus_style = '';
    if (empty($menus)) {
      $empty_menus_style = ' style="display:none" ';
    } else {
      $not_empty_menus_style = ' style="display:none" ';
    }

    $nav_menu_style = '';
    if (!$nav_menu) {
      $nav_menu_style = 'display: none;';
    }

    // If no menus exists, direct the user to go and create some.
  ?>
    <p class="nav-menu-widget-no-menus-message" <?php echo $not_empty_menus_style; ?>>
      <?php
      if ($wp_customize instanceof WP_Customize_Manager) {
        $url = 'javascript: wp.customize.panel( "nav_menus" ).focus();';
      } else {
        $url = admin_url('nav-menus.php');
      }

      printf(
        /* translators: %s: URL to create a new menu. */
        __('No menus have been created yet. <a href="%s">Create some</a>.'),
        // The URL can be a `javascript:` link, so esc_attr() is used here instead of esc_url().
        esc_attr($url)
      );
      ?>
    </p>
    <div class="nav-menu-widget-form-controls" <?php echo $empty_menus_style; ?>>
      <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" />
      </p>
      <p>
        <label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:'); ?></label>
        <select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
          <option value="0"><?php _e('&mdash; Select &mdash;'); ?></option>
          <?php foreach ($menus as $menu) : ?>
            <option value="<?php echo esc_attr($menu->term_id); ?>" <?php selected($nav_menu, $menu->term_id); ?>>
              <?php echo esc_html($menu->name); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </p>
      <?php if ($wp_customize instanceof WP_Customize_Manager) : ?>
        <p class="edit-selected-nav-menu" style="<?php echo $nav_menu_style; ?>">
          <button type="button" class="button"><?php _e('Edit Menu'); ?></button>
        </p>
      <?php endif; ?>
    </div>
<?php
  }
}
