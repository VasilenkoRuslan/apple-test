<?php
$acf_footer = get_field('footer', 'options');

/*
 * display footer-logo shortcode
 */
function get_footer_logo()
{
  $array_logo = get_field('footer_footer_logo', 'options');
  if (!isset($array_logo)) {
    return false;
  }
  $logo = $array_logo['sizes']['thumbnail'];
  $logo_url = home_url('/');
  $html_logo = <<<HTML
<div class="footer-logo mb-35">
  <a href="{$logo_url}">
    <img src="{$logo}" alt="footer logo">
  </a>
</div>
HTML;
  return $html_logo;
}

add_shortcode('footer-logo', 'get_footer_logo');

/*
 * display footer-description after logo shortcode
 */
function get_footer_description()
{
  $description = get_field('footer_description', 'options');
  if (!isset($description)) {
    return false;
  }
  $html_description = <<<HTML
<p class="text mb-30">{$description}</p>
HTML;
  return $html_description;
}

add_shortcode('footer-description', 'get_footer_description');

/*
 * display footer-phone block shortcode
 */
function get_footer_phone()
{
  global $temp_site_dir;
  $arr_phone = get_field('footer_footer_phone', 'options');
  if (!isset($arr_phone)) {
    return false;
  }
  $phone_title = $arr_phone['phone_title'];
  $phone_number = $arr_phone['phone_number'];

  $html_phone = <<<HTML
<div class="address-widget mb-30">
    <div class="media">
        <span class="address-icon mr-3">
            <img src="{$temp_site_dir}assets/img/icon/phone.png" alt="phone">
        </span>
        <div class="media-body">
            <p class="help-text text-uppercase">{$phone_title}</p>
            <h4 class="title text-dark"><a href="tel:{$phone_number}">{$phone_number}</a></h4>
        </div>
    </div>
</div>
HTML;
  return $html_phone;
}

add_shortcode('footer-phone', 'get_footer_phone');

/*
 * display footer-social block with social icons shortcode
 */
function get_footer_social_icons()
{
  $list_social_icons = get_field('footer_social_networks', 'options');
  if (!isset($list_social_icons)) {
    return false;
  }

  $html_social_icons = <<<HTML
<div class="social-network">
    <ul class="d-flex">
HTML;

  foreach ($list_social_icons as $icon) {
    $html_social_icons .= <<<HTML
      <li><a href="{$icon['network_url']}" target="_blank"><span class="{$icon['icon_class']}"></span></a></li>
HTML;
  }
  $html_social_icons .= <<<HTML
    </ul>
</div>
HTML;
  return $html_social_icons;
}

add_shortcode('footer-social', 'get_footer_social_icons');
