<?php

/**
 * データベースに接続する
 */
function connectDb() {
    try {
        return new PDO(DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

/**
 * SQLクエリのWhere句の特別な文字をエスケープする
 * 
 */
function escapeSql($s) {
    $line = '';
    for ($i = 0; $i < mb_strlen($s); $i++) {
        switch (mb_substr($s, $i, 1)) {
            case "\\":
                $line .= "\\\\";
                break;
            case "\"":
                $line .= "\\\"";
                break;
            case "'":
                $line .= "\\'";
                break;
            case "_":
                $line .= "\\_";
                break;
            case "%":
                $line .= "\\%";
                break;
            default:
                $line .= mb_substr($s, $i, 1);
        }
    }
    return $line;
}

/**
 * テキストをHTMLのエスケープ処理をして返す
 */
function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

/**
 * データベースにCSVファイルをロードする
 * 
 * @param string $f csvファイルのフルパス
 * @param stirng $t テーブル名
 */
function loadData($f, $t){
    $dbh = connectDB();
    $sql = "load data infile '$f' into table $t";
    $sql .= " fields terminated by ','";
    $sql .= " lines terminated by '\\r'";
    $sql .= " ignore 1 lines";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
}

/**
 * データベースからCSVファイルへセーブする
 * 
 * @param string $f csvファイルのフルパス
 * @param string $t テーブル名
 */
function saveData($f, $t){
    $dbh = connectDB();
    $sql = "select 'Num','Title','Name','Rare','Cost','Arthur','Type','Attribute',";
    $sql .= "'BonusHP','BonusPhysical','BonusMagic','BonusHeal','SkillNormal','SkillSpecial' union";
    $sql .= " select * from $t into outfile '$f'";
    $sql .= " fields terminated by ','";
    $sql .= " lines terminated by '\\r'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
}

/**
 * ユーザーにブラウザからファイルをダウンロードさせる
 * 
 * @param string $fpath ダウンロードさせるファイルのフルパス
 * @param string $fname ユーザーがダウンロードするファイル名
 */
function downloadFile($fpath, $fname){
    header('Content-Type: application/force-download');
    header('Content-Length: '.filesize($fpath));
    header('Content-disposition: attachment; filename="'.$fname.'"');
    readfile($fpath);
}

/**
 * 指定したファイルの文字コードを変換する
 * 
 * 文字コードはmb_convert_encoding()で指定できるもの
 * (ASCII,JIS,UTF-8,EUC-JP,SJIS)
 * 
 * @param string $fname 変換するファイルのフルパス
 * @param string $charsetTo 変換後の文字コード
 * @param string $charsetFrom 変換前の文字コード
 */
function changeCharset($fname, $charset_to, $charset_from){
    $data = mb_convert_encoding(file_get_contents($fname), $charset_to, $charset_from);
    $fp = fopen($fname, 'w');
    fwrite($fp, $data);
    fclose($fp);
}

/**
 * テーブルのレコードを全件削除する
 * 
 * @param string $t テーブル名
 */
function truncateTable($t){
    $dbh = connectDB();
    $sql = "truncate table $t";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
}

/**
 * URL引数を結合して返す
 * 
 */
function printArgs($args) {
	$line = '';
    if (count($args)!=0) {
    	$i = 0;
    	foreach ($args as $arg) {
    		if ($i == 0) {
    			$line .= '?'.$arg;
    		} else {
    			$line .= '&'.$arg;
    		}
    		$i++;
    	}
    }
    return $line;
}
