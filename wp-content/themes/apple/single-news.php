<?php get_header();
$title = get_the_title();

echo get_theme_page_title($title); ?>
<!-- product tab start -->
<section id="post-details <?php get_post_type(); ?>-<?php the_ID(); ?>" <?php post_class('blog-section'); ?>>
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-9 mx-auto">
          <?php if (have_posts()) : ?>
                <?php
                the_post();
                get_template_part('templates/content-single', 'news');
                if (comments_open()) {
                  comments_template();
                }
                ?>
          <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- product tab end -->
<?php get_footer(); ?>
