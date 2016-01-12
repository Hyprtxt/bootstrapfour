<?php
if ( is_single() || is_page() ) :
  echo '<div class="clearfix"></div>';
  if ( comments_open() ) : ?>
    <h4 id="comments"><?php comments_number( __( 'Leave a Comment', 'bootstrap-four' ), __( 'One Comment', 'bootstrap-four' ), '%' . __( ' Comments', 'bootstrap-four' ) );?></h4>
  <?php
  endif;
  if ( have_comments() ) : ?>
    <ul class="commentlist">
      <?php wp_list_comments(); ?>
      <?php paginate_comments_links(); ?>
      <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    </ul>
  <?php
  endif;
  if ( comments_open() ) :
    comment_form();
  endif;
endif;
?>
