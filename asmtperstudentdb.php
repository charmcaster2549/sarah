<?php
include "conn.php";
$sid = $_GET['sid'];
$ay = $_GET['ay'];
$sql = "SELECT * FROM recinfo where sid='$sid' and ay='$ay'";
$result=$conn->query($sql);
$data['rec_info'] = $result->fetch_assoc();


$tuition = "SELECT * FROM  studaccount WHERE sid='$sid' and ay='$ay'";
$unitres=$conn->query($tuition);
$data['tuition1'] = $unitres->fetch_assoc();
    

echo json_encode($data);