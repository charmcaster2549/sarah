<?php


include "conn.php";

$id = $_POST['id'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$course = $_POST['course'];
$year = $_POST['year'];
$brgy = $_POST['brgy'];
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
$res = $_POST['residence'];




$sql="update student set fname='$fname', mname='$mname', lname='$lname', course='$course', year='$year', barangay='$brgy', mun_city='$mun', province='$pro', gaddress='$gadd', oaddress='$oadd',  fathername='$father', mothername='$mother', guardianame='$gname', con_num='$cnum', tel='$tel', email='$email' where studidnum='$id'";
if($conn->query($sql)===true){
    header("Location: studentupdate.php?param=Record updates successsfully!");
}
// 
else
    echo"error: " .$conn->error;

