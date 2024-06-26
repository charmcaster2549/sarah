<?php

include "conn.php";
//resibo
$studidnum = $_GET['studidnum'];
$ay = $_GET['ay'];

$studentIdNumber = $studidnum;

// $transrec = "SELECT * FROM transrec WHERE sid = $studentIdNumber ORDER BY no DESC";
$transrec = "SELECT * FROM transrec WHERE sid = $studentIdNumber and ay=$ay ORDER BY no DESC ";
$transrecResult = $conn->query($transrec);
$data = [];
while ($row = $transrecResult->fetch_assoc()) {
    $data['trans_rec'][] = $row;
}

//total tuition


$recInfo = "SELECT * FROM recinfo WHERE sid=$studentIdNumber and ay=$ay";
$recInfo = $conn->query($recInfo);
$data['rec_info'] = $recInfo->fetch_assoc();


//tuiion ug sg fund breakdown

$breakdown = "SELECT * FROM studaccount WHERE sid=$studentIdNumber and ay=$ay";
$breakdown = $conn->query($breakdown);
$data['break_down'] = $breakdown->fetch_assoc();



echo json_encode($data);



