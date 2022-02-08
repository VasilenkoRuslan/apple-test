<?php /* Template Name: News template */ ?>
<?php
require_once THEME_DIR . '/inc/classes/ThemeNews.class.php';
$news = new NewsPage();
?>
<?php get_header();
$title = get_the_title();
echo get_theme_page_title($title);
?>
<!-- main -->
<div role="main-inner-wrapper" class="news_page container pt-80 pb-50">
    <div class="row">
        <?php
        echo $news->display_sports();
        ?>
        <div id="news_content" class="news_content col-lg-9">
            <?php
            echo $news->display_news(NULL, 3);
            ?>
        </div>
    </div>
</div>
<!-- main -->
<?php get_footer(); ?>
<?php
