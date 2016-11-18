<?php
function get_headline_string(){	
	include('/connect.php');
	$today = date('Y-m-d');
	$yesterday = date('Y-m-d', strtotime('-1 days'));
	$last_week = date('Y-m-d', strtotime('-7 days'));
	$sql = "select `headline` from `headlines` WHERE date BETWEEN '$last_week' AND '$today' ORDER BY date DESC";
	$myArray = array();
	$headlineArray = array();
	$headlineString = "";
	$i = 0;
	if ($result = $mysqli->query($sql)) {
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
				$myArray[] = $row;
				$headlineArray[$i] = $myArray[$i]['headline'];
				$headlineString = $headlineString . ' ' . $headlineArray[$i];
				$i++;
		}
		//$json = array("status" => 1, "aspiration" => $myArray);
		
	}
	
	$result->close();
	$mysqli->close();
	if($headlineString == ""){
		$headlineString = " ";
	}
	return $headlineString;
}

function get_headline_string_between($startDate, $endDate){	
	include('/connect.php');
	$sql = "select `headline` from `headlines` WHERE date BETWEEN '$startDate' AND '$endDate' ORDER BY date DESC";
	$myArray = array();
	$headlineArray = array();
	$headlineString = "";
	$i = 0;
	if ($result = $mysqli->query($sql)) {
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
				$myArray[] = $row;
				$headlineArray[$i] = $myArray[$i]['headline'];
				$headlineString = $headlineString . ' ' . $headlineArray[$i];
				$i++;
		}
		//$json = array("status" => 1, "aspiration" => $myArray);
		
	}
	
	$result->close();
	$mysqli->close();
	if($headlineString == ""){
		$headlineString = " ";
	}
	return $headlineString;
}

function get_headline_int_string(){	
	include('/connect.php');
	$today = date('Y-m-d');
	$yesterday = date('Y-m-d', strtotime('-1 days'));
	$last_week = date('Y-m-d', strtotime('-7 days'));
	$sql = "select `headline` from `headlines_int` WHERE date BETWEEN '$last_week' AND '$today' ORDER BY date DESC";
	$myArray = array();
	$headlineArray = array();
	$headlineString = "";
	$i = 0;
	if ($result = $mysqli->query($sql)) {
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
				$myArray[] = $row;
				$headlineArray[$i] = $myArray[$i]['headline'];
				$headlineString = $headlineString . ' ' . $headlineArray[$i];
				$i++;
		}
		//$json = array("status" => 1, "aspiration" => $myArray);
		
	}
	
	$result->close();
	$mysqli->close();
	if($headlineString == ""){
		$headlineString = " ";
	}
	return $headlineString;
}

function get_headline_int_string_between($startDate, $endDate){	
	include('/connect.php');
	$sql = "select `headline` from `headlines_int` WHERE date BETWEEN '$startDate' AND '$endDate' ORDER BY date DESC";
	$myArray = array();
	$headlineArray = array();
	$headlineString = "";
	$i = 0;
	if ($result = $mysqli->query($sql)) {
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
				$myArray[] = $row;
				$headlineArray[$i] = $myArray[$i]['headline'];
				$headlineString = $headlineString . ' ' . $headlineArray[$i];
				$i++;
		}
		//$json = array("status" => 1, "aspiration" => $myArray);
		
	}
	
	$result->close();
	$mysqli->close();
	if($headlineString == ""){
		$headlineString = " ";
	}
	return $headlineString;
}

function get_headline_string_containing($keyword, $startDate, $endDate){	
	include('/connect.php');
	$sql = "select `headline` from `headlines` WHERE `headline` LIKE '%$keyword%' AND date BETWEEN '$startDate' AND '$endDate' ORDER BY date DESC";
	$myArray = array();
	$headlineArray = array();
	$headlineString = "";
	$i = 0;
	if ($result = $mysqli->query($sql)) {
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
				$myArray[] = $row;
				$headlineArray[$i] = $myArray[$i]['headline'];
				$headlineString = $headlineString . ' ' . $headlineArray[$i];
				$i++;
		}
		//$json = array("status" => 1, "aspiration" => $myArray);
		
	}
	
	$result->close();
	$mysqli->close();
	if($headlineString == ""){
		$headlineString = " ";
	}
	return $headlineString;
}

function get_headline_string_int_containing($keyword, $startDate, $endDate){	
	include('/connect.php');
	$sql = "select `headline` from `headlines_int` WHERE `headline` LIKE '%$keyword%' AND date BETWEEN '$startDate' AND '$endDate' ORDER BY date DESC";
	$myArray = array();
	$headlineArray = array();
	$headlineString = "";
	$i = 0;
	if ($result = $mysqli->query($sql)) {
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
				$myArray[] = $row;
				$headlineArray[$i] = $myArray[$i]['headline'];
				$headlineString = $headlineString . ' ' . $headlineArray[$i];
				$i++;
		}
		//$json = array("status" => 1, "aspiration" => $myArray);
		
	}
	
	$result->close();
	$mysqli->close();
	if($headlineString == ""){
		$headlineString = " ";
	}
	return $headlineString;
}

?>