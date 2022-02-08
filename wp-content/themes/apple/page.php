<?php get_header();
$title = get_the_title();

echo get_theme_page_title($title); ?>
<!-- product tab start -->
<section id="page-details <?php get_post_type(); ?>-<?php the_ID(); ?>" <?php post_class('page-section pt-80 pb-50'); ?>>
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-9 mx-auto">
							<?php if (have_posts()) : ?>
								<?php
								the_post();
								get_template_part('templates/content-single', 'page');
								?>
							<?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- product tab end -->
<?php get_footer(); ?>

