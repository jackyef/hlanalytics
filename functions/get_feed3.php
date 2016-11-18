<?php
require_once 'simplepie-master/autoloader.php';
include 'connect.php';
set_time_limit(300);
$url = array(
'http://sindikasi.okezone.com/index.php/pilkada/RSS2.0',
'http://sindikasi.okezone.com/index.php/kampus/RSS2.0',
'http://sindikasi.okezone.com/index.php/pemilu/RSS2.0',
'http://www.inilah.com/rss/feed/terkini/',
'http://www.inilah.com/rss/feed/headline/',
'http://www.inilah.com/rss/feed/terpopuler/',
'http://www.inilah.com/rss/feed/fokus/',
'http://rss.tempointeraktif.com/index.xml',
'http://rss.tempointeraktif.com/fokus.xml',
'http://rss.tempointeraktif.com/nasional.xml',
'http://rss.tempointeraktif.com/internasional.xml',
'http://rss.tempointeraktif.com/senihiburan.xml',
'http://rss.tempointeraktif.com/teknologi.xml',
'http://rss.tempointeraktif.com/gayahidup.xml',
'http://rss.tempointeraktif.com/selebritas.xml',
'http://rss.tempointeraktif.com/otomotif.xml');

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