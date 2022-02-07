<?php
	global $temp_site_dir;
	$post_url = get_permalink();
	$thumbnail = get_the_post_thumbnail();
	$html_thumbnail = (!empty($thumbnail)) ? $thumbnail : '<img src="//via.placeholder.com/571.png?text=DefaultThumbnail" alt="DefaultThumbnail"/>';
	$post_title = get_the_title();
	$post_author = get_the_author();
	$post_author_url = get_author_posts_url(NULL, $post_author);
	$date = get_the_date('d M, Y');
	$date_url = get_day_link(get_the_date('Y'), get_the_date('m'), get_the_date('d'));
	$content = wp_trim_words(get_the_content(), 35, ' ...');

	$txt_more = __('Read More', 'apple');
?>
<div class="col-12 mb-30">
	<div class="single-blog media flex-column flex-md-row">
		<a class="blog-thumb mb-20 mb-md-0 mr-md-4 mr-xl-5 w-md-50 zoom-in d-block overflow-hidden"
		   href="<?= $post_url; ?>">
			<?= $html_thumbnail; ?>
		</a>
		<div class="blog-post-content media-body mb-5 mb-md-0">
			<h3 class="title mb-15"><a href="<?= $post_url; ?>"><?= $post_title; ?></a>
			</h3>
			<h5 class="sub-title"> Posted by <a class="blog-link"
			                                    href="<?= $post_author_url; ?>"> <?= $post_author; ?></a>
				<span class="separator">/</span> <a href="<?= $date_url; ?>"><?= $date; ?></a></h5>
			<p class="text">
				<?= $content; ?>
			</p>
			<a class="read-more" href="<?= $post_url; ?>"><?= $txt_more; ?></a>
		</div>
	</div>
</div>