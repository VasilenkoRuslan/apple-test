<?php
/**
 * @package WordPress
 * @subpackage Theme_Compat
 * @deprecated 3.0.0
 *
 * This file is here for backward compatibility with old themes and will be removed in a future version
 */

// for comment_form()
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : ' ' );

if ( ! isset( $args['format'] ) ) {
	$args['format'] = current_theme_supports('html5', 'comment-form') ? 'html5' : 'xhtml';
}
$html5    = 'html5' === $args['format'];

// Do not delete these lines.
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' === basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die( 'Please do not load this page directly. Thanks!' );
}

if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.' ); ?></p>
	<?php
	return;
}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
<!-- comment-section start -->
<div class="comment-section">
	<h3 id="comments">
		<?php
		if ( 1 == get_comments_number() ) {
			printf(
				/* translators: %s: Post title. */
				__( 'One response to %s' ),
				'&#8220;' . get_the_title() . '&#8221;'
			);
		} else {
			printf(
				/* translators: 1: Number of comments, 2: Post title. */
				_n( '%1$s response to %2$s', '%1$s responses to %2$s', get_comments_number() ),
				number_format_i18n( get_comments_number() ),
				'&#8220;' . get_the_title() . '&#8221;'
			);
		}
		?>
	</h3>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link(); ?></div>
		<div class="alignright"><?php next_comments_link(); ?></div>
	</div>

    <div class="comment-list">
	<?php wp_list_comments(array(
			'walker'      => new Apple_Walker_Comment(),
			'avatar_size' => 75,
			'style'       => 'div',
		)); ?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link(); ?></div>
		<div class="alignright"><?php next_comments_link(); ?></div>
	</div>
<?php else : // This is displayed if there are no comments so far. ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	<?php else : // Comments are closed. ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e( 'Comments are closed.' ); ?></p>

	<?php endif; ?>
<?php endif; ?>

<?php comment_form(array(
    // изменим название кнопки
    'label_submit' => 'submit button',
    // заголовок секции ответа
    'title_reply'=>'Leave A Reply',
    // удалим текст, который будет показано до и после того как коммент отправлен
    'comment_notes_before' => '',
    'comment_notes_after' => '',
    // задаем класс кнопке submit
    'class_submit'  => 'btn theme-btn--dark1 btn--lg',

    // переопределим textarea (тело формы)
    'comment_field' => '<div class="comment-form-comment form-group"><label for="comment">' . _x( 'Comment', 'noun' ) . ':</label><br /><textarea id="comment" class="form-control mp-30" name="comment" aria-required="true"></textarea></div>',

    // скорректируем поля ввода с названиями
    'fields' => array(
        'author'    => '<div class="comment-form-author form-group">
        <label for="author">' . __( 'Your Name' ) . '</label>
        <input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' />
    </div>',
        'email'     => '<div class="comment-form-email form-group">
        <label for="email">' . __( 'Your Email' ) . '</label>
        <input id="email" class="form-control" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" aria-describedby="email-notes"' . $aria_req  . ' />
    </div>',
        'url'       => '<div class="comment-form-url form-group">
        <label for="url">' . __( 'Website Url' ) . '</label>
        <input id="url" class="form-control" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" />
    </div>',
	    'cookies'   => '',
    ),
)); ?>
</div>
<!-- contact-form start -->
