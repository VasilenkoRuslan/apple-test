<?php
function apple_widget_areas()
{
  // Sidebar
	register_sidebar(array(
    'name' => __('Sidebar', 'apple'),
    'id' => "sidebar",
    'description' => '',
    'class' => '',
    'before_widget' => '<div class="sidebar-widget theme1 mb-30">',
    'after_widget' => "</div>",
    'before_title' => '<h3 class="post-title">',
    'after_title' => "</h3>",
    'before_sidebar' => '',
    'after_sidebar' => '',
  ));

  // Footer column 1
	register_sidebar(array(
    'name' => __('Footer column 1', 'apple'),
    'id' => "footer-column-1",
    'description' => '',
    'class' => '',
    'before_widget' => '',
    'after_widget' => "",
    'before_title' => '',
    'after_title' => "",
    'before_sidebar' => '',
    'after_sidebar' => '',
  ));

	// Footer column 2
	register_sidebar(array(
    'name' => __('Footer column 2', 'apple'),
    'id' => "footer-column-2",
    'description' => '',
    'class' => '',
    'before_widget' => '',
    'after_widget' => "",
    'before_title' => '<div class="border-bottom cbb1 mb-25"><div class="section-title pb-20"><h2 class="title text-dark text-uppercase">',
    'after_title' => "</h2></div></div>",
    'before_sidebar' => '<div class="footer-widget">',
    'after_sidebar' => '</div>',
  ));

	// Footer column 3
	register_sidebar(array(
    'name' => __('Footer column 3', 'apple'),
    'id' => "footer-column-3",
    'description' => '',
    'class' => '',
    'before_widget' => '',
    'after_widget' => "",
    'before_title' => '<div class="border-bottom cbb1 mb-25"><div class="section-title pb-20"><h2 class="title text-dark text-uppercase">',
    'after_title' => "</h2></div></div>",
    'before_sidebar' => '<div class="footer-widget">',
    'after_sidebar' => '</div>'
  ));

	// Footer column 4
	register_sidebar(array(
    'name' => __('Footer column 4', 'apple'),
    'id' => "footer-column-4",
    'description' => '',
    'class' => '',
    'before_widget' => '',
    'after_widget' => "",
    'before_title' => '',
    'after_title' => "",
    'before_sidebar' => '',
    'after_sidebar' => '',
  ));
}

add_action('widgets_init', 'apple_widget_areas');

// deactivate new block editor, fix error widgets setting page
function phi_theme_support()
{
  remove_theme_support('widgets-block-editor');
}

add_action('after_setup_theme', 'phi_theme_support');
