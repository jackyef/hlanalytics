<?php
require_once 'simplepie-master/autoloader.php';
include 'connect.php';
set_time_limit(300);
$url = array('http://rss.detik.com/index.php/detiknews',
'http://rss.vivanews.com/get/politik',
'http://detik.feedsportal.com/c/33613/f/656082/index.rss',
'http://rss.detik.com/index.php/finance',
'http://rss.detik.com/index.php/hot',
'http://detiknet.com/index.php/detik.feed',
'http://rss.detik.com/index.php/sport',
'http://rss.detik.com/index.php/otomotif',
'http://rss.detik.com/index.php/food',
'http://rss.detik.com/index.php/foto',
'http://rss.detik.com/index.php/detiknews',
'http://www.antaranews.com/rss/news.xml',
'http://www.antaranews.com/rss/nas.xml',
'http://www.antaranews.com/rss/int.com',
'http://www.antaranews.com/rss/ekb.xml',
'http://www.antaranews.com/rss/ork.xml');

$feed = new SimplePie();
$feed->set_cache_location('cache_files');

$j = 0;
while($j < sizeof($url)){
	$current_feed = $feed->set_feed_url($url[$j]);
	$feed->init();
	$current_feed_name = $feed->get_title();
	$i = 0;
	while ($i < $feed->get_item_quantity()){
		$item = $feed->get_item($i);
		$judul = $item->get_title();
		$tanggal = $item->get_date('Y-m-d');
		
		echo $judul . ' ' . $tanggal .' '. $current_feed_name. '<br>';
		$i = $i + 1;
		
		//insert to database
		$sql = "INSERT INTO `headlines` (`headline`, `source`, `date`) VALUES ('$judul', '$current_feed_name', '$tanggal')";
		
		if ($mysqli->query($sql) === TRUE) {
			$json = array("status" => 1, "msg" => "Headline inserted!");
		}else{
			$json = array("status" => 0, "msg" => "Error inserting headline!");
		}
		
	}
	$j++;
}
$sql2 = "UPDATE `headlines` SET `source` = 'Tempo' WHERE `source` LIKE '%Tempo%'";
$mysqli->query($sql2);
$sql2 = "UPDATE `headlines` SET `source` = 'AntaraNews' WHERE `source` LIKE '%ANTARA%'";
$mysqli->query($sql2);
$sql2 = "UPDATE `headlines` SET `source` = 'Detik' WHERE `source` LIKE '%detik%'";
$mysqli->query($sql2);
$sql2 = "UPDATE `headlines` SET `source` = 'Okezone' WHERE `source` LIKE '%okezone%'";
$mysqli->query($sql2);
$sql2 = "UPDATE `headlines` SET `source` = 'Inilah' WHERE `source` LIKE '%Inilah%'";
$mysqli->query($sql2);
$sql2 = "UPDATE `headlines` SET `source` = 'VivaNews' WHERE `source` LIKE '%VIVA%'";
$mysqli->query($sql2);
$sql2 = "UPDATE `headlines` SET `source` = 'Liputan6' WHERE `source` LIKE '%Liputan6%'";
$mysqli->query($sql2);





//for debugging purpose
//header('Content-type: application/json');
//	echo json_encode($json);
?>