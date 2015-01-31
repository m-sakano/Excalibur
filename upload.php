<?php

require_once('config.php');
require_once('functions.php');

session_start();

if (! $_FILES) {
    header('Location: '.SITE_URL);
    exit;
}

$uploaddir =  __DIR__ . '/uploads/';
//$date = new DateTime();
//$uploadfile = $uploaddir . $date->format('YmdHis') . '.csv';
$uploadfile = $uploaddir . 'Excalibur' . '.csv';

if (move_uploaded_file($_FILES['upfile']['tmp_name'], $uploadfile)) {
	changeCharset($uploadfile, 'UTF-8', 'SJIS');
	truncateTable('cards');
    loadData($uploadfile,'cards');
}

header('Location: '.SITE_URL.'maintenance.php');
exit;

?>