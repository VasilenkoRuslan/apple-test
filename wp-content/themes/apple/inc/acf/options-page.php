<?php
if (!function_exists('apple_options_init')) {
  function apple_options_init() {

    // Check function exists.
    if( function_exists('apple_options_init') ) {

      // Register options page.
      $option_page = acf_add_options_page(array(
        'page_title'    => __('Theme Settings'),
        'menu_title'    => __('Theme Settings'),
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
      ));
    }
  }
  add_action('acf/init', 'apple_options_init');
}
