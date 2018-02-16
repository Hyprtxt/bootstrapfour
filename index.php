<?php get_header(); ?>

<?php get_template_part( 'navigation', 'default' ); ?>

<div id="content" class="container main-container">
  <div class="row">
<?php
    if (get_post_meta($post->ID,'hide_sidebar', true)) {
?>
      <div class="col-lg-12">
<?php
    } else {
?>
      <div class="col-lg-9">
<?php
    }
  if ( have_posts() ) :
    while ( have_posts() ) : the_post();
      get_template_part( 'content', get_post_format() );
    endwhile;
      bootstrap_four_the_posts_pagination();
  else :
    ?><p><?php _e( 'Sorry, no posts matched your criteria.', 'bootstrap-four' ); ?></p><?php
  endif;
?>
    </div><!-- .col -->
<?php
    if (!get_post_meta($post->ID,'hide_sidebar', true)) {
?>
    <div class='col-lg-3'>
      <?php dynamic_sidebar( 'Right Sidebar' ); ?>
    </div><!-- .col -->
<?php
    }
?>
  </div><!-- .row -->
</div><!-- .container.main-container -->

<?php get_footer(); ?>
