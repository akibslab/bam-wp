<?php
class tjProjectsPost {
  function __construct() {
    add_action('init', array($this, 'register_custom_post_type'));
    add_action('init', array($this, 'create_cat'));
    add_filter('template_include', array($this, 'projects_template_include'));
  }

  public function projects_template_include($template) {
    if (is_singular('projects')) {
      return $this->get_template('single-projects.php');
    }
    return $template;
  }

  public function get_template($template) {
    if ($theme_file = locate_template(array($template))) {
      $file = $theme_file;
    } else {
      $file = TJCORE_ADDONS_DIR . '/include/template/' . $template;
    }
    return apply_filters(__FUNCTION__, $file, $template);
  }


  public function register_custom_post_type() {
    // $medidove_mem_slug = get_theme_mod('medidove_mem_slug','member'); 
    $labels = array(
      'name'                  => esc_html_x('Projects', 'Post Type General Name', 'tjcore'),
      'singular_name'         => esc_html_x('Project', 'Post Type Singular Name', 'tjcore'),
      'menu_name'             => esc_html__('Projects', 'tjcore'),
      'name_admin_bar'        => esc_html__('Projects', 'tjcore'),
      'archives'              => esc_html__('Item Archives', 'tjcore'),
      'parent_item_colon'     => esc_html__('Parent Item:', 'tjcore'),
      'all_items'             => esc_html__('All Items', 'tjcore'),
      'add_new_item'          => esc_html__('Add New Project', 'tjcore'),
      'add_new'               => esc_html__('Add New', 'tjcore'),
      'new_item'              => esc_html__('New Item', 'tjcore'),
      'edit_item'             => esc_html__('Edit Item', 'tjcore'),
      'update_item'           => esc_html__('Update Item', 'tjcore'),
      'view_item'             => esc_html__('View Item', 'tjcore'),
      'search_items'          => esc_html__('Search Item', 'tjcore'),
      'not_found'             => esc_html__('Not found', 'tjcore'),
      'not_found_in_trash'    => esc_html__('Not found in Trash', 'tjcore'),
      'featured_image'        => esc_html__('Featured Image', 'tjcore'),
      'set_featured_image'    => esc_html__('Set featured image', 'tjcore'),
      'remove_featured_image' => esc_html__('Remove featured image', 'tjcore'),
      'use_featured_image'    => esc_html__('Use as featured image', 'tjcore'),
      'inserbt_into_item'     => esc_html__('Insert into item', 'tjcore'),
      'uploaded_to_this_item' => esc_html__('Uploaded to this item', 'tjcore'),
      'items_list'            => esc_html__('Items list', 'tjcore'),
      'items_list_navigation' => esc_html__('Items list navigation', 'tjcore'),
      'filter_items_list'     => esc_html__('Filter items list', 'tjcore'),
    );

    $args   = array(
      'label'                 => esc_html__('Project', 'tjcore'),
      'labels'                => $labels,
      'supports'              => array('title', 'thumbnail'),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'menu_icon'         => 'dashicons-schedule',
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => false,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
      'rewrite'     => array('slug' => 'projects')
    );

    register_post_type('projects', $args);
  }

  public function create_cat() {
    $labels = array(
      'name'                       => esc_html_x('Project Status', 'Taxonomy General Name', 'tjcore'),
      'singular_name'              => esc_html_x('Project Status', 'Taxonomy Singular Name', 'tjcore'),
      'menu_name'                  => esc_html__('Project Status', 'tjcore'),
      'all_items'                  => esc_html__('All Project Status', 'tjcore'),
      'parent_item'                => esc_html__('Parent Item', 'tjcore'),
      'parent_item_colon'          => esc_html__('Parent Item:', 'tjcore'),
      'new_item_name'              => esc_html__('New Project Status Name', 'tjcore'),
      'add_new_item'               => esc_html__('Add New Project Status', 'tjcore'),
      'edit_item'                  => esc_html__('Edit Project Status', 'tjcore'),
      'update_item'                => esc_html__('Update Project Status', 'tjcore'),
      'view_item'                  => esc_html__('View Project Status', 'tjcore'),
      'separate_items_with_commas' => esc_html__('Separate items with commas', 'tjcore'),
      'add_or_remove_items'        => esc_html__('Add or remove items', 'tjcore'),
      'choose_from_most_used'      => esc_html__('Choose from the most used', 'tjcore'),
      'popular_items'              => esc_html__('Popular Project Status', 'tjcore'),
      'search_items'               => esc_html__('Search Project Status', 'tjcore'),
      'not_found'                  => esc_html__('Not Found', 'tjcore'),
      'no_terms'                   => esc_html__('No Project Status', 'tjcore'),
      'items_list'                 => esc_html__('Project Status list', 'tjcore'),
      'items_list_navigation'      => esc_html__('Project Status list navigation', 'tjcore'),
    );

    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
    );

    register_taxonomy('projects-status', 'projects', $args);
  }
}

new tjProjectsPost();
