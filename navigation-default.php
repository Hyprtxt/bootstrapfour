<?php
$main_nav_options = array(
  'theme_location'    => 'main_menu',
  'depth'             => 2,
  'container'         => '',
  'container_class'   => '',
  'menu_class'        => 'nav navbar-nav',
  'fallback_cb'       => 'bootstrap_four_wp_navwalker::fallback',
  'walker'            => new bootstrap_four_wp_navwalker()
);
?>

<?php if ( has_nav_menu( 'main_menu' ) ) : ?>
  <a class="sr-only sr-only-focusable" href="#content">Skip to main content</a>
  <nav class="navbar navbar-light navbar-expand-md bg-light">
    <div class="container">
      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
      <?php wp_nav_menu( $main_nav_options ); ?>
      <?php
      $tagline = esc_attr( get_bloginfo( 'description' ) );
      if ( $tagline ) :
      ?>
        <div class="clearfix"></div>
        <span><?php echo $tagline; ?></span>
      <?php endif; ?>
    </div><!-- .container -->
  </nav>
<?php endif; ?>
