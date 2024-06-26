<?php

include "conn.php";

if($year==1 && ($ay%2)!=0)



if($year>1){
    $sql = "SELECT sum(amt) AS misctotal FROM fees WHERE year=0 AND AY=0";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $row = $result->fetch_assoc();
        $misctotal = $row['misctotal'];
    }
}
