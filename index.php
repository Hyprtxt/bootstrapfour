<?php get_header(); ?>

<?php get_template_part( 'navigation', 'default' ); ?>

<div class="container">
  <div class="row">
<?php
  if ( have_posts() ) :
    echo "<div class='col-sm-9'>";
    while ( have_posts() ) : the_post();
      get_template_part( 'content', get_post_format() );
    endwhile;
      bs4_the_posts_pagination();
    echo "</div><!-- .col -->";
  else :
    ?><p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p><?php
  endif;
  echo "<div class='col-sm-3'>";
    dynamic_sidebar( 'Right Sidebar' );
  echo "</div><!-- .col -->";
?>
  </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
