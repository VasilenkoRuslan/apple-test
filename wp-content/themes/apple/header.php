<?php
require_once THEME_DIR . '/inc/classes/ThemeHeader.class.php';

$header = new ThemeHeader();
global $temp_site_dir;
$title = get_the_title();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="offcanvas-overlay"></div>
<?php
  echo $header->get_mobile_menu();// TODO not ready yet
  echo $header->get_wishlist();// TODO not ready yet
  echo $header->get_cart();// TODO not ready yet
?>
<header>
  <?php echo $header->get_header_top();// TODO not ready yet ?>
    <div class="header-middle pt-20">
        <div class="container">
            <div class="row align-items-center">
              <?php
                echo $header->get_logo();
                echo $header->get_phone_and_icons_toggleBtn();// TODO not ready yet
                ?>
                <div class="col-lg-5 col-xl-6 order-lg-first">
                <?php
                get_search_form();
              ?>
                </div>
            </div>
        </div>
    </div>
    <?php
      echo $header->get_main_menu();
//      echo $header->get_mobile_categories();// TODO not ready yet
    ?>
</header>