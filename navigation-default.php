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

<?php if ( has_nav_menu( 'main_menu' ) && false ) : ?>
  <a class="sr-only sr-only-focusable" href="#content">Skip to main content</a>
  <nav class="navbar navbar-light navbar-expand-md bg-light">
    <div class="container">
      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
      <div class="collapse hidden-sm-down" id="nav-content">
        Desktop Only
        <?php wp_nav_menu( $main_nav_options ); ?>
        <?php
        $tagline = esc_attr( get_bloginfo( 'description' ) );
        if ( $tagline ) :
        ?>
          <div class="clearfix"></div>
          <span><?php echo $tagline; ?></span>
        <?php endif; ?>
      </div><!-- .collapse -->
      <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#mobile-nav-content">☰</button>
    </div><!-- .container -->
    <div class="collapse navbar-toggleable-xs show d-none d-sm-block d-md-none" id="mobile-nav-content">
      Mobile Only
      <?php wp_nav_menu( $main_nav_options ); ?>
      <?php
      $tagline = esc_attr( get_bloginfo( 'description' ) );
      if ( $tagline ) :
      ?>
        <div class="clearfix"></div>
        <span><?php echo $tagline; ?></span>
      <?php endif; ?>
    </div><!-- .collapse -->
  </nav>
<?php endif; ?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php wp_nav_menu( $main_nav_options ); ?>
      <!-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> -->
      <?php
      $tagline = esc_attr( get_bloginfo( 'description' ) );
      if ( $tagline ) :
      ?>
        <div class="clearfix"></div>
        <span><?php echo $tagline; ?></span>
      <?php endif; ?>
    </div>
  </div>
</nav>
