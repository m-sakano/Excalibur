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
    setcookie("type[$decknum]", $type);
}

// return url
goBack();

function goBack() {
    unset($args);
    if ($_GET['search']) {
        $args[] = 'search='.h($_GET['search']);
    }
    if ($_GET['deck']) {
        $args[] = 'deck='.h($_GET['deck']);
    }
    $url = SITE_URL . printArgs($args);
    header('Location: '.$url);
    exit;
}
