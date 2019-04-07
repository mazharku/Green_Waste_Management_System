<?php
/*
 * SEARCH SUGGESTION
 */
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';

$query = $_POST['query'];

$str = '';
$results = DB::getInstance()->select("SELECT * FROM get_location WHERE dustbinid LIKE '%$query%'");

if ($results) {
	$str .= '<ul>';

	while ($row = $results->fetch_object()) {
		$str .= '<li>' . $row->dustbinid . '</li>';
	}

	$str .= '</ul>';
} else {
	$str = 'No result found';
}

echo $str;