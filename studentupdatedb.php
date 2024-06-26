<?php


include "conn.php";

$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$course = $_POST['course'];
$year = $_POST['year'];
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




$sql="update student set barangay='$brgy', province='$pro', gaddress='$gadd', oaddress='$oadd',  fathername='$fname', mothername='$mname', guardianame='$gname', con_num='$mob', tel='$tel', email='$email' where studidnum='$idparent'";
if($conn->query($sql)===true)
header("Location: studupdate.php?id=$id");
else
    echo"error: " .$conn->error;

