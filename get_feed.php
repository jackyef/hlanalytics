<?php
require_once 'simplepie-master/autoloader.php';
include '/connect.php';
set_time_limit(3000);
$url = array(
'http://www.bbc.com/indonesia/berita_indonesia/index.xml',
'http://rss.detik.com/index.php/detiknews',
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
'http://www.antaranews.com/rss/ork.xml',
'http://www.antaranews.com/rss/sbh.xml',
'http://www.antaranews.com/rss/art.xml',
'http://www.antaranews.com/rss/wbm.xml',
'http://www.antaranews.com/rss/tek.xml',
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
'http://www.inilah.com/rss/feed/fokus/',
'http://rss.tempointeraktif.com/index.xml',
'http://rss.tempointeraktif.com/fokus.xml',
'http://rss.tempointeraktif.com/nasional.xml',
'http://rss.tempointeraktif.com/internasional.xml',
'http://rss.tempointeraktif.com/senihiburan.xml',
'http://rss.tempointeraktif.com/teknologi.xml',
'http://rss.tempointeraktif.com/gayahidup.xml',
'http://rss.tempointeraktif.com/selebritas.xml',
'http://rss.tempointeraktif.com/otomotif.xml',
'http://rss.tempointeraktif.com/cariangin.xml',
'http://rss.tempointeraktif.com/opini.xml',
'http://rss.tempointeraktif.com/caping.xml',
'http://rss.tempointeraktif.com/kolom.xml',
'http://rss.tempointeraktif.com/metro.xml',
'http://rss.tempointeraktif.com/bisnis.xml',
'http://rss.tempointeraktif.com/olahraga.xml',
'http://www.liputan6.com/feed/rss',
'http://www.liputan6.com/feed/rss2/',
'http://www.liputan6.com/feed/actual/');

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