<?php

include "conn.php";

$request = $_GET['req'];
$reason = $_GET['res'];
$ay = $_GET['ay'];
$sid = $_GET['sid'];
$date = date("Y-m-d");

$sql = "INSERT INTO request(description, reason, datesubmit, sid, ay) VALUES('$request', '$reason', '$date', '$sid', '$ay')";
$result = $conn->query($sql);

if ($result) {
    echo json_encode(array('success' => true));
  } else {
    echo json_encode(array('success' => false));
  }
