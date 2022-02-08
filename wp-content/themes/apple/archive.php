<?php
global $temp_site_dir;
get_header();
$title = get_the_archive_title();
echo get_theme_page_title($title);
?>
<section class="blog-section pt-80 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                  <?php
                  if(have_posts()) {
                    while(have_posts()) {
                      the_post();
                      get_template_part('templates/posts/post','item');


                    }
	                  echo get_the_posts_pagination(array(
		                  'show_all'           => false, // показаны все страницы участвующие в пагинации
		                  'end_size'           => 1,     // количество страниц на концах
		                  'mid_size'           => 1,     // количество страниц вокруг текущей
		                  'prev_next'          => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
		                  'prev_text'          => __('«'),
		                  'next_text'          => __('»'),
		                  'add_args'           => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
		                  'add_fragment'       => '',     // Текст который добавиться ко всем ссылкам.
		                  'screen_reader_text' => __( 'Posts navigation' ),
		                  'aria_label'         => __( 'Posts' ), // aria-label="" для nav элемента. С WP 5.3
		                  'class'              => 'pagination',  // class="" для nav элемента. С WP 5.5
	                  ));
                  } else {
                    get_template_part('templates/posts/post', 'none');
                  }

                  ?>
                </div>
            </div>
            <?= get_sidebar(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>