<?php

include"conn.php";

$idstaff = $_GET['idstaff'];

$selectEP = "select * from login where id='$idstaff'";
$resEP = $conn->query($selectEP);
$rowEP = $resEP->fetch_assoc();


echo json_encode($rowEP);
