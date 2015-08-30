<?php
$main_nav_options = [
  'theme_location'    => 'main_menu',
  'depth'             => 2,
  'container'         => '',
  'container_class'   => '',
  'menu_class'        => 'nav navbar-nav',
  'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
  'walker'            => new wp_bootstrap_navwalker()
];
?>

<?php if ( has_nav_menu( 'main_menu' ) ) : ?>
  <nav class="navbar navbar-light bg-faded">
    <div class="container">
      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
      <?php wp_nav_menu( $main_nav_options ); ?>
      <?php get_search_form( 'true' ); ?>
    </div><!-- .container -->
  </nav>
<?php endif; ?>
