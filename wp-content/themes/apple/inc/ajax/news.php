<?php
if (!function_exists('apple_news_action_callback')) {
	function apple_news_action_callback()
	{
		$data = $_POST['data'];
		
		if (!empty($data)) {
			
			require_once THEME_DIR . '/inc/classes/ThemeNews.class.php';
			$news = new NewsPage();
			
			$postPerPage = NULL;
			$arraySportsID = '';
			$paged = NULL;
			
			if (!empty($data['postPerPage'])) {
				$postPerPage = intval($data['postPerPage']);
			}
			if (!empty($data['paged'])) {
				$paged = intval($data['paged']);
			}
			
			if (!empty($data['activeSportsID'])) {
				$arraySportsID = $data['activeSportsID'];
			}
			echo $news->display_news($arraySportsID, $postPerPage, $paged);
			wp_die();
		}
		
		echo __('Error! No have variable data!', 'apple');
		wp_die();
	}
}
add_action('wp_ajax_get_news_content', 'apple_news_action_callback');
add_action('wp_ajax_nopriv_get_news_content', 'apple_news_action_callback');