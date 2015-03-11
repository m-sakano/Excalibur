<?php

require_once('config.php');
require_once('functions.php');

session_start();

if(isset($deckNum)) {
    $deckNum = h($deckNum);
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

// デッキに同じカードが含まれていることを調べて削除する
for ($i=0; $i<10; $i++) {
    if ($title[$deckNum][$i]==$_GET['title'] && $name[$deckNum][$i]==$_GET['name']) {
        unset($title[$deckNum][$i]);
        unset($name[$deckNum][$i]);
    }
}

// デッキのカードをつめる
$j=0;
for ($i=0; $i<10; $i++) {
    if (isset($title[$deckNum][$i]) && isset($name[$deckNum][$i])) {
        $title[$deckNum][$j] = $title[$deckNum][$i];
        $name[$deckNum][$j] = $name[$deckNum][$i];
        unset($title[$deckNum][$i]);
        unset($name[$deckNum][$i]);
        $j++;
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
    if ($deckNum) {
        $args[] = 'deck='.h($deckNum);
    }
    $url = SITE_URL . printArgs($args);
    header('Location: '.$url);
    exit;
}
