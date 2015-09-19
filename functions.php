<?php

include_once 'lib/wp-bootstrap-navwalker.php';

global $bs_version;

$bs_version = '4.0.0';

// Le sigh...
if ( ! isset( $content_width ) ) $content_width = 837;

if ( ! function_exists( 'bs4_widgets_init' ) ) :
  function bs4_widgets_init() {
    register_sidebar([
      'name' => 'Right Sidebar',
      'id' => 'right-sidebar',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    ]);
  }
endif;
add_action( 'widgets_init', 'bs4_widgets_init' );


if ( ! function_exists( 'bs4_setup' ) ) :
  function bs4_setup() {

    add_theme_support( 'custom-background', [
      'default-color' => 'ffffff',
    ]);

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );

    add_theme_support( 'html5', [
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ]);

    register_nav_menus([
      'main_menu' => 'Main Menu',
      // 'footer_menu' => 'Footer Menu'
    ]);

    add_editor_style( 'css/bootstrap.min.css' );
  }
endif; // htxt_bs4_setup
add_action( 'after_setup_theme', 'bs4_setup' );


if ( ! function_exists( 'bs4_theme_styles' ) ) :
  function bs4_theme_styles() {
    global $bs_version;
    wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', [], '4.4.0' );
    wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', [], $bs_version );
    wp_register_style( 'styles', get_stylesheet_uri(), ['bootstrap'], '1' );
    wp_enqueue_style( 'font-awesome' );
    wp_enqueue_style( 'styles' );
  }
endif;
add_action('wp_enqueue_scripts', 'bs4_theme_styles');


if ( ! function_exists( 'bs4_theme_scripts' ) ) :
  function bs4_theme_scripts() {
    global $bs_version;
    wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', [ 'jquery' ], $bs_version, true );
    wp_enqueue_script( 'bootstrap' );
  }
endif;
add_action('wp_enqueue_scripts', 'bs4_theme_scripts');


function bs4_nav_li_class( $classes, $item ) {
  $classes[] = 'nav-item';
  return $classes;
}
add_filter( 'nav_menu_css_class', 'bs4_nav_li_class', 10, 2 );


function bs4_nav_anchor_class( $atts, $item, $args ) {
  $atts['class'] = 'nav-link';
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'bs4_nav_anchor_class', 10, 3 );


function bs4_comment_form_before() {
  echo '<div class="card"><div class="card-block">';
}
add_action( 'comment_form_before', 'bs4_comment_form_before', 10, 5 );


function bs4_comment_form( $fields ) {
  $fields['fields']['author'] = '
  <fieldset class="form-group comment-form-email">
    <label for="author">Email address</label>
    <input type="text" class="form-control" name="author" id="author" placeholder="Name" aria-required="true" required>
  </fieldset>';
  $fields['fields']['email'] ='
  <fieldset class="form-group comment-form-email">
    <label for="email">Email address *</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" aria-required="true" required>
    <small class="text-muted">Your email address will not be published.</small>
  </fieldset>';
  $fields['fields']['url'] = '
  <fieldset class="form-group comment-form-email">
    <label for="url">Website *</label>
    <input type="text" class="form-control" name="url" id="url" placeholder="http://example.org">
  </fieldset>';
  $fields['comment_field'] = '
  <fieldset class="form-group">
    <label for="comment">Comment *</label>
    <textarea class="form-control" id="comment" name="comment" rows="3" aria-required="true" required></textarea>
  </fieldset>';
  $fields['comment_notes_before'] = '';
  $fields['class_submit'] = 'btn btn-primary';
  return $fields;
}
add_filter( 'comment_form_defaults', 'bs4_comment_form', 10, 5 );


function bs4_comment_form_after() {
  echo '</div><!-- .card-block --></div><!-- .card -->';
}
add_action( 'comment_form_after', 'bs4_comment_form_after', 10, 5 );


/* * * * * * * * * * * * * * *
 * BS4 Utility Functions
 * * * * * * * * * * * * * * */

function bs4_get_posts_pagination( $args = '' ) {
  global $wp_query;
  $pagination = '';

  if ( $GLOBALS['wp_query']->max_num_pages > 1 ) :

    $defaults = [
      'total'     => isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1,
      'current'   => get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1,
      'type'      => 'array',
      'prev_text' => '&laquo;',
      'next_text' => '&raquo;',
    ];

    $params = wp_parse_args( $args, $defaults );

    $paginate = paginate_links( $params );

    if( $paginate ) :
      $pagination .= "<ul class='pagination'>";
      foreach( $paginate as $page ) :
        if( strpos( $page, 'current' ) ) :
          $pagination .= "<li class='active'>$page</li>";
        else :
          $pagination .= "<li>$page</li>";
        endif;
      endforeach;
      $pagination .= "</ul>";
    endif;

  endif;

  return $pagination;
}


function bs4_the_posts_pagination( $args = '' ) {
  echo bs4_get_posts_pagination( $args );
}
