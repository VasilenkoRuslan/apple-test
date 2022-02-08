<?php

class NewsPage {

	// get array sports tag
	function get_types_sport() {
		$sports = get_terms(array(
			'taxonomy'   => 'sports',
			'hide_empty' => false,
		));

		if (empty($sports)) {
			return false;
		}
		// get array with key = sport id, value = sport name
		$arraySports = array();
		foreach ($sports as $sport) {
			$arraySports[$sport->term_id] = $sport->name;
		}
		return $arraySports;
	}

	// get html sports tags
	function display_sports() {
		$arr_sports = $this->get_types_sport();
		if (empty($arr_sports)) {
			return false;
		}

		$sports_count = 0;
		$title_block = __('Filter sports:', 'apple');

		//start html block
		$block = <<<HTML
<div class="col-lg-3 order-lg-first mb-30 news_sports">
<h3>{$title_block}</h3>
<ul>
HTML;
		foreach ($arr_sports as $sport_id => $sport_name) {
			$sport_class = null;
			$sports_count ++;

			$block .= '<li><a href="#" class="sport-btn ' . $sport_class . '" data-sport="' . $sport_id . '">' . $sport_name . '</a></li>';
		}
		$name_reset_btn = __('reset', 'apple');
		$block .= '<li><a href="#" class="sport-btn-reset">'.$name_reset_btn.'</a></li>';

		//end html block
		$block .= '</ul></div>';

		return $block;
	}

	// display all news block
	function display_news($SportsID = array(), $posts_per_page = 4, $paged = 1)
	{
		$tax_query = '';
		if (!empty($SportsID)) {
			$tax_query = array(
				array(
					'taxonomy' => 'sports',
					'field' => 'term_id',
					'terms' => $SportsID,
				));
		}

		$all_news = new WP_Query(array(
			'posts_per_page' => $posts_per_page,
			'post_type' => 'news',
			'suppress_filters' => false,
			'paged' => $paged,
			'tax_query' => $tax_query,
		));

		if ( !($all_news->have_posts()) ) {
			return __('Have no news posts on active filter Sport item!', 'apple');
		}

		if ( $all_news->have_posts() ) :
					$block = <<<HTML
<div data-paged="{$paged}" data-post-per-page="{$posts_per_page}" class="row">
HTML;

			while ( $all_news->have_posts() ) : $all_news->the_post();

				$news_item_id = get_the_ID();
				$news_item_url = get_permalink($news_item_id);
				$news_item_title = get_the_title();
				$news_item_title = (!empty($news_item_title)) ? $news_item_title : __('News without title', 'apple');
				$news_thumbnail = get_the_post_thumbnail();
				$html_thumbnail = (!empty($news_thumbnail)) ? $news_thumbnail : '<img src="//via.placeholder.com/571.png?text=DefaultThumbnail" alt="DefaultThumbnail"/>';
				$news_author = get_the_author();
				$news_author_url = get_author_posts_url(NULL, $news_author);
				$news_date = get_the_date('d M, Y', $news_item_id);
				$news_content = wp_trim_words(get_the_content(), 35, ' ...');
				$txt_more = __('Read More', 'apple');

				$block .= <<<HTML
<div class="col-sm-12 col-md-12 mb-30">
    <div id="news-{$news_item_id}" class="single-blog media flex-column flex-md-row">
        <a class="blog-thumb mb-20 mb-md-0 mr-md-4 mr-xl-5 w-md-50 zoom-in d-block overflow-hidden"
           href="{$news_item_url}">
        	{$html_thumbnail}
        </a>
        <div class="blog-post-content media-body mb-5 mb-md-0">
            <h3 class="title mb-15"><a href="{$news_item_url}">{$news_item_title}</a>
            </h3>
            <h5 class="sub-title"> Posted by <a class="blog-link"
                                                href="{$news_author_url}"> {$news_author}</a>
                <span class="separator">/</span> {$news_date}</h5>
            <p class="text">
                {$news_content}
            </p>
            <a class="read-more" href="{$news_item_url}">{$txt_more}</a>
        </div>
    </div>
</div>
HTML;

			endwhile;

            $block .= '<div class="pagination">'.paginate_links( array(
		            'base'               => "",
                'current' => max( 1, $paged ),
                'total'   => $all_news->max_num_pages,
		            'prev_next' => false,
		            'prev_text'    => __('««', 'apple'),
		            'next_text'    => __('»»', 'apple'),
            ) ).'</div>';

            wp_reset_postdata();

            $block .= '</div>';
		endif; ?>

<?php

		return $block;
	}
}

