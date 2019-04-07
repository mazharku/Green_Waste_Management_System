<?php
/*
 * SEARCH QUERY RESULT OR INITIAL RESULT
 */
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';

if (isset($_GET['dustbinid']) && !empty($_GET['dustbinid'])) {
	$dustbinid = $_GET['dustbinid'];

	$sql = "SELECT * FROM addbin INNER JOIN get_value ON addbin.dustbinid = get_value.dustbinid INNER JOIN get_location ON  get_value.dustbinid=get_location.dustbinid AND get_location.dustbinid LIKE '%$dustbinid%'";
	$resultSet = DB::getInstance()->select($sql);
	// $results = [];
	$string = '';

	if ($resultSet) {
		while ($row = $resultSet->fetch_object()) {
			// $results[] = $row;
			
			$height = 100 - (($row->value / $row->size) * 100);
			
			$string .= '<div class="col-md-2" style="height: 220px; width: 150px; border: 2px solid #000;margin:20px;border-radius: 70px 70px 7px 7px;padding: 0;">';
			$string .= '<div style="position:absolute;bottom:0;background: #0000CD;height: ' . $height . '%;width: 100%;border-radius: 65px 65px 6px 6px;"></div>';
			$string .= '<div style="position: relative;top:50%;left:50%; color: #599;transform: translate(-50%,-50%);">';
			$string .= '<a href="dustbindetails.php?id=' . $row->dustbinid . '" style="text-align: center;font-size: 20px;color: #000;">';
			$string .= '<p>' . $row->dustbinid . '</p>';
			$string .= '<p>' . round($height) . '%</p>';
			$string .= '</a>';	
			$string .= '</div>';
			$string .= '</div>';		
		}
	} else {
		$string .= '<h3 class="text-center">No Dustbin Found.</h3>';
	}
	echo $string;
	// echo json_encode($results);	
} else {
	$sql = "SELECT * FROM addbin INNER JOIN get_value ON addbin.dustbinid = get_value.dustbinid INNER JOIN get_location ON get_value.dustbinid = get_location.dustbinid";
	$resultSet = DB::getInstance()->select($sql);
	$results = [];
	$string = '';

	if ($resultSet) {
		while ($row = $resultSet->fetch_object()) {
			// $results[] = $row;
			
			$height = 100 - (($row->value / $row->size) * 100);
		
			$string .= '<div class="col-md-2" style="height: 220px; width: 150px; border: 2px solid #000;margin:20px;border-radius: 70px 70px 7px 7px;padding: 0;">';
			$string .= '<div style="position:absolute;bottom:0;background: #0000CD;height: ' . $height . '%;width: 100%;border-radius: 65px 65px 6px 6px;"></div>';
			$string .= '<div style="position: relative;top:50%;left:50%; color: #599;transform: translate(-50%,-50%);">';
			$string .= '<a href="dustbindetails.php?id=' . $row->dustbinid . '" style="text-align: center;font-size: 20px;color: #000;">';
			$string .= '<p>' . $row->dustbinid . '</p>';
			$string .= '<p>' . round($height) . '%</p>';
			$string .= '</a>';	
			$string .= '</div>';
			$string .= '</div>';		
		}
	} else {
		$string .= '<h3 class="text-center">No Dustbin Found.</h3>';
	}
	echo $string;
	//echo json_encode($results);	
}


