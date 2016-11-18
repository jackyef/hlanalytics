<?php
require_once 'simplepie-master/autoloader.php';
include '/connect.php';
set_time_limit(3000);
$url = array(
'http://feeds.foxnews.com/foxnews/world',
'http://feeds.foxnews.com/foxnews/tech',
'http://feeds.foxnews.com/foxnews/entertainment',

'http://feeds.abcnews.com/abcnews/internationalheadlines',
'http://feeds.abcnews.com/abcnews/technologyheadlines',
'http://feeds.abcnews.com/abcnews/entertainmentheadlines',

'http://feeds.bbci.co.uk/news/world/rss.xml',
'http://feeds.bbci.co.uk/news/entertainment_and_arts/rss.xml?edition=uk',
'http://feeds.bbci.co.uk/news/technology/rss.xml?edition=uk',

'http://rss.cnn.com/rss/edition_world.rss',
'http://rss.cnn.com/rss/edition_entertainment.rss',
'http://rss.cnn.com/rss/edition_technology.rss',

'http://feeds.reuters.com/Reuters/worldNews',
'http://feeds.reuters.com/reuters/entertainment',
'http://feeds.reuters.com/reuters/technologyNews',

'http://feeds.skynews.com/feeds/rss/world.xml',
'http://feeds.skynews.com/feeds/rss/technology.xml',
'http://feeds.skynews.com/feeds/rss/entertainment.xml',

'http://feeds.feedburner.com/ndtv/TqgX',
'http://feeds.feedburner.com/NDTV-Tech',
'http://feeds.feedburner.com/News-People',

'http://rss.nytimes.com/services/xml/rss/nyt/World.xml',
'http://feeds.nytimes.com/nyt/rss/Technology',
'http://www.nytimes.com/services/xml/rss/nyt/Music.xml'
);

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
		$sql = "INSERT INTO `headlines_int` (`headline`, `source`, `date`) VALUES ('$judul', '$current_feed_name', '$tanggal')";
		
		if ($mysqli->query($sql) === TRUE) {
			$json = array("status" => 1, "msg" => "Headline inserted!");
		}else{
			$json = array("status" => 0, "msg" => "Error inserting headline!");
		}
	}
	
	$j++;
}
$sql2 = "UPDATE `headlines_int` SET `source` = 'FOX' WHERE `source` LIKE '%FOX%'";
$mysqli->query($sql2);
$sql2 = "UPDATE `headlines_int` SET `source` = 'ABC' WHERE `source` LIKE '%ABC%'";
$mysqli->query($sql2);
$sql2 = "UPDATE `headlines_int` SET `source` = 'BBC' WHERE `source` LIKE '%BBC%'";
$mysqli->query($sql2);
$sql2 = "UPDATE `headlines_int` SET `source` = 'CNN' WHERE `source` LIKE '%CNN%'";
$mysqli->query($sql2);
$sql2 = "UPDATE `headlines_int` SET `source` = 'Reuters' WHERE `source` LIKE '%Reuters%'";
$mysqli->query($sql2);
$sql2 = "UPDATE `headlines_int` SET `source` = 'Sky' WHERE `source` LIKE '%Sky News%'";
$mysqli->query($sql2);
$sql2 = "UPDATE `headlines_int` SET `source` = 'NDTV' WHERE `source` LIKE '%NDTV%'";
$mysqli->query($sql2);
$sql2 = "UPDATE `headlines_int` SET `source` = 'NYTimes' WHERE `source` LIKE '%NYT%'";
$mysqli->query($sql2);

$mysqli->close();
//for debugging purpose
//header('Content-type: application/json');
//	echo json_encode($json);
?>