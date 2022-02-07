<?php

	/*
	 * display footer-logo shortcode
	 */
	function apple_custom_recent_post_widget()
	{
		$query = new WP_Query([
      'post_type' => 'post',
			'posts_per_page' => 4,
			'order' => 'DESC',
		]);
		?>
<div class="sidebar-widget mb-30">
	<h3 class="post-title">Recent posts</h3>
		<?php
		if ($query->have_posts()) {
			$count_posts = $query->found_posts;
			$numb_post = 0;
			while ($query->have_posts()) {
				$query->the_post();

				$numb_post++;
				$class_div = ($numb_post<$count_posts) ? ' mb-30' : '';
				?>
		<div class="blog-media-list<?= $class_div; ?> media">
				<?php get_template_part('templates/posts/recent-post', 'item'); ?>
		</div>
		<?php
			}
		} else {
			echo 'Have no posts yet! :(';
		}
		?>
</div>
		<?php
		wp_reset_postdata(); // Сбрасываем $post

		return '';
	}

	add_shortcode('apple-recent-post', 'apple_custom_recent_post_widget');