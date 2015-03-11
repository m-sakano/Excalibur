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
<body style="background-image:url('./b005.gif');">
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
				<li class="dropdown">
	          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	          		<span class="glyphicon glyphicon-book" aria-hidden="true"></span> デッキリスト <span class="caret"></span></a>
	          		<?php showDeckList(); ?>
	        	</li>
      		</ul>
		</div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
</div>

<div class="container" style="background:white;">
	<div class="row">
		<div class="col-sm-9">
			<div class="panel panel-info">
				<div class="panel-heading">お知らせ</div>
  				<div class="panel-body">
    				乖離性ミリオンアーサーのデッキシミュレータです。デッキ構築やメモとしてご利用ください。
  				</div>
			</div>
			<!-- 広告 -->
			<iframe src="http://rcm-fe.amazon-adsystem.com/e/cm?t=a8-affi-232192-22&o=9&p=13&l=ur1&category=tvgame&f=ifr" width=468 height=60 scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe> <img border="0" width="1" height="1" src="http://www12.a8.net/0.gif?a8mat=2BO2I4+EVVOA+249K+BWGDT" alt="">

			<!-- Deck Layer -->
			<div style="background:white;">
			<!-- Show Deck Name -->
			<form action="rename.php" method="get">
				<div class ="form-group">
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon1">
							<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
						</span>
						<input type="text" id="deckname" class="form-control" value="<?php echo getDeckName(); ?>" name="deckname" />
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">
							<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> デッキ名変更</button>
						</span>
					</div><!-- /input-group -->
					<?php 
						if ($_GET['search']) {
							echo '<input type="hidden" id="search" name="deck" value='.h($_GET['search']).' />';
						}
						if ($_GET['deck']) {
							echo '<input type="hidden" id="deck" name="deck" value='.h($_GET['deck']).' />';
						}
					?>
				</div>
			</form>
			<div class="row">
				<!-- Show Arthur Selector -->
				<div class="col-sm-2">
				<div class="btn-group">
					<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
					<?php echo getArthurType(); ?>
					<span class="caret"></span>
					</button>
					<?php showArthurList(); ?>
				</div>
				</div>
				<!-- Show Status -->
				<div class="col-sm-10">
				<?php showStatus(); ?>
				</div>
			</div>

            <!-- MyDeck Table View -->
            <?php showDeck(); ?>
            </div>

			<!-- 広告 -->
			<a href="http://px.a8.net/svt/ejp?a8mat=2HHPCT+ADATUI+6HW+2TEC1D" target="_blank">
			<img border="0" width="728" height="90" alt="" src="http://www28.a8.net/svt/bgt?aid=150311837627&wid=002&eno=01&mid=s00000000842017031000&mc=1"></a>
			<img border="0" width="1" height="1" src="http://www15.a8.net/0.gif?a8mat=2HHPCT+ADATUI+6HW+2TEC1D" alt="">

            <!-- Search Card -->
			<h2>カード検索</h2>
			<form action="<?php SITE_URL ?>" method="get">
				<div class ="form-group">
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon1">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						</span>
						<input type="text" id="cardname" class="form-control" placeholder="<?php echo getPlaceholder(); ?>" name="search" />
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span> カード検索</button>
						</span>
						<?php 
							if ($_GET['deck']) {
								echo '<input type="hidden" id="deck" name="deck" value='.h($_GET['deck']).' />';
							}
						?>
					</div>
				</div>
			</form>
			<div class="panel panel-info">
				<div class="panel-heading">検索Tips</div>
  				<div class="panel-body">
  					<ul>
  					<li>カードを検索して、選択したカードをデッキに追加します。</li>
  					<li>部分一致検索ができます。</li>
  					<li>複数のキーワードは指定できません。</li>
    				<li>称号（騎士など）は検索条件に含められません。</li>
    				</ul>
  				</div>
			</div>
            
            <!-- Show Search Result -->
            <?php showSearchResult(); ?>
            
            <!-- 広告 -->
            <a href="http://px.a8.net/svt/ejp?a8mat=2HHPCT+AG9ZVE+6HW+1NNMTD" target="_blank">
			<img border="0" width="468" height="60" alt="" src="http://www22.a8.net/svt/bgt?aid=150311837632&wid=002&eno=01&mid=s00000000842010020000&mc=1"></a>
			<img border="0" width="1" height="1" src="http://www12.a8.net/0.gif?a8mat=2HHPCT+AG9ZVE+6HW+1NNMTD" alt="">
		</div>
		<div class="col-sm-3">
			<!-- 広告 -->
			<a href="http://px.a8.net/svt/ejp?a8mat=2HHPCT+AG9ZVE+6HW+1NN7DT" target="_blank">
			<img border="0" width="250" height="250" alt="" src="http://www25.a8.net/svt/bgt?aid=150311837632&wid=002&eno=01&mid=s00000000842010018000&mc=1"></a>
			<img border="0" width="1" height="1" src="http://www10.a8.net/0.gif?a8mat=2HHPCT+AG9ZVE+6HW+1NN7DT" alt="">
			<!-- 広告 -->
			<table cellpadding="0" cellspacing="0" border="0" style=" border:1px solid #ccc; width:170px;"><tr style="border-style:none;"><td style="vertical-align:top; border-style:none; padding:10px 10px 0pt;"><a href="http://px.a8.net/svt/ejp?a8mat=2BO2I4+EVVOA+249K+BWGDT&a8ejpredirect=http%3A%2F%2Fwww.amazon.co.jp%2Fdp%2FB00Q3APQVY%2F%3Ftag%3Da8-affi-232192-22" target="_blank"><img border="0" alt="" src="http://ecx.images-amazon.com/images/I/61mG2sA4-rL._SS160_.jpg" /></a></td></tr><tr style="border-style:none;"><td style="font-size:12px; vertical-align:middle; border-style:none; padding:10px;"><p style="padding:0; margin:0;"><a href="http://px.a8.net/svt/ejp?a8mat=2BO2I4+EVVOA+249K+BWGDT&a8ejpredirect=http%3A%2F%2Fwww.amazon.co.jp%2Fdp%2FB00Q3APQVY%2F%3Ftag%3Da8-affi-232192-22" target="_blank">乖離性ミリオンアーサー オリジナル・サウンドトラック バトルコレクションズ</a></p></td></tr></table>
			<img border="0" width="1" height="1" src="http://www19.a8.net/0.gif?a8mat=2BO2I4+EVVOA+249K+BWGDT" alt="">
			<!-- 広告 -->
			<table cellpadding="0" cellspacing="0" border="0" style=" border:1px solid #ccc; width:170px;"><tr style="border-style:none;"><td style="vertical-align:top; border-style:none; padding:10px 10px 0pt;"><a href="http://px.a8.net/svt/ejp?a8mat=2BO2I4+EVVOA+249K+BWGDT&a8ejpredirect=http%3A%2F%2Fwww.amazon.co.jp%2Fdp%2F4757537182%2F%3Ftag%3Da8-affi-232192-22" target="_blank"><img border="0" alt="" src="http://ecx.images-amazon.com/images/I/515bKLBBkjL._SS160_.jpg" /></a></td></tr><tr style="border-style:none;"><td style="font-size:12px; vertical-align:middle; border-style:none; padding:10px;"><p style="padding:0; margin:0;"><a href="http://px.a8.net/svt/ejp?a8mat=2BO2I4+EVVOA+249K+BWGDT&a8ejpredirect=http%3A%2F%2Fwww.amazon.co.jp%2Fdp%2F4757537182%2F%3Ftag%3Da8-affi-232192-22" target="_blank">拡散性ミリオンアーサー 画集</a></p></td></tr></table>
			<img border="0" width="1" height="1" src="http://www12.a8.net/0.gif?a8mat=2BO2I4+EVVOA+249K+BWGDT" alt="">
			<!-- 広告 -->
			<table cellpadding="0" cellspacing="0" border="0" style=" border:1px solid #ccc; width:170px;"><tr style="border-style:none;"><td style="vertical-align:top; border-style:none; padding:10px 10px 0pt;"><a href="http://px.a8.net/svt/ejp?a8mat=2BO2I4+EVVOA+249K+BWGDT&a8ejpredirect=http%3A%2F%2Fwww.amazon.co.jp%2Fdp%2F4757538723%2F%3Ftag%3Da8-affi-232192-22" target="_blank"><img border="0" alt="" src="http://ecx.images-amazon.com/images/I/61NRXt+-t4L._SS160_.jpg" /></a></td></tr><tr style="border-style:none;"><td style="font-size:12px; vertical-align:middle; border-style:none; padding:10px;"><p style="padding:0; margin:0;"><a href="http://px.a8.net/svt/ejp?a8mat=2BO2I4+EVVOA+249K+BWGDT&a8ejpredirect=http%3A%2F%2Fwww.amazon.co.jp%2Fdp%2F4757538723%2F%3Ftag%3Da8-affi-232192-22" target="_blank">拡散性ミリオンアーサー 画集 VOL.2</a></p></td></tr></table>
			<img border="0" width="1" height="1" src="http://www16.a8.net/0.gif?a8mat=2BO2I4+EVVOA+249K+BWGDT" alt="">
			<!-- 広告 -->
			<a href="http://px.a8.net/svt/ejp?a8mat=2HHPCT+ADATUI+6HW+2TC6VL" target="_blank">
			<img border="0" width="250" height="250" alt="" src="http://www28.a8.net/svt/bgt?aid=150311837627&wid=002&eno=01&mid=s00000000842017021000&mc=1"></a>
			<img border="0" width="1" height="1" src="http://www14.a8.net/0.gif?a8mat=2HHPCT+ADATUI+6HW+2TC6VL" alt="">
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
 * アーサータイプを取得する
 * 
 */
function getArthurType () {
	if (isset($_GET['deck'])) {
		$decknum = h($_GET['deck']);
	} else {
		$decknum = '1';
	}
	if (isset($_COOKIE['type'][$decknum])) {
		$type = h($_COOKIE['type'][$decknum]);
	} else {
		$type = '傭兵アーサー';
	}
	return $type;
}

/**
 * アーサーリストのボタンを表示する
 * 
 */
function showArthurList() {
	if (isset($_GET['deck'])) {
		$args[] = 'deck='.h($_GET['deck']);
	} else {
		$args[] = 'deck=1';
	}
	if (isset($_GET['search'])) {
		$args[] = 'search='.h($_GET['search']);
	}
	$args1 = $args;
	$args2 = $args;
	$args3 = $args;
	$args4 = $args;
	$args1[] = 'type=傭兵アーサー';
	$args2[] = 'type=富豪アーサー';
	$args3[] = 'type=盗賊アーサー';
	$args4[] = 'type=歌姫アーサー';
	
	echo '<ul class="dropdown-menu" role="menu">';
	echo '<li><a href="settype.php'.printArgs($args1).'">傭兵アーサー</a></li>';
	echo '<li><a href="settype.php'.printArgs($args2).'">富豪アーサー</a></li>';
	echo '<li><a href="settype.php'.printArgs($args3).'">盗賊アーサー</a></li>';
	echo '<li><a href="settype.php'.printArgs($args4).'">歌姫アーサー</a></li>';
	echo '</ul>';
}

/**
 * 検索窓のプレースホルダを取得する 
 * 
 */
function getPlaceholder() {
	if ($_GET['search']) {
	    $placeholder = h($_GET['search']);
	} else {
	    $placeholder = 'カード名';
	}
	return $placeholder;
}

/**
 * デッキに登録するボタンを表示する 
 * 
 */
function showRegistBottun($title, $name) {
    $line  = '';
    $line .= '<a href="register.php';
    unset($args);
    if ($_GET['deck']) {
    	$args[] = 'deck='.h($_GET['deck']);
    }
    if ($_GET['search']) {
    	$args[] = 'search='.h($_GET['search']);
    }
	
    $args[] = 'title='.$title;
    $args[] = 'name='.$name;
    $line .= printArgs($args);
    $line .='">';
    $line .= '<span class="glyphicon glyphicon-book" aria-hidden="true"></span>';
    $line .= '</a>';
    return $line;
}

/**
 * デッキから削除するボタンを表示する
 * 
 */
function showDeleteBottun($title, $name) {
    $line  = '';
    $line .= '<a href="delete.php';
    unset($args);
    if ($_GET['deck']) {
    	$args[] = 'deck='.h($_GET['deck']);
    }
    if ($_GET['search']) {
    	$args[] = 'search='.h($_GET['search']);
    }
	
    $args[] = 'title='.$title;
    $args[] = 'name='.$name;
    $line .= printArgs($args);
    $line .='">';
    $line .= '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>';
    $line .= '</a>';
    return $line;	
}

/**
 * 検索結果テーブルを表示する 
 * 
 */
function showSearchResult() {
    if ($_GET['search']) {
        echo '<table class="table table-striped table-bordered">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>追加</th>';
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
        echo '<th>スキル</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        
	    if($_GET['deck']){
	        $deckNum = h($_GET['deck']);
	    } else {
	        $deckNum = '1';
	    }
        $name = escapeSql($_GET['search']);
        $sql = 'select * from cards where Name like "%'.$name.'%" ';
        $dbh = connectDb();
        $stmt = $dbh->query("SET NAMES utf8;");
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $i = 0;
        while($record = $stmt->fetch()) {
        	$i++;
            $line = '';
            $line .= '<tr>';
            $line .= '<td>'. showRegistBottun($record['Title'],$record['Name']) .'</td>';
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
            if (isset($_COOKIE['type'])) {
            	$arthurType = mb_substr(h($_COOKIE['type'][$deckNum]), 0, 2);
            } else {
            	$arthurType = '傭兵';
            }
            if ($arthurType == $record['Arthur']) {
            	$line .= '<td>'.$record['SkillSpecial'].'</td>';
            } else {
            	$line .= '<td>'.$record['SkillNormal'].'</td>';
            }
            $line .= '</tr>';
            echo $line;
        }
        $stmt->closeCursor();
        echo '</tbody>';
        echo '</table>';
    }
}

/**
 * デッキリストを表示する 
 * 
 */
function showDeckList() {
    echo '<ul class="dropdown-menu" role="menu">';
    for ($i=1; $i<=10; $i++) {
        if(isset($_COOKIE['deckname'][$i])) {
            $deckName = h($_COOKIE['deckname'][$i]);
        } else {
            $deckName = "マイデッキ $i";
        }
        unset($args);
        if ($_GET['search']) {
        	$args[] = 'search='.h($_GET['search']);
        }
        $args[] = 'deck='.$i;
        $url = SITE_URL . printArgs($args);
        echo '<li><a href="'.$url.'">'.$deckName.'</a></li>';
    }
    echo '</ul>';
}

/**
 * デッキ名を表示する
 * 
 */
function getDeckName() {
    if (isset($_GET['deck'])) {
        $decknum = h($_GET['deck']);
    } else {
        $decknum = 1;
    }
    
	if (isset($_COOKIE['deckname'][$decknum])) {
	    $deckName = h($_COOKIE['deckname'][$decknum]);
	} else {
	    $deckName = 'マイデッキ '.$decknum;
	}
	return $deckName;
}

/**
 * デッキのステータス値を表示する
 * 
 */
function showStatus() {
    if($_GET['deck']){
        $deckNum = h($_GET['deck']);
    } else {
        $deckNum = 1;
    }
    if(isset($_COOKIE['type'][$deckNum])) {
    	$arthurType = h($_COOKIE['type'][$deckNum]);
    } else {
    	$arthurType = '傭兵アーサー';
    }
    $statusHP = '';
    $statusPhysical = '';
    $statusMagic = '';
    $statusHeal = '';
    for($cardNum=0; $cardNum<10; $cardNum++) {
        if(isset($_COOKIE['title'][$deckNum][$cardNum]) && isset($_COOKIE['name'][$deckNum][$cardNum])) {
            $title = h($_COOKIE['title'][$deckNum][$cardNum]);
            $name  = h($_COOKIE['name'][$deckNum][$cardNum]);
            $sql = "select * from cards where Title='$title' and Name='$name' ";
            $dbh = connectDb();
            $stmt = $dbh->query("SET NAMES utf8;");
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            while($record = $stmt->fetch()) {
            	if($cardNum==1) {
	            	$statusHP		+= floor($record['BonusHP'] * 1.5);
	            	$statusPhysical	+= floor($record['BonusPhysical'] * 1.5);
	            	$statusMagic	+= floor($record['BonusMagic'] * 1.5);
	            	$statusHeal		+= floor($record['BonusHeal'] * 1.5);
            	} else {
	            	$statusHP		+= $record['BonusHP'];
	            	$statusPhysical	+= $record['BonusPhysical'];
	            	$statusMagic	+= $record['BonusMagic'];
	            	$statusHeal		+= $record['BonusHeal'];            		
            	}
            }
            $stmt->closeCursor();
        }
    }
	switch ($arthurType) {
		case '傭兵アーサー':
			$statusHP		+= 2650;
			$statusPhysical	+= 480;
			$statusMagic	+= 50;
			$statusHeal		+= 190;
			break;
		case '富豪アーサー':
			$statusHP		+= 4620;
			$statusPhysical	+= 330;
			$statusMagic	+= 70;
			$statusHeal		+= 40;
			break;
		case '盗賊アーサー':
			$statusHP		+= 2080;
			$statusPhysical	+= 100;
			$statusMagic	+= 480;
			$statusHeal		+= 240;
			break;
		case '歌姫アーサー':
			$statusHP		+= 2190;
			$statusPhysical	+= 50;
			$statusMagic	+= 330;
			$statusHeal		+= 480;
			break;
	}
	echo '<ol class="breadcrumb">';
	echo '<li>ＨＰ <span class="badge">'.$statusHP.'</span></li>';
	echo '<li>物理 <span class="badge">'.$statusPhysical.'</span></li>';
	echo '<li>魔法 <span class="badge">'.$statusMagic.'</span></li>';
	echo '<li>回復 <span class="badge">'.$statusHeal.'</span></li>';
	echo '</ol>';
}

/**
 * デッキをテーブル表示する
 * 
 */
function showDeck() {
    echo '<table class="table table-striped table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>削除</th>';
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
    echo '<th>スキル</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    if($_GET['deck']){
        $deckNum = h($_GET['deck']);
    } else {
        $deckNum = '1';
    }
    for($cardNum=0; $cardNum<10; $cardNum++) {
        if(isset($_COOKIE['title'][$deckNum][$cardNum]) && isset($_COOKIE['name'][$deckNum][$cardNum])) {
            $title = h($_COOKIE['title'][$deckNum][$cardNum]);
            $name  = h($_COOKIE['name'][$deckNum][$cardNum]);
            $sql = "select * from cards where Title='$title' and Name='$name' ";
            $dbh = connectDb();
            $stmt = $dbh->query("SET NAMES utf8;");
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
        	
        	$rowNum = $cardNum + 1;
            while($record = $stmt->fetch()) {
                $line = '';
                $line .= '<tr>';
                $line .= '<td>'.showDeleteBottun($record['Title'],$record['Name']).'</td>';
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
                if (isset($_COOKIE['type'])) {
                	$arthurType = mb_substr(h($_COOKIE['type'][$deckNum]), 0, 2);
                } else {
                	$arthurType = '傭兵';
                }
                if ($arthurType == $record['Arthur']) {
                	$line .= '<td>'.$record['SkillSpecial'].'</td>';
                } else {
                	$line .= '<td>'.$record['SkillNormal'].'</td>';
                }
                $line .= '</tr>';
                echo $line;
            }
            $stmt->closeCursor();
        } else {
            $line = '';
            $line .= '<tr>';
            for($i=0;$i<13;$i++) {
                $line .= '<td>&nbsp;</td>';
            }
            $line .= '</tr>';
            echo $line;
        }
    }
    echo '</tbody>';
    echo '</table>';
}

?>