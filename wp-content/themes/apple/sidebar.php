<?php
global $temp_site_dir;
?>
<div class="col-lg-3 order-lg-first mb-30">
	<aside class="blog-left-sidebar">
          <?php
              if (is_active_sidebar('sidebar')) {
                  dynamic_sidebar('sidebar');
              }
          ?>
	</aside>
</div>
