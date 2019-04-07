<?php

$server = "localhost";
$user = "csekua5_wms";
$pass = "uioewro%$#237894";
$db = "csekua5_wms";

$con = mysqli_connect($server,$user,$pass, $db);

if($con){
	echo "";
}
else{
	echo "Connection failed";
}

$query = "SELECT dustbinid, lattitude, longitude, value FROM get_location NATURAL JOIN get_value";

$result = mysqli_query($con, $query);

$response = array();

while($row = mysqli_fetch_array($result)){
	array_push($response, array('id' => $row[0], 'lat' => $row[1], 'lon' => $row[2], 'ratio' => $row[3]));
}

echo json_encode(array('locations' => $response));



?>