<?php
$news_query = New WP_Query([
  'post_type'=>'news'
]);
if ($news_query->have_posts()) : ?>
  <!-- thumbnails -->
  <div class="thumbnails-pan">
    <?php
    while ($news_query->have_posts()) :
      $news_query->the_post();
      get_template_part('templates/news-template');
    endwhile; ?>
  </div>
  <!-- thumbnails -->
<?php endif; ?>