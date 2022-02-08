<?php /* Template Name: About us */ ?>
<?php

require_once THEME_DIR . '/inc/classes/ThemeAbout.class.php';

$about = new ThemeAbout();

$acf_fields = get_field('content');

$html_content_about = '';

if (!empty($acf_fields)) {
	$html_content_about = <<<HTML
    <!-- product tab start -->
    <section class="about-section pt-80 pb-50">
        <div class="container">
HTML;

	foreach ($acf_fields as $about_block) {

		$layout = $about_block['acf_fc_layout'];

		switch ($layout) {
			case 'text_image_2_col':
				$html_content_about .= $about->text_image_2_col($about_block);
				break;
			case 'info_block':
				$html_content_about .= $about->info_content($about_block);
				break;
			default:
				echo 'Blocks error';
		}
	}
	$html_content_about .= <<<HTML
    </div>
    </section>
    <!-- product tab end -->
HTML;
}

get_header();
$title = get_the_title();
echo get_theme_page_title($title);
echo $html_content_about;
get_footer();

