<?php
/**
 * Created by PhpStorm.
 * User: vietanh
 * Date: 9/25/2016
 * Time: 5:51 PM
 */


define("FACEBOOK_APP_ID", "913210768811539");
define("FACEBOOK_SECRET", "5f955f910212ee23d8d5fab846e6b050");

define("GOOGLE_CLIENT_ID", "1016359682208-k6m91deb6th0vgk1khl4op3ojuotj52b.apps.googleusercontent.com");
define("GOOGLE_CLIENT_SECRET", "RDJcby4lI0vodEt7mmTM-fG5");

define("PATH_VIEW", __DIR__ . '/app/Views/');
define("VIEW_URL", WP_SITEURL . '/wp-content/plugins/ringier-v1/app/Views/_assets');

if (!defined('CACHEGROUP')) {
    define('CACHEGROUP', 'default');
}
if (!defined('CACHETIME')) {
    define('CACHETIME', '3600');
}

//if ( !defined('SENDY_LIST') ) define("SENDY_LIST", 'OSoGqkr5RWlOmKS892JEXDYQ');

if (!defined('AVATAR_DEFAULT')) {
    define('AVATAR_DEFAULT', get_template_directory_uri() . "/images/default_avatar.jpg");
}
if (!defined('PASSWORD_DEFAULT')) {
    define('PASSWORD_DEFAULT', 'mrc1234');
}

if (!defined('SECURE_SECRET_ATM')) {
    define('SECURE_SECRET_ATM', 'A3EFDFABA8653DF2342E8DAC29B51AF0');
}

if (!defined('SECURE_SECRET_CC')) {
    define('SECURE_SECRET_CC', '6D0870CDE5F24F34F3915FB0045120DB');
}


// Current secure secret - accept one payment method (credit card)
if (!defined('SECURE_SECRET')) {
    define('SECURE_SECRET', SECURE_SECRET_CC);
}

if (!defined('EMAIL_PATH')) {
    define('EMAIL_PATH', ABSPATH . '_email/');
}

if (!defined('SUBSCRIBE_LIST')) {
    define('SUBSCRIBE_LIST', 'RGc7bPC3b2UkfX4CsOw2HQ');
}


// TABLE NAME
if (!defined('DB_PREFIX')) {
    global $wpdb;
    define('DB_PREFIX', $wpdb->prefix);
}

define('TBL_ADDON_OPTIONS', DB_PREFIX . 'addon_options');
define('TBL_OFFER_INFO', DB_PREFIX . 'offer_info');
define('TBL_JOURNEY_INFO', DB_PREFIX . 'journey_info');
define('TBL_POST_INFO', DB_PREFIX . 'post_info');