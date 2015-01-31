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
        		<li><a href="maintenance.php">メンテナンス</a></li>
      		</ul>
		</div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-3" style="background:white;">
		    <p> </p>
		</div>
		<div class="col-sm-6" style="background:white;">
			<div class="panel panel-info">
				<div class="panel-heading">お知らせ</div>
  				<div class="panel-body">
    				Excaliburは現在開発中です。
  				</div>
			</div>
		    <h1>ようこそ</h1>
		    <p>Excaliburは『乖離性ミリオンアーサー』のデッキ構築を支援します。<br>
		    	デッキはアーサーごとに10個までセーブできます。<br>
		    	デッキのセーブデータはブラウザのcookieに記録されます。cookieをクリアするとデッキも削除されます。</p>
		    <h2>使い方</h2>
		    <p>所持カードの選択、デッキの構築、の順番に行います。</p>
		    <h3>所持カードの選択</h3>
		    <p>所持カードを選択します。デッキ構築をより簡単にするためには、デッキに含めないカードは選択から外しておきます。
		    	所持カードを選択したら、デッキ構築の前にセーブします。</p>
		    <h3>デッキ構築</h3>
		    <p>所持カードからデッキ構築を行います。お気に入りのデッキができたらセーブしておきましょう。
		    	デッキはアーサーごとに10個までセーブできます。
		    	またデッキを管理しやすいようにラベルをつけることができます。</p>
		</div>
		<div class="col-sm-3" style="background:white;">
			<script src="http://bijo-linux.com/bp/js/bijo-off-0.9.js"></script>
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
