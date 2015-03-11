<?php

// SITE Settings
define('SITE_URL', 'http://www.chemicalbrain.net/Excalibur/');
define('BRAND', 'Excalibur');

// Cookie Settings
session_set_cookie_params(0, '/Excalibur/');
define('COOKIE_LIFETIME', time()+60*60*24*365*10);

// MySQL Database Connection Settings
define('DSN', 'mysql:host=localhost;dbname=Excalibur');
define('DB_USER', 'Excalibur');
define('DB_PASSWORD', 'Excalibur_password');

// Google Authentication Settings
define('CLIENT_ID', '957141889512-hsiekeccn0vau8aur3e89igu0skn7kee.apps.googleusercontent.com');
define('CLIENT_SECRET', 'd9HYUCpQOnA_YkvZDJAilkK1');


// DEBUG Settings
define('LOG_FILE', dirname(__FILE__) . '/app.log');
error_reporting(E_ALL &~E_NOTICE);

// Server Locale
setlocale(LC_ALL, 'ja_JP.UTF-8');
