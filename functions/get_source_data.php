<?php

include '/functions/get_source_string.php';

function get_source_data($startDate = null, $endDate = null, $limit = null){

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
$length = 1;
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
	$content = get_source_string();
} else {
	$content = get_source_string_between($startDate, $endDate);
}
//if the file doesn't exist, error out
if ( !$content )
	die( 'Input data error' );

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
			if($key+$i < sizeof($content)) $phrase .= ( $content[$key+$i] );
		}
		if ( !isset( $results[$phrase] ) )
			$results[$phrase] = 1;
		else
			$results[$phrase]++;
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

function get_source_data_int($startDate = null, $endDate = null, $limit = null){

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
$length = 1;
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
	$content = get_source_int_string();
} else {
	$content = get_source_int_string_between($startDate, $endDate);
}
//if the file doesn't exist, error out
if ( !$content )
	die( 'Input data error' );

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
			if($key+$i < sizeof($content)) $phrase .= ( $content[$key+$i] );
		}
		if ( !isset( $results[$phrase] ) )
			$results[$phrase] = 1;
		else
			$results[$phrase]++;
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
/**
 * Formats output
 *  
 * @param array $stats results from build_stats
 * @param string $name name of this test group
 *
 */
