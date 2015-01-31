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
    <title><?php echo BRAND; ?></title>
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
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
        		<li><a href="card.php">所持カード</a></li>
        		<li><a href="deck.php">デッキ構築</a></li>
        		<li class="active"><a href="maintenance.php">メンテナンス</a></li>
      		</ul>
		</div><!-- /.navbar-collapse -->
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
		        <p>カードは最大レアリティ、最大レベルのデータのみを登録してください。
		            デッキ構成に含められない、チアリー、キラリーなどのカードは登録しないでください。
		            これはデッキ構成のときに選択肢が多くなりすぎてしまうことを回避するためです。</p>
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
