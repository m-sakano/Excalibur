<?php

require_once('config.php');
require_once('functions.php');

session_start();

// typeをCOOKIEに設定する
if (isset($_GET['type'])) {
    if (isset($_GET['deck'])) {
        $decknum = h($_GET['deck']);
    } else {
        $decknum = '1';
    }
    $type = h($_GET['type']);
    setcookie("type[$decknum]", $type, COOKIE_LIFETIME);
}

// return url
goBack();
