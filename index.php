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
		<div class="col-sm-9" style="background:white;">
			<div class="panel panel-info">
				<div class="panel-heading">お知らせ</div>
  				<div class="panel-body">
    				Excaliburは現在開発中です。
  				</div>
			</div>
			
			<!-- MyDeck List Selector DropDown button -->
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    マイデッキ <span class="caret"></span>
                </button>
                <?php showDeckList(); ?>
            </div>
            <!-- MyDeck Table View -->
            <?php showDeck(); ?>
            
            <hr>
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

<?php
/**
 * デッキリストを表示する 
 * 
 */
function showDeckList() {
    echo '<ul class="dropdown-menu" role="menu">';
    for ($i=1; $i<=10; $i++) {
        if($_SESSION['deck'][$i]) {
            $deckName = $_SESSION['deck'][$i];
        } else {
            $deckName = "マイデッキ $i";
        }
        echo '<li><a href="./?deck='.$i.'">'.$deckName.'</a></li>';
    }
    echo '</ul>';
}

/**
 * デッキをテーブル表示する
 * 
 */
function showDeck() {
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

    if($_GET['deck']){
        $deckNum = h($_GET['deck']);
    } else {
        $deckNum = '1';
    }
    for($cardNum=1; $cardNum<=10; $cardNum++) {
        if($_SESSION['deck'][$deckNum][$cardNum]) {
            $title = h($_SESSION['deck'][$deckNum][$cardNum]['title']);
            $name  = h($_SESSION['deck'][$deckNum][$cardNum]['name']);
            $sql = "select * from cards where Title='$title' and Name='$name' ";
            $dbh = connectDb();
            $stmt = $dbh->query("SET NAMES utf8;");
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
        
            while($record = $stmt->fetch()) {
                $line = '';
                $line .= '<tr>';
                $line .= '<td>'.$cardNum.'</td>';
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
        } else {
            $line = '';
            $line .= '<tr>';
            $line .= "<td>$cardNum</td>";
            for($i=0;$i<13;$i++) {
                $line .= '<td></td>';
            }
            $line .= '</tr>';
            echo $line;
        }
    }
    echo '</tbody>';
    echo '</table>';
}




?>