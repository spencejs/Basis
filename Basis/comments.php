	<?php function basis_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article class="comment-<?php comment_ID(); ?>">
			<header class="comment-author-info vcard">
				<?php echo get_avatar($comment,$size='32'); ?>
				<?php printf(__('<address class="comment-author fn">%s</address>', 'basis'), get_comment_author_link()) ?>
				<time pubdate datetime="<?php echo comment_date('Y-m-d') ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s', 'basis'), get_comment_date(),  get_comment_time()) ?></a></time>
				<?php edit_comment_link(__('(Edit)', 'basis'), '', '') ?>
			</header>

			<?php if ($comment->comment_approved == '0') : ?>
				<div class="notice">
					<p class="bottom"><?php _e('Your comment is awaiting moderation.', 'basis') ?></p>
				</div>

			<?php endif; ?>

			<div class="comment">
				<?php comment_text() ?>
			</div>

			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

		</article>
<?php } ?>

<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!', 'basis'));

	if ( post_password_required() ) { ?>
		<div class="notice">
			<p class="bottom"><?php _e('This post is password protected. Enter the password to view comments.', 'basis'); ?></p>
		</div>
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	<section class="comments">
		<h3><?php comments_number(__('No Responses to', 'basis'), __('One Response to', 'basis'), __('% Responses to', 'basis') ); ?> &#8220;<?php the_title(); ?>&#8221;</h3>
		<ol class="comment-list">
		<?php wp_list_comments('type=comment&callback=basis_comments'); ?>
		<?php // wp_list_comments(); ?>
		</ol>
		<?php // Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment Navigation', 'basis' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'basis' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'basis' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>
	</section>
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( comments_open() ) : ?>
	<?php else : // comments are closed ?>
		<div class="notice">
			<p class="bottom"><?php _e('Comments are closed.', 'basis') ?></p>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php $comments_args = array(
	'comment_notes_after' => '',
);

comment_form($comments_args); ?>