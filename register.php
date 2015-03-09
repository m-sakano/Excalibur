<?php

require_once('config.php');
require_once('functions.php');

session_start();

// Cookieからtitle読み取り
if (isset($_COOKIE['title'][$_GET['deck']])) {
    for ($i=0; $i<10; $i++) {
        if(isset($_COOKIE['title'][$_GET['deck']][$i]))
        $title[$_GET['deck']][$i] = $_COOKIE['title'][$_GET['deck']][$i];
    }
}
// Cookieからname読み取り
if (isset($_COOKIE['name'][$_GET['deck']])) {
    for ($i=0; $i<10; $i++) {
        if(isset($_COOKIE['name'][$_GET['deck']][$i]))
        $name[$_GET['deck']][$i] = $_COOKIE['name'][$_GET['deck']][$i];
    }
}

// デッキ番号は1〜10
// カード番号は0〜9

// デッキに同じカードが含まれていないことを確認する
for ($i=0; $i<10; $i++) {
    if ($title[$_GET['deck']][$i]==$_GET['title'] && $name[$_GET['deck']][$i]==$_GET['name']) {
        goBack();
    }
}

// デッキの空き位置を探してカードを入れる
// 称号と名前のどちらかが空だったら上書きする
for ($i=0; $i<10; $i++) {
    if ((!isset($title[$_GET['deck']][$i])) || (!isset($name[$_GET['deck']][$i]))) {
        $title[$_GET['deck']][$i] = h($_GET['title']);
        $name[$_GET['deck']][$i] = h($_GET['name']);
        break;
    }
}

// Cookieに書き戻す
$n = h($_GET['deck']);
for ($i=0; $i<10; $i++) {
    setcookie("title[$n][$i]", $title[$_GET['deck']][$i]);
    setcookie("name[$n][$i]", $name[$_GET['deck']][$i]);
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
