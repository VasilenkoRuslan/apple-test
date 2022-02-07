<section id="<?php echo get_post_type() . "-" . get_the_ID(); ?>"
         class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
  <figure>
    <?php if (has_post_thumbnail()) :
      the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive'));
    else: ?>
      <img src="//via.placeholder.com/571.png?text=DefaultThumbnail" alt="" class="img-responsive"/>
    <?php endif; ?>
    <figcaption>
      <h3>
        <?php $post_title = !empty(get_the_title()) ? get_the_title() : __('News without title', 'apple');
        echo $post_title; ?>
      </h3>
    </figcaption>
  </figure>
</section>