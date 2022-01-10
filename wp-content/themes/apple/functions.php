<?php
define('THEME_DIR', get_template_directory());
define('THEME_DIR_URI', get_template_directory_uri());

/* link to html plate */
$temp_site_dir = THEME_DIR_URI . '/junno/'; //Todo: delete before production

require_once THEME_DIR .'/inc/helpers/file.php';
require_once THEME_DIR .'/inc/wp/enqueue_scripts.php';
require_once THEME_DIR .'/inc/wp/theme_support.php';
