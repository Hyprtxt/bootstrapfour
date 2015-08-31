<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php
    // Post thumbnail.
    // bs4_post_thumbnail();
  ?>

  <header class="entry-header">
    <?php
      if ( is_single() ) :
        the_title( '<h1 class="entry-title display-1">', '</h1>' );
      else :
        the_title( sprintf( '<h2 class="entry-title display-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
      endif;
    ?>
  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php
      /* translators: %s: Name of current post */
      the_content( sprintf(
        __( 'Continue reading %s', 'bs4' ),
        the_title( '<span class="screen-reader-text">', '</span>', false )
      ) );

      comments_template();

      get_template_part( 'postmeta' );

      if ( comments_open() ) :
?>
        <div class="clearfix"></div>
        <p class="text-right">
            <a class="btn btn-primary" href="<?php the_permalink(); ?>#comments"><?php comments_number( __( 'Leave a Comment', 'bs4' ), __( 'One Comment', 'bs4' ), '%' . __( ' Comments', 'bs4' ) );?> <span class="fa fa-comments"></span></a>
        </p>
<?php
      endif;

      wp_link_pages([
        'before'      => '<ul class="pagination">',
        'after'       => '</ul>',
        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'bs4' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
      ]);

    ?>
  </div><!-- .entry-content -->

  <?php
    // Author bio.
    // if ( is_single() && get_the_author_meta( 'description' ) ) :
    //   get_template_part( 'author-bio' );
    // endif;
  ?>

  <footer class="entry-footer">
    <?php // bs4_entry_meta(); ?>
    <?php edit_post_link( __( 'Edit', 'bs4' ), '<span class="edit-link">', '</span>' ); ?>
  </footer><!-- .entry-footer -->

</article><!-- #post-## -->
