<?php
//show taxonomy
add_action('apple_show_categories_list', 'apple_the_taxonomy_links', 10, 3);
add_action('apple_show_tags_list', 'apple_the_taxonomy_links', 10, 3);
add_action('apple_show_sports_list', 'apple_the_taxonomy_links', 10, 3);

if (!function_exists('apple_get_taxonomy_links')) {
  function apple_get_taxonomy_links($id = NULL, $taxonomy = 'category', $ahref = true)
  {
    if ((empty($id) && empty(get_the_ID())) || (empty($taxonomy) || !taxonomy_exists($taxonomy))) {
      return '';
    }
    $id = !empty($id) ? $id : get_the_ID();
    $terms = get_the_terms($id, $taxonomy);
    $terms_list = array();
    if (!empty($terms)) {
      foreach ($terms as $term) {
        if ($ahref) {
          $term_string = '<a class="blog-link" href="' . get_term_link($term->slug, $taxonomy) . '">' . $term->name . '</a>';
        } else {
          $term_string = $term->name;
        }
        $terms_list[] = apply_filters('apple_term_list_item_filter', $term_string, $id, $taxonomy);
      }
      $terms_list = implode(', ', $terms_list);
      return $terms_list;
    }
    return '';
  }
}

if (!function_exists('apple_the_taxonomy_links')) {
  function apple_the_taxonomy_links($id = NULL, $taxonomy = 'category', $ahref = true)
  {
    echo apple_get_taxonomy_links($id, $taxonomy, $ahref);
  }
}
