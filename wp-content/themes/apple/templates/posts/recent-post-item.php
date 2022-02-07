<?php
    $post_url = get_permalink();
    $thumbnail = get_the_post_thumbnail(null, 'thumbnail');
    $html_thumbnail = (!empty($thumbnail)) ? $thumbnail : '<img src="//via.placeholder.com/600.png?text=DefaultThumbnail" alt="DefaultThumbnail"/>';
    $post_title = wp_trim_words(get_the_title(), 6, '...');
    $date = get_the_date('d M, Y');
?>
<div class="post-thumb mr-4">
    <a href="<?= $post_url; ?>">
        <?= $html_thumbnail; ?>
    </a>
</div>
<div class="media-body">
    <h5 class="sub-title mb-1">
        <a href="<?= $post_url; ?>"><?= $post_title; ?></a>
    </h5>
    <span class="date">
        <?= $date; ?>
    </span>
</div>