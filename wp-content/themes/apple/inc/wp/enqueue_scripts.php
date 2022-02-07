<?php
/**
 * Theme CSS & JS
 */
function theme_scripts() {
	// Main CSS
	wp_enqueue_style('main-stylesheet', asset_path( 'styles/main.css' ), false, '1.0.0');

	// Deregister the jquery version bundled with WordPress
	wp_deregister_script('jquery');

	// CDN hosted jQuery
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', [], '3.5.1', false);

	// Main JS
	wp_enqueue_script('main-javascript', asset_path('scripts/main.js'), [ 'jquery' ], '1.0.0', true);

	// Throw variables to front-end
	$theme_vars = array(
		'home'   => get_home_url(),
		'ajaxurl' => admin_url('admin-ajax.php'),
		'is_auth' => is_user_logged_in(),
	);
	wp_localize_script('main-javascript', 'themeVars', $theme_vars);

  if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'theme_scripts');
