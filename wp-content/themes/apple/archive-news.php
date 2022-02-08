<?php
	get_header();
	$title = get_the_archive_title();
	echo get_theme_page_title($title);
?>
    <section class="blog-section pt-80 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                    <?php
                        if (have_posts()) {
                            while (have_posts()) {
                                the_post();
                                get_template_part('templates/news/news', 'item');

                                echo get_the_posts_pagination();
                            }
                        } else {
                            get_template_part('templates/news/news', 'none');
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>