<?php

  /* 
   * Receive Data From Hardware
   * Send Data To Server
   */

  require_once "config/config.php";
  
  // $longitude = $_GET['longitude'];
  // $lattitude = $_GET['lattitude'];
  // $value = $_GET['value'];
  // $temperature = $_GET['temperature'];
  // $binid = $_GET['binid'];
  
  // $sql  = "UPDATE get_location AS g JOIN get_value AS v ON (g.dustbinid = v.dustbinid) ";
  // $sql .= "SET g.longitude = '$longitude', ";
  // $sql .= "g.lattitude = '$lattitude', ";
  // $sql .= "v.value = '$value', ";
  // $sql .= "v.temperature='$temperature' ";
  // $sql .= "WHERE g.dustbinid = '$binid';";

  // $result = DB::getInstance()->update($sql);
  // echo ($result ? 'true' : 'false');


  $longitude = $_GET['longitude'];
  $lattitude = $_GET['lattitude'];
  $value = $_GET['value'];
  $temperature = $_GET['temperature'];
  $binid = $_GET['binid'];

  $select_sql = "SELECT * FROM get_value WHERE dustbinid=$binid";
  $select_result = DB::getInstance()->select($select_sql)->fetch_object();

  if ($select_result->value != $value) {
    $size_sql = "SELECT * FROM addbin WHERE dustbinid=$binid";
    $size_result = DB::getInstance()->select($size_sql)->fetch_object();

    $size = $size_result->size;

    if (floor($value) > ($size - 2)) {
      $empty_date_insert_sql = "INSERT INTO statistics(dustbinid, empty_date) VALUES ('$binid', NOW())";
      $empty_date_insert_result = DB::getInstance()->insert($empty_date_insert_sql);
      echo ($empty_date_insert_result ? 'true' : 'false');
      echo '<br>';
    }

    if (floor($value) < 2) {
      $full_date_insert_sql = "INSERT INTO statistics(dustbinid, full_date) VALUES ('$binid', NOW())";
      $full_date_insert_result = DB::getInstance()->insert($full_date_insert_sql);
      echo ($full_date_insert_result ? 'true' : 'false');
      echo '<br>';
    }
  }
  
  $sql  = "UPDATE get_location AS g JOIN get_value AS v ON (g.dustbinid = v.dustbinid) ";
  $sql .= "SET g.longitude = '$longitude', ";
  $sql .= "g.lattitude = '$lattitude', ";
  $sql .= "v.value = '$value', ";
  $sql .= "v.temperature='$temperature' ";
  $sql .= "WHERE g.dustbinid = '$binid';";

  $result = DB::getInstance()->update($sql);
  echo ($result ? 'true' : 'false');
  echo '<br>';
?>