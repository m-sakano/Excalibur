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
    setcookie("deckname[$decknum]", $deckname, COOKIE_LIFETIME);
}

// return url
goBack();
