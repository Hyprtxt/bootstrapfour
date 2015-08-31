<?php
if ( is_single() || is_page() ) :
  echo '<div class="clearfix"></div>';
  if ( have_comments() && comments_open() ) : ?>
    <h4 id="comments"><?php comments_number(__('Leave a Comment','bs4'), __('One Comment','bs4'), '%' . __(' Comments','bs4') );?></h4>
    <ul class="commentlist">
      <?php wp_list_comments(); ?>
      <?php paginate_comments_links(); ?>
      <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
    </ul>
<?php
    comment_form();
  else :
    if ( comments_open() ) :
      comment_form();
    endif;
  endif;
endif;
?>
