<?php

require_once('config.php');
require_once('functions.php');

session_start();

if (isset($_GET['deck'])) {
    $deckNum = h($_GET['deck']); 
} else {
    $deckNum = 1;
}

// Cookieからtitle読み取り
if (isset($_COOKIE['title'][$deckNum])) {
    for ($i=0; $i<10; $i++) {
        if(isset($_COOKIE['title'][$deckNum][$i]))
        $title[$deckNum][$i] = $_COOKIE['title'][$deckNum][$i];
    }
}
// Cookieからname読み取り
if (isset($_COOKIE['name'][$deckNum])) {
    for ($i=0; $i<10; $i++) {
        if(isset($_COOKIE['name'][$deckNum][$i]))
        $name[$deckNum][$i] = $_COOKIE['name'][$deckNum][$i];
    }
}

// デッキ番号は1〜10
// カード番号は0〜9

// デッキに同じカードが含まれていないことを確認する
for ($i=0; $i<10; $i++) {
    if ($title[$deckNum][$i]==$_GET['title'] && $name[$deckNum][$i]==$_GET['name']) {
        goBack();
    }
}

// デッキの空き位置を探してカードを入れる
// 称号と名前のどちらかが空だったら上書きする
for ($i=0; $i<10; $i++) {
    if ((!isset($title[$deckNum][$i])) || (!isset($name[$deckNum][$i]))) {
        $title[$deckNum][$i] = h($_GET['title']);
        $name[$deckNum][$i] = h($_GET['name']);
        break;
    }
}

// Cookieに書き戻す
for ($i=0; $i<10; $i++) {
    setcookie("title[$deckNum][$i]", $title[$deckNum][$i], COOKIE_LIFETIME);
    setcookie("name[$deckNum][$i]", $name[$deckNum][$i], COOKIE_LIFETIME);
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
