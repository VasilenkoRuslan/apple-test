search.php
<?php
get_header();
$title = __('Search page','apple');
echo get_theme_page_title($title, false);

$s = get_search_query();
?>
<section class="search_page blog-section pt-80 pb-50">
    <div class="container">
        <div class="row search_header">
            <div class="col-lg-9 mb-30">
                <h1 class="page-title">
                    <?php
                    printf( esc_html__( 'Result for "%s"', 'apple' ),
                        '<span class="page-description search-term">' . esc_html( $s ) . '</span>'
                    );
                    ?>
                </h1>
            </div>
        </div>
	    <?php
	    if ( have_posts() ) :
		    global $wp_query;
            $wp_query->set('posts_per_page', 6);
            $wp_query->query($wp_query->query_vars);
		    $posts_count = $wp_query->found_posts;
        ?>
        <div class="row search_count mb-30">
          <h3>
        <?php
        printf(
        esc_html(
                    /* translators: %d: The number of search results. */
                    _n(
                        'We found %d result for your search.',
                        'We found %d results for your search.',
                        (int) $posts_count,
                        'apple'
                    )
                ),
                (int) $posts_count
            );
        ?>
          </h3>
        </div>
        <div class="row search_content">
          <div class="col-lg-12">
              <div class="row">
        <?php
            while ( have_posts() ) :
	            the_post();
            
                get_template_part( 'templates/content/content-search-item' );
                
            endwhile;
        apple_pagination_search_result();
        ?>
              </div>
          </div>
        </div>
        <?php
        else:

        get_template_part( 'templates/content/content-none' );

        endif;
        ?>
    </div>
</section>
<?php
get_footer();

