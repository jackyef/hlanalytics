<?php

include '/functions/get_headline_string.php';

function get_analysis_data($startDate = null, $endDate = null, $length = null, $limit = null){

//Title of Analysis
$doctitle = 'Indonesia News Headline Analysis';
//What analysis are we doing
// (int # of words to analyze per phrase) => (string label for that phrase)
$analysis = array(
	1=>"Single-Word Analysis",
	2=>"Two-Word Phrase Analysis",
	3=>"Three-Word Phrase Analysis",
	4=>"Four-Word Phrase Analysis",
	5=>"Five-Word Phrase Analysis",
	6=>"Six-Word Phrase Analysis"
	);
	
//determine which analysis to be done
if($length == null) $length = 1;
$i = 1;
while($i < 7){
	if($i != $length) unset($analysis[$i]);
	$i++;
}
	
//How many result per analysis
if($limit == null) $limit = 15;
//grab file contents
//$content = file_get_contents( 'input.txt' );
if($startDate == null & $endDate == null){
	$content = get_headline_string();
} else {
	//$startDate = date('Y-m-d', strtotime($startDate));
	//$endDate = date('Y-m-d', strtotime($endDate));
	$content = get_headline_string_between($startDate, $endDate);
}
//if the file doesn't exist, error out
if ( !$content )
	die( 'Input data error' );
//strip out bad charecters, just the words, ma'am
$content = preg_replace( "/(,|\"|\.|\?|:|!|;| - )/", " ", $content );
$content = preg_replace( "/\n/", " ", $content );
$content = preg_replace( "/\s\s+/", " ", $content );
//clean numbers if analysis_length = 1
if($length == 1){
	$content = preg_replace("/[^a-zA-Z]+/", " ", $content );
}  
//split content on words
$content = explode(" ",$content);
$words = Array();
/**
 * Parses text and builds array of phrase statistics
 *
 * @param string $input source text
 * @param int $num number of words in phrase to look for
 * @rerturn array array of phrases and counts
 */
	//init array
	$results = array();
	
	//loop through words
	foreach ($content as $key=>$word) {
		$phrase = '';
		
		//look for every n-word pattern and tally counts in array
		for ($i=0;$i<$length;$i++) {
			if ($i!=0) $phrase .= ' ';
			if($key+$i < sizeof($content)) $phrase .= strtolower( $content[$key+$i] );
		}
		if ( !isset( $results[$phrase] ) )
			$results[$phrase] = 1;
		else
			$results[$phrase]++;
	}
	if ($length == 1) {
		//clean boring words
		$irrelevant_words = array("", "rp", "anak", "indonesia", "ada", "tahun", "bulan", "hari", 
							"rumah", "dalam", "lebih", "foto", "baru", "soal", "tidak", "harus",
							"ingin", "mau", "saat", "dua", "masih", "bikin", "bakal", "belum", "cara",
							"hingga", "sampai", "minta",
							"akan", "bisa", "dapat", "di", "ke", "dari", "ini", "itu", "dan", "tak", "yang", "jadi", "untuk",
							"dengan", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		foreach ($irrelevant_words as $banned) unset($results[$banned]);
	}
	
	//sort, clean, return
	array_multisort($results, SORT_DESC);
	unset($results[""]);
	unset($results["0"]);
	unset($results["1"]);
	unset($results["&amp"]);
	
	$i=0;
	foreach ($results as $term => $count) {
		if ($count == 1) continue;
		if ($i >= $limit) break;
		
		$json['term'][$i] = $term;
		$json['count'][$i] = $count;
		$i++;
	}
	
	if(!isset($json)){
		$json['term'][0] = "No data for selected period of time";
		$json['count'][0] = 0;
	}
	if(isset($json)){
		if($json['term'][0] == ' ' || $json['term'][0] == '  ' || $json['term'][0] == '   ' || $json['term'][0] == '    '){
			$json['term'][0] = "No data for selected period of time";
			$json['count'][0] = 0;
		}
	}
	
	/* Output header */
	echo json_encode($json);
}

function get_analysis_data_int($startDate = null, $endDate = null, $length = null, $limit = null){

//Title of Analysis
$doctitle = 'International News Headline Analysis';
//What analysis are we doing
// (int # of words to analyze per phrase) => (string label for that phrase)
$analysis = array(
	1=>"Single-Word Analysis",
	2=>"Two-Word Phrase Analysis",
	3=>"Three-Word Phrase Analysis",
	4=>"Four-Word Phrase Analysis",
	5=>"Five-Word Phrase Analysis",
	6=>"Six-Word Phrase Analysis"
	);
	
//determine which analysis to be done
if($length == null) $length = 1;
$i = 1;
while($i < 7){
	if($i != $length) unset($analysis[$i]);
	$i++;
}
	
//How many result per analysis
if($limit == null) $limit = 15;
//grab file contents
//$content = file_get_contents( 'input.txt' );
if($startDate == null & $endDate == null){
	$content = get_headline_int_string();
} else {
	//$startDate = date('Y-m-d', strtotime($startDate));
	//$endDate = date('Y-m-d', strtotime($endDate));
	$content = get_headline_int_string_between($startDate, $endDate);
}
//if the file doesn't exist, error out
if ( !$content )
	die( 'Input data error' );
//strip out bad charecters, just the words, ma'am
$content = preg_replace( "/(,|\"|\.|\?|:|!|;| - )/", " ", $content );
$content = preg_replace( "/\n/", " ", $content );
$content = preg_replace( "/\s\s+/", " ", $content );
//clean numbers if analysis_length = 1
if($length == 1){
	$content = preg_replace("/[^a-zA-Z]+/", " ", $content );
}  
//split content on words
$content = explode(" ",$content);
$words = Array();
/**
 * Parses text and builds array of phrase statistics
 *
 * @param string $input source text
 * @param int $num number of words in phrase to look for
 * @rerturn array array of phrases and counts
 */
	//init array
	$results = array();
	
	//loop through words
	foreach ($content as $key=>$word) {
		$phrase = '';
		
		//look for every n-word pattern and tally counts in array
		for ($i=0;$i<$length;$i++) {
			if ($i!=0) $phrase .= ' ';
			if($key+$i < sizeof($content)) $phrase .= strtolower( $content[$key+$i] );
		}
		if ( !isset( $results[$phrase] ) )
			$results[$phrase] = 1;
		else
			$results[$phrase]++;
	}
	if ($length == 1) {
		//clean boring words ENGLISH
		$irrelevant_words = array("", "in", "to", "the", "under", "on", "at", "of", "for",
								"s", "as", "a", "an", "u", "watch", "after", "says", "and",
								"video", "photos", "n", "with", "new", "over", "from", "by",
								"is", "am", "are", "man",
								"0","1","2","3","4","5","6", "7", "8", "9");
		foreach ($irrelevant_words as $banned) unset($results[$banned]);
	} else if ($length == 2){
		//clean boring words ENGLISH
		$irrelevant_words = array("", "in the", "around the", "on the", "above the");
		foreach ($irrelevant_words as $banned) unset($results[$banned]);
	}
	
	//sort, clean, return
	array_multisort($results, SORT_DESC);
	unset($results[""]);
	unset($results["0"]);
	unset($results["1"]);
	unset($results["&amp"]);
	
	$i=0;
	foreach ($results as $term => $count) {
		if ($count == 1) continue;
		if ($i >= $limit) break;
		
		$json['term'][$i] = $term;
		$json['count'][$i] = $count;
		$i++;
	}
	
	if(!isset($json)){
		$json['term'][0] = "No data for selected period of time";
		$json['count'][0] = 0;
	}
	
	/* Output header */
	echo json_encode($json);
}

function get_trend_data($keyword = null, $startDate = null, $endDate = null){
	include('/connect.php');
	$sql = "SELECT COUNT(*) AS 'count', `date` FROM `headlines` WHERE `headline` LIKE '%$keyword%' AND `date` BETWEEN '$startDate' AND '$endDate' GROUP BY `date`";
	$myArray = array();
	$result = $mysqli->query($sql);
	if ($result) {
		$i = 0;
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
				$myArray[] = $row;
				$json['date'][$i] = $myArray[$i]['date'];
				$json['count'][$i] = $myArray[$i]['count'];
				$i++;
		}
	}
	if($result){
		$result->close();
	}
	if(!isset($json)){
		$json['date'][0] = "No data for this period of time";
		$json['count'][0] = 0;
	}
	$mysqli->close();
	/* Output header */
	echo json_encode($json);
}

function get_trend_data_int($keyword = null, $startDate = null, $endDate = null){
	include('/connect.php');
	$sql = "SELECT COUNT(*) AS 'count', `date` FROM `headlines_int` WHERE `headline` LIKE '%$keyword%' AND `date` BETWEEN '$startDate' AND '$endDate' GROUP BY `date`";
	$myArray = array();
	$result = $mysqli->query($sql);
	if ($result) {
		$i = 0;
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
				$myArray[] = $row;
				$json['date'][$i] = $myArray[$i]['date'];
				$json['count'][$i] = $myArray[$i]['count'];
				$i++;
		}
	}
	if($result){
		$result->close();
	}
	if(!isset($json)){
		$json['date'][0] = "No data for this period of time";
		$json['count'][0] = 0;
	}
	$mysqli->close();
	/* Output header */
	echo json_encode($json);
}

function get_apriori_frequent_items($keyword = null, $startDate = null, $endDate = null){
	include('/connect.php');
	
	$minsup = 0;
	$content = get_headline_string_containing($keyword, $startDate, $endDate);
	$length = 1;
	$limit = 100000;
	
	//strip out bad charecters, just the words, ma'am
	$content = preg_replace( "/(,|\"|\.|\?|:|!|;| - )/", " ", $content );
	$content = preg_replace( "/\n/", " ", $content );
	$content = preg_replace( "/\s\s+/", " ", $content );
	//split content on words
	$content = explode(" ",$content);
	$words = Array();
	//init array
	$results = array();
	
	//apriori 1st iteration
	//loop through words
	foreach ($content as $key=>$word) {
		$phrase = '';
		
		//look for every n-word pattern and tally counts in array
		for ($i=0;$i<$length;$i++) {
			if ($i!=0) $phrase .= ' ';
			if($key+$i < sizeof($content)) $phrase .= strtolower( $content[$key+$i] );
		}
		if ( !isset( $results[$phrase] ) )
			$results[$phrase] = 1;
		else
			$results[$phrase]++;
	}
	
	if ($length == 1) {
		//clean boring words
		$irrelevant_words = array("", "rp", "anak", "indonesia", "ada", "tahun", "bulan", "hari", 
							"rumah", "dalam", "lebih", "foto", "baru", "soal", "tidak", "harus",
							"ingin", "mau", "saat", "dua", "masih", "bikin", "bakal", "belum", "cara",
							"hingga", "sampai", "minta",
							"akan", "bisa", "dapat", "di", "ke", "dari", "ini", "itu", "dan", "tak", "yang", "jadi", "untuk",
							"dengan", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		foreach ($irrelevant_words as $banned) unset($results[$banned]);
	}
	
	
	//apriori 2nd iteration 
	$length = 2;
	foreach ($content as $key=>$word) {
		$phrase = '';
		
		//look for every n-word pattern and tally counts in array
		for ($i=0;$i<$length;$i++) {
			if ($i!=0) $phrase .= ' ';
			if($key+$i < sizeof($content)) $phrase .= strtolower( $content[$key+$i] );
		}
		if ( !isset( $results[$phrase] ) )
			$results[$phrase] = 1;
		else
			$results[$phrase]++;
	}
	//apriori 3rd iteration 
	$length = 3;
	foreach ($content as $key=>$word) {
		$phrase = '';
		
		//look for every n-word pattern and tally counts in array
		for ($i=0;$i<$length;$i++) {
			if ($i!=0) $phrase .= ' ';
			if($key+$i < sizeof($content)) $phrase .= strtolower( $content[$key+$i] );
		}
		if ( !isset( $results[$phrase] ) )
			$results[$phrase] = 1;
		else
			$results[$phrase]++;
	}
	
	//eliminate words with less occurences than minsup
	foreach($results as $term => $count){
		if($results[$term] < $minsup){
			unset($results[$term]);
		}
	}
	
	//eliminate word that contains keyword
	foreach($results as $term => $count){
		if(strpos($term, strtolower($keyword)) !== false){
			unset($results[$term]);
		}
	}

	//sort, clean, return
	array_multisort($results, SORT_DESC);
	unset($results[""]);
	unset($results["0"]);
	unset($results["1"]);
	unset($results["&amp"]);
	
	
	$i=0;
	foreach ($results as $term => $count) {
		if ($count == 1) continue;
		if ($i >= $limit) break;
		
		$json['term'][$i] = $term;
		$json['count'][$i] = $count;
		$i++;
	}
	
	if(!isset($json)){
		$json['term'][0] = "No data for selected period of time";
		$json['count'][0] = 0;	
	}
	if(isset($json)){
		if($json['term'][0] == ' ' || $json['term'][0] == '  ' || $json['term'][0] == '   ' || $json['term'][0] == '    '){
			$json['term'][0] = "No data for selected period of time";
			$json['count'][0] = 0;
			unset($json['term'][1]);
			unset($json['count'][1]);
		}
	}
	
	/* Output header */
	echo json_encode($json);
	
}

function get_apriori_frequent_items_int($keyword = null, $startDate = null, $endDate = null){
	include('/connect.php');
	
	$minsup = 0;
	$content = get_headline_string_int_containing($keyword, $startDate, $endDate);
	$length = 1;
	$limit = 100000;
	
	//strip out bad charecters, just the words, ma'am
	$content = preg_replace( "/(,|\"|\.|\?|:|!|;| - )/", " ", $content );
	$content = preg_replace( "/\n/", " ", $content );
	$content = preg_replace( "/\s\s+/", " ", $content );
	//split content on words
	$content = explode(" ",$content);
	$words = Array();
	//init array
	$results = array();
	
	//apriori 1st iteration
	//loop through words
	foreach ($content as $key=>$word) {
		$phrase = '';
		
		//look for every n-word pattern and tally counts in array
		for ($i=0;$i<$length;$i++) {
			if ($i!=0) $phrase .= ' ';
			if($key+$i < sizeof($content)) $phrase .= strtolower( $content[$key+$i] );
		}
		if ( !isset( $results[$phrase] ) )
			$results[$phrase] = 1;
		else
			$results[$phrase]++;
	}
	
	if ($length == 1) {
		//clean boring words ENGLISH
		$irrelevant_words = array("", "in", "to", "the", "under", "on", "at", "of", "for",
								"s", "as", "a", "an", "u", "watch", "after", "says", "and",
								"video", "photos", "n", "with", "new", "over", "from", "by",
								"is", "am", "are", "man",
								"0","1","2","3","4","5","6", "7", "8", "9");
		foreach ($irrelevant_words as $banned) unset($results[$banned]);
	}
	
	
	//apriori 2nd iteration 
	$length = 2;
	foreach ($content as $key=>$word) {
		$phrase = '';
		
		//look for every n-word pattern and tally counts in array
		for ($i=0;$i<$length;$i++) {
			if ($i!=0) $phrase .= ' ';
			if($key+$i < sizeof($content)) $phrase .= strtolower( $content[$key+$i] );
		}
		if ( !isset( $results[$phrase] ) )
			$results[$phrase] = 1;
		else
			$results[$phrase]++;
	}
	//apriori 3rd iteration 
	$length = 3;
	foreach ($content as $key=>$word) {
		$phrase = '';
		
		//look for every n-word pattern and tally counts in array
		for ($i=0;$i<$length;$i++) {
			if ($i!=0) $phrase .= ' ';
			if($key+$i < sizeof($content)) $phrase .= strtolower( $content[$key+$i] );
		}
		if ( !isset( $results[$phrase] ) )
			$results[$phrase] = 1;
		else
			$results[$phrase]++;
	}
	
	//eliminate words with less occurences than minsup
	foreach($results as $term => $count){
		if($results[$term] < $minsup){
			unset($results[$term]);
		}
	}
	
	//eliminate word that contains keyword
	foreach($results as $term => $count){
		if(strpos($term, strtolower($keyword)) !== false){
			unset($results[$term]);
		}
	}

	//sort, clean, return
	array_multisort($results, SORT_DESC);
	unset($results[""]);
	unset($results["0"]);
	unset($results["1"]);
	unset($results["&amp"]);
	
	
	$i=0;
	foreach ($results as $term => $count) {
		if ($count == 1) continue;
		if ($i >= $limit) break;
		
		$json['term'][$i] = $term;
		$json['count'][$i] = $count;
		$i++;
	}
	
	if(!isset($json)){
		$json['term'][0] = "No data for selected period of time";
		$json['count'][0] = 0;
	}
	if(isset($json)){
		if($json['term'][0] == ' ' || $json['term'][0] == '  ' || $json['term'][0] == '   ' || $json['term'][0] == '    '){
			$json['term'][0] = "No data for selected period of time";
			$json['count'][0] = 0;
			unset($json['term'][1]);
			unset($json['count'][1]);
		}
	}
	
	/* Output header */
	echo json_encode($json);
	
}

function get_apriori_association2($keyword = null, $startDate = null, $endDate = null){
	include '/connect.php';
	include '/functions/class.apriori.php';
	$Apriori = new Apriori();

	$Apriori->setMaxScan(20);       //Scan 2, 3, ...
	$Apriori->setMinSup(10);         //Minimum support 1, 2, 3, ...
	$Apriori->setMinConf(10);       //Minimum confidence - Percent 1, 2, ..., 100
	$Apriori->setDelimiter(' ');    //Delimiter 
	
	if($startDate == null) $startDate = date('Y-m-d', strtotime('-7 days'));
	if($endDate == null) $endDate = date('Y-m-d');
	$sql = "select `headline` from `headlines` WHERE `headline` LIKE '%$keyword%' AND `date` BETWEEN '$startDate' AND '$endDate' ORDER BY `date` DESC";
	$myArray = array();
	$result = $mysqli->query($sql);
	if ($result) {
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
				$myArray[] = $row;
		}
		$json = $myArray;
	}
	
	$filteredDataset = array();
	//strip out bad charecters, just the words, ma'am
	foreach($myArray as $index => $content){
		$filteredDataset[$index] = preg_replace( "/(,|\"|\.|\?|:|!|;| - )/", " ", $content['headline'] );
		$filteredDataset[$index] = preg_replace( "/\n/", " ", $content['headline'] );
		$filteredDataset[$index] = preg_replace( "/\s\s+/", " ", $content['headline'] );
	}
	
    $filteredDataset = array_map('strtolower', array_map('trim', $filteredDataset));
	foreach ($filteredDataset as $a){
		echo $a.'<br/>';
	}
	$dataset   = $filteredDataset;
	$Apriori->process($dataset);
	
	//Frequent Itemsets
	echo '<h1>Frequent Itemsets</h1>';
	$Apriori->printFreqItemsets();

	echo '<h3>Frequent Itemsets Array</h3>';
	print_r($Apriori->getFreqItemsets()); 

	//Association Rules
	echo '<h1>Association Rules</h1>';
	$Apriori->printAssociationRules();

	echo '<h3>Association Rules Array</h3>';
	print_r($Apriori->getAssociationRules()); 

	if($result){
		$result->close();
	}
	if(!isset($json)){
		$json['headline'][0] = "No data for this period of time";
		$json['source'][0] = "N/A";
		$json['date'][0] = "N/A";
	}
	
	$mysqli->close();
	
	
	//Save to file
	$Apriori->saveFreqItemsets('freqItemsets.txt');
	$Apriori->saveAssociationRules('associationRules.txt');
}
/**
 * Formats output
 *  
 * @param array $stats results from build_stats
 * @param string $name name of this test group
 *
 */
