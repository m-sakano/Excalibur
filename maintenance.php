<?php

require_once('config.php');
require_once('functions.php');

session_start();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>メンテナンスコンソール - <?php echo BRAND; ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico">
</head>
<body>
<?php include_once(dirname(__FILE__) . '/analyticstracking.php'); ?>
<div id="header" class="container" style="background:white;">
    <nav class="navbar navbar-default" role="navigation">
      	<div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            	<span class="sr-only">Toggle navigation</span>
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
          	</button>
          	<a class="navbar-brand" href="<?php echo SITE_URL; ?>"><?php echo BRAND; ?></a>
        </div>
      </div><!-- /.container-fluid -->
    </nav>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-12" style="background:white;">
		    <h1>データベースメンテナンス</h1>
		        <p>データファイルをダウンロードして編集しアップロードすることで、データの追加、削除、修正ができます。
		            この修正はExcaliburを利用している全てのユーザーに影響があります。<br>
		            ダウンロードしたファイルをバックアップとして、その複製を編集しアップロードしてください。
		            アップロード後に文字化けなどデータベースを破壊してしまった場合は、バックアップを再度アップロードしてください。</p>
		        <p>登録するデータはゲーム画面に表示されるものからの引用とし、カードの名前、数値などのデータを改変しないようにお願いします。</p>
		    <h2>データファイル（CSV）の仕様</h2>
    		    <p>文字コード：SJIS、改行コード：CR、区切り文字：,（カンマ）</br>
    		        Mac版ExcelのCSV仕様に準拠しています。</br>
    		        一行目はヘッダ行、二行目から末尾までがデータ行です。</p>
		    <h2>データファイルのダウンロード</h2>
			<form action="download.php" method="get">
				<div class="form-group">
					<input type="submit" value="ダウンロード" class="btn btn-primary" />
				</div>
			</form>
			<h2>データファイルのアップロード</h2>
			<form action="upload.php" method="post" enctype="multipart/form-data">
				<div class ="form-group">
					<label class="control-label" for="file">ファイル</label>
					<input type="file" id="file" class="form-control" placeholder="file" name="upfile" />
				</div>
				<div class="form-group">
					<input type="submit" value="アップロード" class="btn btn-primary" />
				</div>
			</form>
			<h2>データの同期</h2>
			    <p>データベースをWikiのデータと同期します。</p>
			    <p>この処理には時間がかかります。カード100枚あたり10分程度が目安です。</p>
			    <p>Wikiサイトへの負荷を低減するためにアクセス間隔を設定しているからです。</p>
			    <form action="scraping.php" method="get">
			        <div class="form-group">
			            <input type="submit" value="同期を開始" class="btn btn-primary" />
			        </div>
			    </form>
			<h2>データベース登録カード一覧</h2>
			    <?php showSearchResult(); ?>
		</div>
	</div>
</div>

<div id="footer" class="container" style="background:#FFFFFF;">
    <p align="right">出典：『乖離性ミリオンアーサー』（2014-2015 SQUARE ENIX CO., LTD.）</p>
</div>

<!-- jQuery & bootstrap plugins-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
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
?>
