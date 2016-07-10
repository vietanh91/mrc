<?php
/*
Plugin Name: Ringier Vietnam v1
Plugin URI: http://www.ringier.vn
Description: Ringier Vietnam v1
Author: RVN <ringier-digital@ringier.com.vn>
Version: 1.0
Author URI: http://www.ringier.vn
*/

define("PATH_VIEW", __DIR__ . '/app/Views/');

if (!defined('CACHEGROUP')) {
    define('CACHEGROUP', 'default');
}
if (!defined('CACHETIME')) {
    define('CACHETIME', '3600');
}
if (!defined('DEFAULT_LIMIT')) {
    define('DEFAULT_LIMIT', 10000);
}

//if ( !defined('SENDY_LIST') ) define("SENDY_LIST", 'OSoGqkr5RWlOmKS892JEXDYQ');

if (!defined('AVATAR_DEFAULT')) {
    define('AVATAR_DEFAULT', get_template_directory_uri() . "/images/default_avatar.jpg");
}
if (!defined('PASSWORD_DEFAULT')) {
    define('PASSWORD_DEFAULT', 'marry.vn');
}

add_action('plugins_loaded', 'rvn_load', 500, 1);

function rvn_load()
{
    require_once __DIR__ . '/vendor/autoload.php';

    //call hooks
    //RVN\Hooks\Rewrite::init();
    //RVN\Hooks\BackendUI::init();
    RVN\Hooks\Shortcode::init();
    RVN\Hooks\CustomJourneyType::init();
    RVN\Hooks\CustomJourney::init();

    // call ajax
}