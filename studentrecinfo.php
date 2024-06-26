<?php
include "conn.php";

$recinfocheck = "SELECT * FROM recinfo WHERE sid = '$id' AND ay= '$ay'";
$result = $conn->query($recinfocheck);

if($result->num_rows>0){
    $row = $result->fetch_assoc();
    if($row['sid']===$id && $row['ay']===$ay){
        $result = false;
    }
}
else{

$recinfo = "INSERT INTO recinfo(sid, totaltuition, balance, totalAmtPaid, ay) VALUES('$id', ($units2*90)+$others, ($units2*90)+$others, 0, $ay) ";
$result = $conn->query($recinfo);
if($result!=true)
echo "sayop: " .$conn->error;


}





