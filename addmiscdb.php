<?php

include "conn.php";
$title = $_GET['title'];
$amt = $_GET['amt'];
$year = $_GET['miscyear'];
$ay = $_GET['miscay'];

$sql = "INSERT INTO fees(description, amt, year, ay) values('$title', '$amt', '$year', '$ay')";
$result = $conn->query($sql);
if($result===true){
    header("Location: viewmisc.php?param=Miscellaneous created successfully!");
}
else
echo"sayop: " .$conn->error;