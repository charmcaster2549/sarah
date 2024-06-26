<?php

include "conn.php";


$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$receipt = $data['receipt'];
$petsa = $data['petsa'];
$amt = $data['amt'];
$ay = $data['ay'];
$sid = $data['sid'];
$type = $data['type'];
$no = $data['no'];
$paymentHistoryId = $data['paymentHistoryId'];

$amtsel=0;
$tap=0;
$bal=0;

$select = "SELECT * FROM transrec WHERE no = '$no'";
$selres = $conn->query($select);
if($selres->num_rows>0){
    while($row=$selres->fetch_assoc()){
        $amtsel = $row['amt'];
    }
}
else{
    echo"sayop select: " .$conn->error;
}

$selectrec = "SELECT * FROM recinfo WHERE sid='$sid'";
    $resrec = $conn->query($selectrec);
    if($resrec->num_rows>0){
        while($row=$resrec->fetch_assoc()){
            $tap = $row['totalAmtPaid'];
            $bal = $row['balance'];
        }
    }

$query = "UPDATE transrec SET amt = '$amt', date = '$petsa', Ofrcpt = '$receipt' WHERE no = '$no'";
$result = $conn->query($query);


if ($result===true && $amt!=$amtsel) {
    
    $recupdate = "UPDATE recinfo SET balance= $bal + $amtsel - $amt, totalAmtPaid= $tap - $amtsel + $amt where sid='$sid' and ay='$ay'";
    $resupdate = $conn->query($recupdate);
    if($resupdate===true){
    echo "updated!";
    }
    else{
        echo"sayop rec info: " .$conn->error;
    }
}
else
{
    echo"updated ";
}




