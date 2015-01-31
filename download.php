<?php

require_once('config.php');
require_once('functions.php');

session_start();

$downloaddir =  __DIR__ . '/downloads/';
$downloadfile = $downloaddir . 'Excalibur' . '.csv';

if(file_exists($downloadfile)){
    unlink($downloadfile);
}

saveData($downloadfile, 'cards');
changeCharset($downloadfile, 'SJIS', 'UTF-8');
downloadFile($downloadfile, 'Excalibur.csv');

?>