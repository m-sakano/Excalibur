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
	        	<li class="active">
	        		<a href="#">ユーザーガイド <span class="sr-only">(current)</span></a>
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
			
			<!-- Help Layer -->
			<div style="background:white;">
				<h2>マイデッキの選択</h2>
					ページの最上部にあるナビゲーションバーの
					<span class="glyphicon glyphicon-book" aria-hidden="true"></span> デッキリスト <span class="caret"></span>
					からマイデッキを選択します。<br>
					デッキは10個まで保存しておくことができます。<br>
					<img src="help1.png" class="img-thumbnail">
				<h2>デッキの構築</h2>
					<h3>カードの検索</h3>
						カード検索でカード名を検索してデッキに追加するカードの候補を表示します。
						キーワードは部分一致検索ができます。
						指定できるキーワードはひとつだけです。
						「騎士」などの称号はキーワードに指定できません。<br>
						<img src="help2.png" class="img-thumbnail">
					<h3>カードの追加</h3>
						検索して表示したカードの候補の中からデッキに追加するカードを選び
						<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
						アイコンをクリックしてデッキに追加します。<br>
						<img src="help3.png" class="img-thumbnail">
					<h3>カードの削除</h3>
						デッキのカード一覧から削除するカードを選び
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						アイコンをクリックしてデッキから削除します。<br>
						<img src="help4.png" class="img-thumbnail">
					<h3>デッキ名の変更</h3>
						デッキに名前をつけることができます。
						デッキ名を編集し
						<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> デッキ名変更
						ボタンをクリックして名前の変更を確定します。<br>
						<img src="help5.png" class="img-thumbnail">
					<h3>アーサータイプの選択</h3>
						ドロップダウンリストからアーサータイプを選択します。
						選択したアーサータイプはステータスに反映されます。
						ステータスは上限値で設定されます。<br>
						<img src="help6.png" class="img-thumbnail">
				<h2>データの保存と削除</h2>
					<h3>データの保存</h3>
						データはCOOKIEに自動的に保存されます。
						COOKIEはブラウザにユーザデータを保存するための領域です。
						COOKIEに保存されるデータは最大でも数KB程度です。
					<h3>データの削除</h3>
						ブラウザでCOOKIEを削除するとデッキデータは初期化されます。
						デッキデータはサーバには保存されませんのでご注意ください。
            </div>
            
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