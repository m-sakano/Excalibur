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
    <meta name="description" content="乖離性ミリオンアーサーのデッキシミュレータです。デッキ構築やメモとしてご利用ください。">
    <meta name="keywords" content="乖離性,ミリオンアーサー,デッキ,シミュレータ,ツール">
    <title>乖離性ミリオンアーサー デッキシミュレータ - <?php echo BRAND; ?></title>
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
	        	<li>
	        		<a href="help.php">ユーザーガイド <span class="sr-only">(current)</span></a>
	        	</li>
      		</ul>
		</div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
</div>

<div class="container" style="background:white;">
	<div class="row">
		<div class="col-sm-9">
		
			<!-- 広告 -->
			<div style="background:white;">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- excalibur2 - メイン上部 -->
				<ins class="adsbygoogle"
				     style="display:block"
				     data-ad-client="ca-pub-5876045190636501"
				     data-ad-slot="6412769278"
				     data-ad-format="auto"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
			
			<div class="panel panel-info">
				<div class="panel-heading">お知らせ</div>
  				<div class="panel-body">
    				乖離性ミリオンアーサーのデッキシミュレータです。デッキ構築やメモとしてご利用ください。<br>
  				</div>
			</div>
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
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- excalibur2 - 中央部 -->
			<ins class="adsbygoogle"
			     style="display:block"
			     data-ad-client="ca-pub-5876045190636501"
			     data-ad-slot="7610300879"
			     data-ad-format="auto"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
			
            <!-- Search Card -->
			<h2>カード検索</h2>
			<form action="<?php SITE_URL ?>" method="get">
				<div class ="form-group">
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon1">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						</span>
						<input type="text" id="cardname" class="form-control" placeholder="カード名" name="search" value="<?php echo getSearchValue(); ?>" />
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span> カード検索</button>
						</span>
					</div>
					<?php
						if (isset($_GET['arthur'])) {
							$arthur = $_GET['arthur'];
						} else {
							$arthur = "";
						}
						showRadio($arthur);
					?>
					<?php 
						if ($_GET['deck']) {
							echo '<input type="hidden" id="deck" name="deck" value='.h($_GET['deck']).' />';
						}
					?>
				</div>
			</form>
			<div class="panel panel-info">
				<div class="panel-heading">検索Tips</div>
  				<div class="panel-body">
  					<ul>
  					<li>カードを検索して、選択したカードをデッキに追加します。</li>
  					<li>部分一致検索ができます。</li>
  					<li>キーワードに「全部」と入力すると選択したアーサーの全てのカードが表示されます。</li>
  					<li>複数のキーワードは指定できません。</li>
    				<li>称号（騎士など）は検索条件に含められません。</li>
    				</ul>
  				</div>
			</div>
            
            <!-- Show Search Result -->
            <?php showSearchResult(); ?>
            
            <!-- 広告 -->
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- excalibur2 - フッタ -->
			<ins class="adsbygoogle"
			     style="display:block"
			     data-ad-client="ca-pub-5876045190636501"
			     data-ad-slot="4656834478"
			     data-ad-format="auto"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>

		</div>
		<div class="col-sm-3">
			<!-- 広告 -->
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- excalibur2 - 右上ver2 -->
			<ins class="adsbygoogle"
			     style="display:block"
			     data-ad-client="ca-pub-5876045190636501"
			     data-ad-slot="1842968874"
			     data-ad-format="auto"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
			
		</div>
	</div>
</div>
<div id="footer" class="container" style="background:#d9edf7;padding:60px;">
	<div class="row">
		<div class="col-sm-6">
			<h4>ようこそ</h4>
			第二型エクスカリバーは、乖離性ミリオンアーサーをプレイするアーサーさんのためのデッキシミュレータです。<br>
			新しいデッキ構築をシミュレーションしたり、メモとして残しておいたり。<br>
			かなりべんり（かなり）
		</div>
		<div class="col-sm-6">
    		<h4>出典</h4>
    		『乖離性ミリオンアーサー』（2014-2015 SQUARE ENIX CO., LTD.）
    	</div>
    </div>
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
 * 検索窓の入力値を取得する 
 * 
 */
function getSearchValue() {
	if ($_GET['search']) {
	    $searchvalue = h($_GET['search']);
	} else {
	    $searchvalue = '';
	}
	return $searchvalue;
}

/**
 * 検索のラジオボタンを表示する
 * 
 */
function showRadio($arthur) {
	// $arthurが傭兵、富豪、盗賊、歌姫のいずれかでなければ、デフォルトの傭兵にする
	if (!($arthur=="傭兵" || $arthur=="富豪" || $arthur=="盗賊" || $arthur=="歌姫")) {
		$arthur="傭兵";
	}
	echo '<label class="radio-inline">';
	echo '<input type="radio" name="arthur" id="inlineRadio1" value="傭兵" ';
	if ($arthur=="傭兵") echo 'checked';
	echo '> 傭兵';
	echo '</label>';
	echo '<label class="radio-inline">';
	echo '<input type="radio" name="arthur" id="inlineRadio2" value="富豪" ';
	if ($arthur=="富豪") echo 'checked';
	echo '> 富豪';
	echo '</label>';
	echo '<label class="radio-inline">';
	echo '<input type="radio" name="arthur" id="inlineRadio3" value="盗賊" ';
	if ($arthur=="盗賊") echo 'checked';
	echo '> 盗賊';
	echo '</label>';
	echo '<label class="radio-inline">';
	echo '<input type="radio" name="arthur" id="inlineRadio4" value="歌姫" ';
	if ($arthur=="歌姫") echo 'checked';
	echo '> 歌姫';
	echo '</label>';
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
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        
	    if($_GET['deck']){
	        $deckNum = h($_GET['deck']);
	    } else {
	        $deckNum = '1';
	    }
	    if($_GET['arthur']){
	    	$arthur = $_GET['arthur'];
	    	if (!($arthur=="傭兵" || $arthur=="富豪" || $arthur=="盗賊" || $arthur=="歌姫")) {
	    		$arthur = escapeSql("傭兵");
	    	}
	    } else {
	    	$arthur = escapeSql("傭兵");
	    }
        $name = escapeSql($_GET['search']);
        if ($name=="全部") {
        	$sql = 'select * from cards where Arthur = "'.$arthur.'" order by Rare desc, Cost asc';
        } else {
        	$sql = 'select * from cards where Arthur = "'.$arthur.'" and Name like "%'.$name.'%" order by Rare desc, Cost asc';
        }
        $dbh = connectDb();
        $stmt = $dbh->query("SET NAMES utf8;");
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $i = 0;
        while($record = $stmt->fetch()) {
        	$i++;
            $line = '';
            $line .= '<tr>';
            $line .= '<td rowspan="2" align="cetner">'. showRegistBottun($record['Title'],$record['Name']) .'</td>';
            $line .= '<td>'.$record['Title'].'</td>';
            $line .= '<td>'.$record['Rare'].'</td>';
            $line .= '<td>'.$record['Cost'].'</td>';
            $line .= '<td>'.$record['Arthur'].'</td>';
            $line .= '<td>'.$record['Type'].'</td>';
            $line .= '<td>'.$record['Attribute'].'</td>';
            $line .= '<td>'.$record['BonusHP'].'</td>';
            $line .= '<td>'.$record['BonusPhysical'].'</td>';
            $line .= '<td>'.$record['BonusMagic'].'</td>';
            $line .= '<td>'.$record['BonusHeal'].'</td>';
            $line .= '</tr><tr>';
            $line .= '<td>'.$record['Name'].'</td>';
            if (isset($_COOKIE['type'])) {
            	$arthurType = mb_substr(h($_COOKIE['type'][$deckNum]), 0, 2);
            } else {
            	$arthurType = '傭兵';
            }
            if ($arthurType == $record['Arthur']) {
            	$line .= '<td colspan="9">'.$record['SkillSpecial'].'</td>';
            } else {
            	$line .= '<td colspan="9">'.$record['SkillNormal'].'</td>';
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
    $statusHP = 0;
    $statusPhysical = 0;
    $statusMagic = 0;
    $statusHeal = 0;
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
            	if($cardNum==0) {
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
    echo '<th><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></th>';
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
                $line .= '<td rowspan="2" align="center">'.showDeleteBottun($record['Title'],$record['Name']).'</td>';
                $line .= '<td>'.$record['Title'].'</td>';
                $line .= '<td>'.$record['Rare'].'</td>';
                $line .= '<td>'.$record['Cost'].'</td>';
                $line .= '<td>'.$record['Arthur'].'</td>';
                $line .= '<td>'.$record['Type'].'</td>';
                $line .= '<td>'.$record['Attribute'].'</td>';
                $line .= '<td>'.$record['BonusHP'].'</td>';
                $line .= '<td>'.$record['BonusPhysical'].'</td>';
                $line .= '<td>'.$record['BonusMagic'].'</td>';
                $line .= '<td>'.$record['BonusHeal'].'</td>';
                $line .= '</tr><tr>';
                $line .= '<td>'.$record['Name'].'</td>';
                if (isset($_COOKIE['type'])) {
                	$arthurType = mb_substr(h($_COOKIE['type'][$deckNum]), 0, 2);
                } else {
                	$arthurType = '傭兵';
                }
                if ($arthurType == $record['Arthur']) {
                	$line .= '<td colspan=9>'.$record['SkillSpecial'].'</td>';
                } else {
                	$line .= '<td colspan=9>'.$record['SkillNormal'].'</td>';
                }
                $line .= '</tr>';
                echo $line;
            }
            $stmt->closeCursor();
        } else {
            $line = '';
            $line .= '<tr>';
            for($i=0;$i<11;$i++) {
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