<?php
/**
 * Custom comment walker for this theme.
 *
 * @package WordPress
 * @subpackage apple
 * @since apple 1.0
 */

if (!class_exists('Apple_Walker_Comment')) {
	/**
	 * CUSTOM COMMENT WALKER
	 * A custom walker for comments, based on the walker in apple.
	 *
	 * @since apple 1.0
	 */
	class Apple_Walker_Comment extends Walker_Comment
	{

		/**
		 * Outputs a comment in the HTML5 format.
		 *
		 * @param WP_Comment $comment Comment to display.
		 * @param int $depth Depth of the current comment.
		 * @param array $args An array of arguments.
		 * @since apple 1.0
		 *
		 * @see wp_list_comments()
		 * @see https://developer.wordpress.org/reference/functions/get_comment_author_url/
		 * @see https://developer.wordpress.org/reference/functions/get_comment_author/
		 * @see https://developer.wordpress.org/reference/functions/get_avatar/
		 * @see https://developer.wordpress.org/reference/functions/get_comment_reply_link/
		 * @see https://developer.wordpress.org/reference/functions/get_edit_comment_link/
		 *
		 */
		protected function html5_comment($comment, $depth, $args)
		{
			$tag = ('div' === $args['style']) ? 'div' : 'li'; ?>
        <<?php echo $tag; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?> id="comment-<?php comment_ID(); ?>" <?php comment_class($this->has_children ? 'parent' : '', $comment); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <div class="comment-meta">
                <div class="comment-author vcard sub-title">
                    <?php
                    $comment_author_url = get_comment_author_url($comment);
                    $comment_author = get_comment_author($comment);
                    $avatar = get_avatar($comment, $args['avatar_size']);
                    if (0 !== $args['avatar_size']) {
                        if (empty($comment_author_url)) {
                            echo wp_kses_post($avatar);
                        } else {
                            printf('<a href="%s" rel="external nofollow" class="url">', $comment_author_url); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Escaped in https://developer.wordpress.org/reference/functions/get_comment_author_url/
                            echo wp_kses_post($avatar);
                        }
                    }
                    printf(
                        '<span class="fn">%1$s</span>',
                        esc_html($comment_author)
                    );
                    if (!empty($comment_author_url)) {
                        echo '</a>';
                    } ?>
                </div><!-- .comment-author -->
                <div class="comment-metadata">
                  <div class="comment-meta-time-and-edit">
                    <?php /* translators: 1: Comment date, 2: Comment time. */
                    $comment_timestamp = sprintf(__('%1$s at %2$s', 'apple'), get_comment_date('d M, Y', $comment), get_comment_time('H:i:s'));
                    printf(
                        '<time datetime="%s" title="%s">%s </time>',
                        get_comment_time('c'),
                        esc_attr($comment_timestamp),
                        esc_html($comment_timestamp)
                    );
                    if (get_edit_comment_link()) {
                        printf(
                            '<a class="comment-edit-link btn btn-outline-dark" href="%s">%s</a>',
                            esc_url(get_edit_comment_link()),
                            __('Edit', 'apple')
                        );
                    } ?>
                    </div>
                        <?php
                        $comment_reply_link = get_comment_reply_link(
                            array_merge(
                                $args,
                                array(
                                    'add_below' => 'div-comment',
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before' => '<button class="reply btn btn-outline-dark">',
                                    'after' => '</button>',
                                )
                            )
                        );
                        if ($comment_reply_link) {
                            echo $comment_reply_link; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Link is escaped in https://developer.wordpress.org/reference/functions/get_comment_reply_link/
                        } ?>
                </div><!-- .comment-metadata -->
            </div><!-- .comment-meta -->
            <div class="comment-content entry-content">
                <?php comment_text();
                if ('0' === $comment->comment_approved) { ?>
              <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'apple'); ?></p>
                <?php } ?>
            </div><!-- .comment-content -->
        </article><!-- .comment-body -->
			<?php
		}
	}
}

