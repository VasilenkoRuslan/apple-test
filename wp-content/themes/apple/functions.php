<?php
define('THEME_DIR', get_template_directory());
define('THEME_DIR_URI', get_template_directory_uri());

/* link to html plate */
$temp_site_dir = THEME_DIR_URI . '/junno/'; //Todo: delete before production

// wp
require_once THEME_DIR .'/inc/wp/enqueue_scripts.php';
require_once THEME_DIR .'/inc/wp/theme_support.php';
require_once THEME_DIR .'/inc/wp/image_sizes.php';
require_once THEME_DIR .'/inc/wp/widget_areas.php';
require_once THEME_DIR .'/inc/wp/menus.php';

// helpers
require_once THEME_DIR .'/inc/helpers/file.php';
require_once THEME_DIR .'/inc/helpers/theme.php';
require_once THEME_DIR .'/inc/helpers/comment-form-change-order-fields.php';
require_once THEME_DIR .'/inc/helpers/pagination_search.php';

// custom post type
require_once THEME_DIR .'/inc/cpt/news.php';

// walker comments
require_once THEME_DIR .'/inc/walkers/AppleWalkerComments.class.php';

// add blocks
require_once THEME_DIR .'/inc/blocks/show_tax.php';

// hooks
require_once THEME_DIR .'/inc/hooks/images.php';

//ajax
require_once THEME_DIR .'/inc/ajax/news.php';

// advanced custom fields
require_once THEME_DIR .'/inc/acf/options-page.php';

// shortcodes
require_once THEME_DIR .'/inc/shortcodes/footer_shortcodes.php';
require_once THEME_DIR .'/inc/shortcodes/sidebar_shortcodes.php';


