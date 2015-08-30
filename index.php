<?php get_header(); ?>

<?php get_template_part( 'navigation', 'default' ); ?>

<div class="container">

<?php
  if ( have_posts() ) :
    while ( have_posts() ) : the_post();
      get_template_part( 'content', get_post_format() );
    endwhile;
    bs4_the_posts_pagination();
  else :
    ?><p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p><?php
  endif;
?>

</div><!-- .container -->

<?php get_footer(); ?>
