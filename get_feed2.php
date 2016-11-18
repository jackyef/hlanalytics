<?php
require_once 'simplepie-master/autoloader.php';
include '/connect.php';
set_time_limit(3000);
$url = array(
'http://sindikasi.okezone.com/index.php/okezone/RSS2.0',
'http://sindikasi.okezone.com/index.php/news/RSS2.0',
'http://sindikasi.okezone.com/index.php/international/RSS2.0', 
'http://sindikasi.okezone.com/index.php/lifestyle/RSS2.0',
'http://sindikasi.okezone.com/index.php/celebrity/RSS2.0',
'http://sindikasi.okezone.com/index.php/sports/RSS2.0',
'http://sindikasi.okezone.com/index.php/bola/RSS2.0',
'http://sindikasi.okezone.com/index.php/autos/RSS2.0',
'http://sindikasi.okezone.com/index.php/techno/RSS2.0',
'http://sindikasi.okezone.com/index.php/tokoh/RSS2.0',
'http://sindikasi.okezone.com/index.php/economy/RSS2.0',
'http://sindikasi.okezone.com/index.php/foto/RSS2.0',
'http://sindikasi.okezone.com/index.php/pilkada/RSS2.0',
'http://sindikasi.okezone.com/index.php/kampus/RSS2.0',
'http://sindikasi.okezone.com/index.php/pemilu/RSS2.0',
'http://www.inilah.com/rss/feed/terkini/',
'http://www.inilah.com/rss/feed/headline/',
'http://www.inilah.com/rss/feed/terpopuler/',
'http://www.inilah.com/rss/feed/fokus/');

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
		$judul = trim($item->get_title());
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
$sql2 = "UPDATE `headlines` SET `source` = 'BBCIndonesia' WHERE `source` LIKE '%BBCIndonesia.com | Indonesia%'";
$mysqli->query($sql2);

$mysqli->close();
//for debugging purpose
//header('Content-type: application/json');
//	echo json_encode($json);
?>