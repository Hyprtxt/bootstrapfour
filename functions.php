<?php

include_once 'lib/wp-bootstrap-navwalker.php';

$bs_version = '4.0.0';

function htxt_theme_styles() {
  wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', [], $bs_version );
  wp_register_style( 'styles', get_stylesheet_uri(), ['bootstrap'], '1' );
  wp_enqueue_style( 'styles' );
}
add_action('wp_enqueue_scripts', 'htxt_theme_styles');

function htxt_theme_scripts() {
  wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', [ 'jquery' ], $bs_version, true );
  wp_enqueue_script( 'bootstrap' );
}
add_action('wp_enqueue_scripts', 'htxt_theme_scripts');

register_nav_menus([
  'main_menu' => 'Main Menu',
  // 'footer_menu' => 'Footer Menu'
]);



?>
