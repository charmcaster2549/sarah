<?php
include "conn.php";
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$name = $_POST['name'];
$utype = $_POST['utype'];

echo $uname ." " .$pwd ." " .$name ." " .$utype;

$sql = "INSERT INTO login(username, password, name, usertype, img) VALUES('$uname', '$pwd', '$name', '$utype', 'pic/1.png')";
$result = $conn->query($sql);
if($result===true){
    header("Location: addnewuser.php?param=New record inserted successfully!");
    // echo '<script>';
    // echo 'alert("New record inserted successfully!");';
    // echo 'window.location.href = "addnewuser.php";';
    // echo '</script>';
}
else{
    echo"Error: " .$conn->error;
}