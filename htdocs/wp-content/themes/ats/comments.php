<?php
/**
 * The template for displaying Comments.
 *
 *
 * @package WordPress
 * @subpackage [theme_name]
 */
?>
	<div id="comments">
	  <?php if ( post_password_required() ) : ?>
		  <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'generic' ); ?></p>
  </div><!-- #comments -->
	  <?php
			  /* Stop the rest of comments.php from being processed,
			   * but don't kill the script entirely -- we still have
			   * to fully load the template.
			   */
			  return;
		  endif;
	  ?>

  <?php // You can start editing here -- including this comment! ?>

	  <?php if ( have_comments() ) : ?>
		  <h2 id="comments-title">
			  <?php
				  printf( _n( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'generic' ),
					  number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			  ?>
		  </h2>

		  <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		  <nav id="comment-nav-above">
			  <h4 class="assistive-text"><?php _e( 'Comment navigation', 'generic' ); ?></h4>
			  <div class="group">
  			  <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'generic' ) ); ?></div>
	  		  <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'generic' ) ); ?></div>
	  		</div>
		  </nav>
		  <?php endif; // check for comment navigation ?>

		  <ul class="commentlist">
			  <?php
				  /* Loop through and list the comments. Tell wp_list_comments()
				   * to use generic_comment() to format the comments.
				   * If you want to overload this in a child theme then you can
				   * define generic_comment() and that will be used instead.
				   * See generic_comment() in generic/functions.php for more.
				   */
				  wp_list_comments( array( 'callback' => 'generic_comment' ) );
			  ?>
		  </ul>

		  <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		  <nav id="comment-nav-below">
			  <h1 class="assistive-text"><?php _e( 'Comment navigation', 'generic' ); ?></h1>
			  <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'generic' ) ); ?></div>
			  <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'generic' ) ); ?></div>
		  </nav>
		  <?php endif; // check for comment navigation ?>

	  <?php
		  /* If there are no comments and comments are closed, let's leave a little note, shall we?
		   * But we don't want the note on pages or post types that do not support comments.
		   */
		  elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	  ?>
		  <p class="nocomments"><?php _e( 'Comments are closed.', 'generic' ); ?></p>
	  <?php endif; ?>

  <?php if ('open' == $post->comment_status) : ?>

    <div id="respond">
      <h2><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h2>
      <div class="cancel-comment-reply">
	      <?php cancel_comment_reply_link(); ?>
      </div>

      <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
        <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=">logged in</a> to post a comment.</p>
      
      <?php else : ?>
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

          <div class="group">
            <input id="author" placeholder="Name <?php if ($req) echo "*"; ?>" name="author" type="text" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
          </div>

          <div class="group">
            <input id="email" name="email" placeholder="E-Mail Address <?php if ($req) echo "*"; ?>" type="text" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
          </div>
          
          <div class="group">
            <input name="text" type="text" name="url" placeholder="Website" id="url" value="" size="22" tabindex="3" />
          </div>
        
          <textarea name="comment" id="comment" placeholder="Comment" cols="50" rows="10" tabindex="4"></textarea>

          <?php do_action('comment_form', $post->ID); ?>

          <p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" class="button" />
            <?php comment_id_fields(); ?>
          </p>

        </form>
      <?php endif; ?>
      
    </div>
    
  <?php endif; ?>
  

</div><!-- #comments -->
