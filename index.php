<?php get_header(); ?>

<?php get_template_part( 'navigation', 'default' ); ?>

<div class="container">



  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="row">
      <div class="col-sm-12">
        <h2 class="page-header"><?php the_title(); ?></h2>
        <?php the_content(); ?>
      </div>
    </div><!-- .row -->
  <?php endwhile; else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>

  

</div><!-- .container -->

<?php get_footer(); ?>
