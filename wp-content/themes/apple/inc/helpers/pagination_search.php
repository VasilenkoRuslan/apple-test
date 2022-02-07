<?php
if (!function_exists('apple_pagination_search_result')) {
	function apple_pagination_search_result($display = true) {
		
		global $wp_query;
		$searchPages = $wp_query -> max_num_pages;
		$theBig = 999999999;
		
		$paginateSearchArgs = array(
			'base'        => str_replace($theBig,'%#%',esc_url (get_pagenum_link($theBig))),
			'format'      => '?page = %#%',
			'current'     =>  max(1, get_query_var ('paged')),
			'total'       => $searchPages,
			'prev_next'   => false,
		);
		
		$html_pagination = '<div class="pagination">'.paginate_links($paginateSearchArgs).'</div>';
		
		if (!$display) {
			return $html_pagination;
		}
		
		echo $html_pagination;
		return false;
	}
}
