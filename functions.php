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
 * 検索データをテーブル表示する
 * 
 */
function showSearchResult() {

    $dbh = connectDb();
    $sql = "select * from cards";
    $stmt = $dbh->query("SET NAMES utf8;");
    $stmt = $dbh->prepare($sql);
    //$params = array(":id" => $_SESSION['me']['google_user_id']);
    //$stmt->execute($params);
    $stmt->execute();

    echo '<table class="table table-striped table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>番号</th>';
    echo '<th>称号</th>';
    echo '<th>名前</th>';
    echo '<th>レア</th>';
    echo '<th>コスト</th>';
    echo '<th>アーサー</th>';
    echo '<th>タイプ</th>';
    echo '<th>属性</th>';
    echo '<th>ＨＰ</th>';
    echo '<th>物理</th>';
    echo '<th>魔法</th>';
    echo '<th>回復</th>';
    echo '<th>通常スキル</th>';
    echo '<th>覚醒スキル</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while($record = $stmt->fetch()) {
        $line = '';
        $line .= '<tr>';
        $line .= '<td>'.$record['Number'].'</td>';
        $line .= '<td>'.$record['Title'].'</td>';
        $line .= '<td>'.$record['Name'].'</td>';
        $line .= '<td>'.$record['Rare'].'</td>';
        $line .= '<td>'.$record['Cost'].'</td>';
        $line .= '<td>'.$record['Arthur'].'</td>';
        $line .= '<td>'.$record['Type'].'</td>';
        $line .= '<td>'.$record['Attribute'].'</td>';
        $line .= '<td>'.$record['BonusHP'].'</td>';
        $line .= '<td>'.$record['BonusPhysical'].'</td>';
        $line .= '<td>'.$record['BonusMagic'].'</td>';
        $line .= '<td>'.$record['BonusHeal'].'</td>';
        $line .= '<td>'.$record['SkillNormal'].'</td>';
        $line .= '<td>'.$record['SkillSpecial'].'</td>';
        $line .= '</tr>';
        echo $line;
    }
    $stmt->closeCursor();
    echo '</tbody>';
    echo '</table>';
}
