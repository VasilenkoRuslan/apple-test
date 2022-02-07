<?php
function apple_register_nav_menu() {
  register_nav_menu( 'main', 'Main Menu' );
}
add_action( 'after_setup_theme', 'apple_register_nav_menu' );
