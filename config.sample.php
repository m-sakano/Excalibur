<?php

// SITE Settings
define('SITE_URL', 'http://www.example.com/');
define('BRAND', '第二型エクスカリバー');

// Cookie Settings
session_set_cookie_params(0, '/');
define('COOKIE_LIFETIME', time()+60*60*24*365*10);

// MySQL Database Connection Settings
define('DSN', 'mysql:host=localhost;dbname=Excalibur');
define('DB_USER', 'Excalibur');
define('DB_PASSWORD', 'Excalibur_password');

// Google Authentication Settings
define('CLIENT_ID', '');
define('CLIENT_SECRET', '');


// DEBUG Settings
define('LOG_FILE', dirname(__FILE__) . '/app.log');
error_reporting(E_ALL &~E_NOTICE);

// Server Locale
setlocale(LC_ALL, 'ja_JP.UTF-8');
