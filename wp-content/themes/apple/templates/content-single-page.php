<?php
$title = get_the_title();
$html_thumbnail = (has_post_thumbnail()) ? get_the_post_thumbnail(null, 'large', array('class' => 'img-responsive')) : '';
$content = get_the_content();
?>
<div id="<?php get_post_type(); ?>-<?php the_ID(); ?>" <?php post_class('single-page text-left'); ?>>
	    <?= $html_thumbnail; ?>
    <div class="blog-post-content page-content pt-30">
        <h3 class="title mb-15 text-center"><?= $title; ?></h3>
        <p class="text">
            <?= $content; ?>
        </p>
    </div>
</div>
