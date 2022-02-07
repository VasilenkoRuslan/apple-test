<?php
$title = get_the_title();
$html_thumbnail = (has_post_thumbnail()) ? get_the_post_thumbnail(null, 'large', array('class' => 'object-fit-none')) : '';
$date_url = get_day_link(get_the_date('Y'), get_the_date('m'), get_the_date('d'));
$date = get_the_date('d M, Y');
$author_name = get_the_author();
$author_archive_posts_url = get_author_posts_url(get_the_author_meta('ID'));
$content = get_the_content();
?>
<div id="post-details <?php get_post_type(); ?>-<?php the_ID(); ?>" <?php post_class('single-blog text-left'); ?>>
	<?= $html_thumbnail; ?>
	<div class="blog-post-content pt-30">
		<h3 class="title mb-15"><?= $title; ?></h3>
		<h5 class="sub-title font-style-normal">
			<?php _e('Posted by', 'apple'); ?> <a class="blog-link"
			                                      href="<?= $author_archive_posts_url; ?>">
				<?= $author_name; ?></a> <span class="separator">/</span>
			<a href="<?= $date_url; ?>">
				<?= $date; ?>
			</a> <span class="separator">/</span>
			<?php do_action('apple_show_sports_list', NULL, 'sports'); ?></h5>
		<p class="text">
			<?= $content ?>
		</p>
	</div>
</div>