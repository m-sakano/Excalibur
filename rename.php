<?php

require_once('config.php');
require_once('functions.php');

session_start();

// decknameをCOOKIEに設定する
if (isset($_GET['deckname'])) {
    if (isset($_GET['deck'])) {
        $decknum = h($_GET['deck']);
    } else {
        $decknum = '1';
    }
    $deckname = h($_GET['deckname']);
    setcookie("deckname[$decknum]", $deckname);
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
