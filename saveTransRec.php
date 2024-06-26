<?php

include "conn.php";


$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);


$receipt = $data['receipt'];
$petsa = $data['petsa'];
$amt = $data['amt'];
$ay = (int) $data['ay'];
$sid = $data['sid'];
$type = (int) $data['type'];

$check = "SELECT * FROM studaccount WHERE sid=$sid and ay=$ay";
$checkres = $conn->query($check);

if($checkres->num_rows===1){
    $row = $checkres->fetch_assoc();
    $res = $row['residence'];
    if($res=='sibonganhon' && $type==2){


        $insertRecord = "INSERT INTO transrec (sid, Ofrcpt, amt, date, ay, type) VALUES ({$sid}, '{$receipt}', {$amt}, '{$petsa}', {$ay}, {$type})";
        if ($conn->query($insertRecord) === TRUE) {
            
            $sql = "UPDATE recinfo set totalAmtPaid = (SELECT totalAmtPaid + $amt), balance = (SELECT balance - $amt) WHERE sid = '$sid' and ay = '$ay'";
        $result = $conn->query($sql);
        echo "New record created successfully";
        } 
        else {
            echo "Error <br>" . $conn->error;
        }
    }
    else if($res!='sibonganhon' && $type==1)
    {
        $insertRecord = "INSERT INTO transrec (sid, Ofrcpt, amt, date, ay, type) VALUES ({$sid}, '{$receipt}', {$amt}, '{$petsa}', {$ay}, {$type})";
        if ($conn->query($insertRecord) === TRUE) {
            
            $sql = "UPDATE recinfo set totalAmtPaid = (SELECT totalAmtPaid + $amt), balance = (SELECT balance - $amt) WHERE sid = '$sid' and ay = '$ay'";
            $result = $conn->query($sql);
            echo "New record created successfully";
        }
    }
    else if($res!='sibonganhon' && $type==2){
        $insertRecord = "INSERT INTO transrec (sid, Ofrcpt, amt, date, ay, type) VALUES ({$sid}, '{$receipt}', {$amt}, '{$petsa}', {$ay}, {$type})";
        if ($conn->query($insertRecord) === TRUE) {
            
            $sql = "UPDATE recinfo set totalAmtPaid = (SELECT totalAmtPaid + $amt), balance = (SELECT balance - $amt) WHERE sid = '$sid' and ay = '$ay'";
            $result = $conn->query($sql);
            echo "New record created successfully";
        }
    }
    else if($res!='sibonganhon' && $type==3){
        $insertRecord = "INSERT INTO transrec (sid, Ofrcpt, amt, date, ay, type) VALUES ({$sid}, '{$receipt}', {$amt}, '{$petsa}', {$ay}, {$type})";
        if ($conn->query($insertRecord) === TRUE) {
            
            $sql = "UPDATE recinfo set totalAmtPaid = (SELECT totalAmtPaid + $amt), balance = (SELECT balance - $amt) WHERE sid = '$sid' and ay = '$ay'";
            $result = $conn->query($sql);
            echo "New record created successfully";
        }
    }
    else if($res='sibonganhon' && $type==3){
        $insertRecord = "INSERT INTO transrec (sid, Ofrcpt, amt, date, ay, type) VALUES ({$sid}, '{$receipt}', {$amt}, '{$petsa}', {$ay}, {$type})";
        if ($conn->query($insertRecord) === TRUE) {
            
            $sql = "UPDATE recinfo set totalAmtPaid = (SELECT totalAmtPaid + $amt), balance = (SELECT balance - $amt) WHERE sid = '$sid' and ay = '$ay'";
            $result = $conn->query($sql);
            echo "New record created successfully";
        }
    }
    else
    echo"Wrong type of payment!";


}

else
echo"Not enrolled!";
