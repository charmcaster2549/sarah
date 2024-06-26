<?php

include "conn.php";

$id = $_POST['id'];
$year = $_POST['year'];
$units = $_POST['units'];
$residence = $_POST['residence'];
$ay = $_POST['sh_ay'];

$others = 0;


// echo "id: " .$id ."\nyear: " .$year ."\nunits: " .$units ."\nresidence: " .$residence ."\nay: " .$ay;


if($residence=='sibonganhon'){
    $units2 = 0;
    if($year==1 && ($ay%2)){
        $sql = "SELECT sum(amt) AS misctotal FROM fees";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            $misctotal = $row['misctotal'];
        }
        $others = $misctotal;
        
        include "studentaccountdb.php";
        include "studentrecinfo.php";

        if($result===true){
            header("Location: oldstudent.php?param=New record created successfully!");
        }
        else{
            header("Location: oldstudent.php?param=Record already exist sib 1 2nd sem!");
        }
        
    }
    else if($year==1 && ($ay%2)==0){
        $sql = "SELECT sum(amt) AS misctotal FROM fees WHERE ay=0";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            $misctotal = $row['misctotal'];
        }
        $others = $misctotal;

        include "studentaccountdb.php";
        include "studentrecinfo.php";

        if($result===true){
            header("Location: oldstudent.php?param=New record created successfully!");
        }
        else{
            header("Location: oldstudent.php?param=Record already exist sib 1!");
        }
    }
    else if($year>1){
        $sql = "SELECT sum(amt) AS misctotal FROM fees WHERE year=0 AND ay=0";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            $misctotal = $row['misctotal'];
        }
        $others = $misctotal;

        include "studentaccountdb.php";
        include "studentrecinfo.php";
        
        if($result===true){
            header("Location: oldstudent.php?param=New record created successfully!");
        }
        else{
            header("Location: oldstudent.php?param=Record already exist!");
        }
    }
    else{
        header("Location: oldstudent.php?param=Something is wrong. Kindly check your data!");
    }
}
else{
    
    $units2 = $units;
    if($year==1 && ($ay%2)){
        $sql = "SELECT sum(amt) AS misctotal FROM fees";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            $misctotal = $row['misctotal'];
        }
        $others = $misctotal;

        include "studentaccountdb.php";
        include "studentrecinfo.php";

        if($result===true){
            header("Location: oldstudent.php?param=New record created successfully!");
        }
        else{
            header("Location: oldstudent.php?param=Record already exist!");
        }
        
    }
    else if($year==1 && ($ay%2)==0){
        $sql = "SELECT sum(amt) AS misctotal FROM fees WHERE ay=0";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            $misctotal = $row['misctotal'];
        }
        $others = $misctotal;

        include "studentaccountdb.php";
        include "studentrecinfo.php";

        if($result===true){
            header("Location: oldstudent.php?param=param=New record created successfully!");
        }
        else{
            header("Location: oldstudent.php?param=Record already exist!");
        }
    }
    else if($year>1){
        $sql = "SELECT sum(amt) AS misctotal FROM fees WHERE year=0 AND ay=0";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            $misctotal = $row['misctotal'];
        }
        $others = $misctotal;


        include "studentaccountdb.php";
        include "studentrecinfo.php";

        if($result===true){
            header("Location: oldstudent.php?param=param=New record created successfully!");
        }
        else{
            header("Location: oldstudent.php?param=Record already exist!");
        }
    }
    else{
        header("Location: oldstudent.php?param=Something is wrong. Kindly check your data!");
    }
}




?>

