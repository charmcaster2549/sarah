<?php

include "conn.php";
$id = $_POST['id'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$course = $_POST['course'];
$year = $_POST['year'];
$units = $_POST['units'];
$residence = $_POST['residence'];
$ay = $_POST['sh_ay'];
$brgy = $_POST['barangay'];
$mun = $_POST['mun'];
$pro = $_POST['pro'];
$gadd = $_POST['gadd'];
$oadd = $_POST['oadd'];
$father = $_POST['father'];
$mother = $_POST['mother'];
$gname = $_POST['gname'];
$cnum = $_POST['cnum'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$others = 0;




include "studentlogin.php";
include "studentdb.php";


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
            header("Location: addstudent.php?param=New record created successfully!");
        }
        else{
            header("Location: addstudent.php?param=Record already exist!");
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
            header("Location: addstudent.php?param=New record created successfully!");
        }
        else{
            header("Location: addstudent.php?param=Record already exist!");
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
            header("Location: addstudent.php?param=New record created successfully!");
        }
        else{
            header("Location: addstudent.php?param=Record already exist!");
        }
    }
    else{
        header("Location: addstudent.php?param=Something is wrong. Kindly check your data!");
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
            header("Location: addstudent.php?param=New record created successfully!");
        }
        else{
            header("Location: addstudent.php?param=Record already exist!");
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
            header("Location: addstudent.php?param=param=New record created successfully!");
        }
        else{
            header("Location: addstudent.php?param=Record already exist!");
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
            header("Location: addstudent.php?param=param=New record created successfully!");
        }
        else{
            header("Location: addstudent.php?param=Record already exist!");
        }
    }
    else{
        header("Location: addstudent.php?param=Something is wrong. Kindly check your data!");
    }
}




?>

