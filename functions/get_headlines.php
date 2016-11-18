<?php
	// Include connect.php
	
function get_headlines($startDate = null, $endDate = null){

	include('/connect.php');
	if($startDate == null) $startDate = date('Y-m-d', strtotime('-7 days'));
	if($endDate == null) $endDate = date('Y-m-d');
	$sql = "select * from `headlines` WHERE `date` BETWEEN '$startDate' AND '$endDate' ORDER BY `date` DESC";
	$myArray = array();
	$result = $mysqli->query($sql);
	if ($result) {
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
				$myArray[] = $row;
		}
		$json = $myArray;
		
	}
	
	$result->close();
	$mysqli->close();

	/* Output header */
	echo json_encode($json);

}

function get_headlines_int($startDate = null, $endDate = null){

	include('/connect.php');
	if($startDate == null) $startDate = date('Y-m-d', strtotime('-7 days'));
	if($endDate == null) $endDate = date('Y-m-d');
	$sql = "select * from `headlines_int` WHERE `date` BETWEEN '$startDate' AND '$endDate' ORDER BY `date` DESC";
	$myArray = array();
	$result = $mysqli->query($sql);
	if ($result) {
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
				$myArray[] = $row;
		}
		$json = $myArray;
		
	}
	
	$result->close();
	$mysqli->close();

	/* Output header */
	echo json_encode($json);

}

function get_headlines_containing($startDate = null, $endDate = null, $keyword = null){

	include('/connect.php');
	if($startDate == null) $startDate = date('Y-m-d', strtotime('-7 days'));
	if($endDate == null) $endDate = date('Y-m-d');
	$sql = "select * from `headlines` WHERE `headline` LIKE '%$keyword%' AND `date` BETWEEN '$startDate' AND '$endDate' ORDER BY `date` DESC";
	$myArray = array();
	$result = $mysqli->query($sql);
	if ($result) {
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
				$myArray[] = $row;
		}
		$json = $myArray;
		
	}
	if($result){
		$result->close();
	}
	if(!isset($json)){
		$json['headline'][0] = "No data for this period of time";
		$json['source'][0] = "N/A";
		$json['date'][0] = "N/A";
	}
	
	$mysqli->close();

	/* Output header */
	echo json_encode($json);

}

function get_headlines_int_containing($startDate = null, $endDate = null, $keyword = null){

	include('/connect.php');
	if($startDate == null) $startDate = date('Y-m-d', strtotime('-7 days'));
	if($endDate == null) $endDate = date('Y-m-d');
	$sql = "select * from `headlines_int` WHERE `headline` LIKE '%$keyword%' AND `date` BETWEEN '$startDate' AND '$endDate' ORDER BY `date` DESC";
	$myArray = array();
	$result = $mysqli->query($sql);
	if ($result) {
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
				$myArray[] = $row;
		}
		$json = $myArray;
		
	}
	if($result){
		$result->close();
	}
	if(!isset($json)){
		$json['headline'][0] = "No data for this period of time";
		$json['source'][0] = "N/A";
		$json['date'][0] = "N/A";
	}
	
	$mysqli->close();

	/* Output header */
	echo json_encode($json);

}
?>