<?php

include "conn.php";


$sqlcheck = "SELECT * FROM studaccount WHERE sid = '$id' AND ay= '$ay'";
$result = $conn->query($sqlcheck);

if($result->num_rows>0){
    $row = $result->fetch_assoc();
    if($row['sid']===$id && $row['ay']===$ay){
        $result = false;
    }
}
else{

    $sql = "INSERT INTO studaccount(sid, units, totaltuition, ay, others, total, residence, tuition) VALUES('$id', '$units', ($units*90), $ay, $others, ($units2 * 90 + $others), '$residence', $units2 * 90)";
    $result = $conn->query($sql);


    if($year==1 && ($ay%2)!=0){

        $sql2 = "SELECT * FROM fees WHERE (ay=0 or ay=1) and no>1";
        $resfees = $conn->query($sql2);
        if($resfees->num_rows>0){
            while($rowfees=$resfees->fetch_assoc()){
                $mid = $rowfees['no'];
                $amt = $rowfees['amt2'];
                $sql3 = "INSERT INTO misc(mid, sid, amt, ay) VALUES('$mid', '$id','$amt', $ay)";
                $result=$conn->query($sql3);
                if($result===true)
                echo"success";
            else
            echo"error " .$conn->error;
            }
        }
        else
        echo"error";
        
    }
    else if($year==1 && ($ay%2)==0){
        $sql2 = "SELECT * FROM fees WHERE (ay=0) and no>1";
        $resfees = $conn->query($sql2);
        if($resfees->num_rows>0){
            while($rowfees=$resfees->fetch_assoc()){
                $mid = $rowfees['no'];
                $amt = $rowfees['amt2'];
                $sql3 = "INSERT INTO misc(mid, sid, amt, ay) VALUES('$mid', '$id','$amt', $ay)";
                $result=$conn->query($sql3);
                if($result===true)
                echo"success";

                else
                echo"error " .$conn->error;
            }
        }
        else
        echo"error";
    }
    else if($year>1){
        $sql2 = "SELECT * FROM fees WHERE ay=0 and year=0 and no>1";
        $resfees = $conn->query($sql2);
        if($resfees->num_rows>0){
            while($rowfees=$resfees->fetch_assoc()){
                $mid = $rowfees['no'];
                $amt = $rowfees['amt2'];
                $sql3 = "INSERT INTO misc(mid, sid, amt, ay) VALUES('$mid', '$id','$amt', $ay)";
                $result=$conn->query($sql3);
                if($result===true)
                echo"success";
            
                else
                echo"error " .$conn->error;
            }
        }
        else
        echo"error";
    }
    //$sql2 = "INSERT INTO misc(mid, sid, studname) VALUES('
    //pag loop arun ma balik balik ug sulod sa table ang misc sa matag studyante
}