<?php
function remove_thumbnail_dimensions( $html )
{
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
  return $html;
}
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10);
