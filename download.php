<?php

require_once('config.php');
require_once('functions.php');

session_start();

$date = new DateTime('now', new DateTimeZone('Asia/Tokyo'));

$downloaddir =  __DIR__ . '/downloads/';
$filename = 'Excalibur' .$date->format('YmdHis'). '.csv';
$downloadfile = $downloaddir . $filename;

if(file_exists($downloadfile)){
    unlink($downloadfile);
}

saveData($downloadfile, 'cards');
changeCharset($downloadfile, 'SJIS', 'UTF-8');
downloadFile($downloadfile, $filename);

?>