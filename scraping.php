<?php

require_once('config.php');
require_once('functions.php');

session_start();

// Get Page List
$dom = new DOMDocument;
@$dom->loadHTMLFile('http://million-arthurs.gamerch.com/カードコレクション順');
$xpath = new DOMXPath($dom);
unset($pagelist);
$is_listed=false;
foreach ($xpath->query('//section[@id="js_async_main_column_text"]/a') as $url) {
	$url = $xpath->evaluate('string(@href)',$url);
	$url = mb_substr($url,0,mb_strpos($url,'#'));
	if (isset($pagelist)) {
		foreach ($pagelist as $page) {
			if ($page == $url) {
				$is_listed=true;
			}
		}
	}
	if ($is_listed == false) {
		$pagelist[] = $url;
	}
	$is_listed = false;
}

// Get Card URL List
unset($urllist);
foreach ($pagelist as $page) {
	$dom = new DOMDocument;
	@$dom->loadHTMLFile($page);
	$xpath = new DOMXPath($dom);
	foreach ($xpath->query('//div[@class="card_list"]/table/tbody/tr/td') as $url) {
		if ($xpath->evaluate('string(a/@href)',$url) != '#top' &&
		    $xpath->evaluate('string(a/@href)',$url) != 'http://million-arthurs.gamerch.com/【二つ名】騎士名') {
		    $urllist[] = $xpath->evaluate('string(a/@href)',$url);
		}
	}
}

$i = 1;
foreach ($urllist as $url) {
	// wait 3-7 seconds not to attack
	sleep(rand(3, 7)) ;
	// scraping code
	getCardData($url, $i);
	$i++;
}

function getCardData($url, $number) {
	$dom = new DOMDocument;
	@$dom->loadHTMLFile($url);
	$xpath = new DOMXpath($dom);
	
	// Title, Name
	foreach ($xpath->query('//*[@id="js_wikidb_main_name"]') as $val) {
		$title_name = $val->nodeValue;
	}
	$title = mb_substr($title_name, mb_strpos($title_name, '【') + 1, mb_strpos($title_name, '】') - mb_strpos($title_name, '【') - 1);
	$name = mb_substr($title_name, mb_strpos($title_name, '】') + 1, mb_strlen($title_name) - mb_strpos($title_name, '】') - 1);
	
	// Rare
	foreach ($xpath->query('//div[@class="ui_wikidb_top_pc "]/p[1]') as $val) {
		$rare = $val->nodeValue;
	}
	$rare = mb_substr($rare, 6, mb_strlen($rare) - 6);
	switch ($rare) {
		case 'N':
			$rare = 1;
			break;
		case 'HN':
			$rare = 2;
			break;
		case 'R':
			$rare = 3;
			break;
		case 'SR':
			$rare = 4;
			break;
		case 'UR':
			$rare = 5;
			break;
		case 'MR':
			$rare = 6;
			break;
		default :
			$rare = 0;
	}
	
	// Cost
	foreach ($xpath->query('//div[@class="ui_wikidb_top_pc "]/p[2]') as $val) {
		$cost = $val->nodeValue;
	}
	$cost = mb_substr($cost, 4, 1);
	
	// Arthur
	foreach ($xpath->query('//div[@class="ui_wikidb_top_pc "]/p[3]') as $val) {
		$arthur = $val->nodeValue;
	}
	$arthur = mb_substr($arthur,  8, 2);
	
	// Type
	foreach ($xpath->query('//div[@class="ui_wikidb_top_pc "]/p[4]') as $val) {
		$type = $val->nodeValue;
	}
	$type = mb_substr($type, 4, 1);
	
	// Attribute
	foreach ($xpath->query('//div[@class="ui_wikidb_top_area ui_clearfix "]/p[1]') as $val) {
		$attribute = $val->nodeValue;
	}
	$attribute = mb_substr($attribute, 3, 1);
	
	// BonusHP
	foreach ($xpath->query('//div[@class="ui_wikidb_middle_area ui_clearfix"]/p[1]') as $val) {
		$bonusHP = $val->nodeValue;
	}
	$bonusHP = mb_substr($bonusHP, 5, mb_strlen($bonusHP) - 5);
	
	// BonusPhysical
	foreach ($xpath->query('//div[@class="ui_wikidb_middle_area ui_clearfix"]/p[2]') as $val) {
		$bonusPhysical = $val->nodeValue;
	}
	$bonusPhysical = mb_substr($bonusPhysical, 9, mb_strlen($bonusPhysical) - 9);
	
	// BonusMagic
	foreach ($xpath->query('//div[@class="ui_wikidb_middle_area ui_clearfix"]/p[3]') as $val) {
		$bonusMagic = $val->nodeValue;
	}
	$bonusMagic = mb_substr($bonusMagic, 9, mb_strlen($bonusMagic) - 9);
	
	// BonusHeal
	foreach ($xpath->query('//div[@class="ui_wikidb_middle_area ui_clearfix"]/p[4]') as $val) {
		$bonusHeal = $val->nodeValue;
	}
	$bonusHeal = mb_substr($bonusHeal , 6, mb_strlen($bonusHeal) - 6);
	
	// SkillNormal
	foreach ($xpath->query('//div[@class="ui_wiki_db_bottom_wrapper "]/p[1]/span[2]') as $val) {
		$skillNormal = $val->nodeValue;
	}
	$skillNormal = str_replace(array("\r\n","\r","\n"), " ", $skillNormal);
	
	// SkillSpecial
	foreach ($xpath->query('//div[@class="ui_wiki_db_bottom_wrapper "]/p[2]/span[2]') as $val) {
		$skillSpecial = $val->nodeValue;
	}
	$skillSpecial = str_replace(array("\r\n","\r","\n"), " ", $skillSpecial);
	
	// Register Data to Database
    $dbh = connectDb();
    $sql = "select * from cards where Title = '$title' and Name = '$name'";
    $stmt = $dbh->query("SET NAMES utf8;");
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    if($stmt->fetchColumn()) {
    	//update
    	$sql = "update cards set
    				Rare='$rare',
    				Cost='$cost',
    				Arthur='$arthur',
    				Type='$type',
    				Attribute='$attribute',
    				BonusHP='$bonusHP',
    				BonusPhysical='$bonusPhysical',
    				BonusMagic='$bonusMagic',
    				BonusHeal='$bonusHeal',
    				SkillNormal='$skillNormal',
    				SkillSpecial='$skillSpecial'
    			where Title = '$title' and Name = '$name' ";
    } else {
    	//insert
    	$sql = "insert into cards (Number,Title,Name,Rare,Cost,Arthur,Type,Attribute,BonusHP,BonusPhysical,BonusMagic,BonusHeal,SkillNormal,SkillSpecial)
    			values('$number','$title','$name','$rare','$cost','$arthur','$type','$attribute','$bonusHP','$bonusPhysical','$bonusMagic','$bonusHeal','$skillNormal','$skillSpecial')";
		
    }
    $stmt = $dbh->query("SET NAMES utf8;");
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $stmt = null;
}

header('Location: '.SITE_URL.'maintenance.php');
exit;
