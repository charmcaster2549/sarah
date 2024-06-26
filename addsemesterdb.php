<?php

include "conn.php";

$name = $_GET ['name'];
$sql = "INSERT INTO ay(name) values('$name')";
$result=$conn->query($sql);
if($result===true){
    header("Location: staff_home.php?param=Academic year created successfully!");
}
?>