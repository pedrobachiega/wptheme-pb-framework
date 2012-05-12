<?php // Do not delete these lines
  if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) )
    die ( __('Please do not load this page directly. Thanks!', 'pbsimpletheme') );

  if ( !empty( $post->post_password ) ) { // if there's a password
    if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) {  // and it doesn't match the cookie
      ?>

      <p><?php _e( 'This post is password protected. Enter the password to view comments.', 'pbsimpletheme' ); ?></p>

      <?php
      return;
    }
  }

/* You can start editing here. */
?>

<?php if ( have_comments() ) : ?>
  <h3><?php comments_number( __( '0 Responses', 'pbsimpletheme' ), __( '1 Response', 'pbsimpletheme' ), __( '% Responses', 'pbsimpletheme' ) ); ?></h3>

  <?php if ( !empty( $comments_by_type['comment'] ) ) : ?>
    <h4><?php _e( 'Comments', 'pbsimpletheme' ); ?></h4>
    <ol id="comments-list">
      <?php wp_list_comments( 'type=comment' ); ?>
    </ol>
  <?php endif; ?>

  <?php if ( !empty( $comments_by_type['pings'] ) ) : ?>
    <h4><?php _e( 'Trackbacks/Pingbacks', 'pbsimpletheme' ); ?></h4>
    <ol id="pings-list">
      <?php wp_list_comments( 'type=pings' ); ?>
    </ol>
  <?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

  <h3 id="respond"><?php _e( 'Leave a Reply', 'pbsimpletheme' ); ?></h3>

  <?php if ( get_option( 'comment_registration' ) && !$user_ID ) : ?>
    <p><?php _e( 'You must be', 'pbsimpletheme' ); ?> <a href="<?php echo get_site_url(); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e( 'logged in', 'pbsimpletheme' ); ?></a> <?php _e( 'to post a comment.', 'pbsimpletheme' ); ?></p>
  <?php else : ?>

  <form action="<?php echo get_site_url(); ?>/wp-comments-post.php" method="post" id="comment-form">

  <?php if ( $user_ID ) : ?>
    <p><?php _e( 'You are logged in as', 'pbsimpletheme' ); ?> <a href="<?php echo get_site_url(); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url( get_permalink() ); ?>" ><?php _e( 'Logout', 'pbsimpletheme' ); ?> &raquo;</a></p>
  <?php else : ?>

    <p>
      <label for="author"><?php _e( 'Name', 'pbsimpletheme' ); ?> <?php if ($req) _e( '(required)', 'pbsimpletheme' ); ?></label>
      <input type="text" name="author" value="<?php echo $comment_author; ?>" tabindex="1" />
    </p>

    <p>
      <label for="email"><?php _e( 'Email (will not be published)', 'pbsimpletheme' ); ?> <?php if ($req) _e( '(required)', 'pbsimpletheme' ); ?></label>
      <input type="text" name="email" value="<?php echo $comment_author_email; ?>" tabindex="2" />
    </p>

    <p>
      <label for="url"><?php _e( 'Website', 'pbsimpletheme' ); ?></label>
      <input type="text" name="url" value="<?php echo $comment_author_url; ?>" tabindex="3" />
    </p>

  <?php endif; ?>

    <p>
      <textarea name="comment" cols="50" rows="8" tabindex="4"></textarea>
      <small><?php _e( '<strong>XHTML:</strong> You can use these tags:', 'pbsimpletheme' ); ?> <code><?php echo allowed_tags(); ?></code></small>
    </p>

    <p>
      <input name="submit" type="submit" tabindex="5" value="<?php _e( 'Submit', 'pbsimpletheme' ); ?>" />
      <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
    </p>

    <?php do_action('comment_form', $post->ID); ?>

  </form>

<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>
