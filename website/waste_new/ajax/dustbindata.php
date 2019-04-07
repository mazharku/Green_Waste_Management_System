<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';

$dustbin_id = $_GET['id'];

$sql = "SELECT * FROM addbin INNER JOIN get_value ON addbin.dustbinid = get_value.dustbinid INNER JOIN get_location ON get_value.dustbinid = get_location.dustbinid AND get_value.dustbinid = $dustbin_id";
$resultSet = DB::getInstance()->select($sql);
$results = [];

if ($resultSet) {
	while ($row = $resultSet->fetch_assoc()) {
		$results[] = $row;	
	}
}

echo json_encode($results);