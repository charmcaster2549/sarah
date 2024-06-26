<?php

include "conn.php";

$sid = $_GET['studid'];
$ay = $_GET['ay'];

$due = "SELECT * FROM recinfo where sid='$sid' and ay='$ay'";
$resdue = $conn->query($due);
$data['due'] = $resdue->fetch_assoc();

$out = "SELECT sum(balance) as total from recinfo where sid='$sid'";
$resout = $conn->query($out);
$data['total'] = $resout->fetch_assoc();


$transrec = "SELECT * FROM transrec WHERE sid = $sid and ay=$ay ORDER BY no DESC";
$transrecResult = $conn->query($transrec);
$data['trans_rec'] = $transrecResult->fetch_assoc();

$ayname = "SELECT * FROM ay WHERE no = $ay";
$ayres = $conn->query($ayname);
$data['ayname'] = $ayres->fetch_assoc();


echo json_encode($data);

