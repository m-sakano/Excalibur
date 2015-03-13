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
		$tmp_title[$deckNum][$j] = $title[$deckNum][$i];
		$tmp_name[$deckNum][$j] = $name[$deckNum][$i];
		$j++;
	}
}

// Cookieに書き戻す
for ($i=0; $i<10; $i++) {
    setcookie("title[$deckNum][$i]", $tmp_title[$deckNum][$i], COOKIE_LIFETIME);
    setcookie("name[$deckNum][$i]", $tmp_name[$deckNum][$i], COOKIE_LIFETIME);
}

// return url
goBack();
