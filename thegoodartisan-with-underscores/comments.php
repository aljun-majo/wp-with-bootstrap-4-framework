<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TGA_Underscores
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$tga_underscores_comment_count = get_comments_number();
			if ( '1' === $tga_underscores_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'tga-underscores' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $tga_underscores_comment_count, 'comments title', 'tga-underscores' ) ),
					number_format_i18n( $tga_underscores_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'tga-underscores' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	//comment_form();

$fields =  array(
	//copied from this codex
	//https://codex.wordpress.org/Function_Reference/comment_form
  'author' =>
    '<div class="comment-form-author form-group"><label for="author">' . __( 'Name', 'domainreference' ) .
    ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
    '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' /></div>',

  'email' =>
    '<div class="comment-form-email form-group"><label for="email">' . __( 'Email', 'domainreference' ) .
    ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
    '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></div>', 

  'url' =>
    '<div class="comment-form-url form-group"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
    '<input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" /></div>',
);

$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' ); 

	$comments_args = array(  
			'class_form'      => 'comment-form',
			 'class_submit'   => 'submit btn btn-primary btn-block my-5',   
   
			'comment_field' =>  '<div class="comment-form-comment form-group"><label for="comment">' . _x( 'Comment', 'noun' ) .
			    '</label><textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true">' .
			    '</textarea></div>',

			  'must_log_in' => '<p class="must-log-in">' .
			    sprintf(
			      __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
			      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
			    ) . '</p>',

			  'logged_in_as' => '<p class="logged-in-as">' .
			    sprintf(
			    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
			      admin_url( 'profile.php' ),
			      $user_identity,
			      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
			    ) . '</p>',

			  'comment_notes_before' => '<p class="comment-notes">' .
			    __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
			    '</p>',

			  'comment_notes_after' => '<p class="form-allowed-tags">' .
			    sprintf(
			      __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ),
			      ' <code>' . allowed_tags() . '</code>'
			    ) . '</p>',

			  'fields' => apply_filters( 'comment_form_default_fields', $fields ),
				);

	comment_form($comments_args); 

	?>

</div><!-- #comments -->
