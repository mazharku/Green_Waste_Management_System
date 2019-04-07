<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';

$resultSet = DB::getInstance()->select("SELECT * FROM get_location");
$results = [];

if ($resultSet) {
	while ($row = $resultSet->fetch_assoc()) {
		$results[] = $row;
	}
}

echo json_encode($results);

?>