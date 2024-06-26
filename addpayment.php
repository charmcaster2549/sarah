<?php
//encode.php
include "conn.php";

$resibo=$_POST['res'];
$date=$_POST['date'];
$amt=$_POST['amt'];
$sid=$_POST['sid'];
$ay=$_POST['ay'];
$datecheck = DateTime::createFromFormat('Y-m-d', $date);
if($datecheck !== false && !array_sum($datecheck->getLastErrors())){

$sql="insert into transrec(Ofrcpt, amt, date, sid, ay) values('$resibo', '$amt', '$date', '$sid', '$ay')";
if($result=$conn->query($sql)===true){
   

    header("Location: encode.php");
}
else
echo"sayop: " .$conn->error;
}
else
{
header("Location: encode.php?error=wrong date format");

}