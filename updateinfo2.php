<?php

include "conn.php";

$file_name = $_FILES['file']['name'];
$file_tmp = $_FILES['file']['tmp_name'];
$folder = "pic/";
$target_path = $folder.$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], $target_path);

$unameEP=$_POST['uname'];
$pwd=$_POST['pwd'];
$nameEP=$_POST['name'];
$emailEP=$_POST['email'];
$idstaff=$_POST['hide'];

if($file_name==null){
    $updateEP = "UPDATE login SET username='$unameEP', password='$pwd', name='$nameEP', email='$emailEP' where id='$idstaff'";
    $resultEP = $conn->query($updateEP);
        if($resultEP===true)
            header("Location: staff.php?param=success");
        else
            header("Location: staff.php?param=Error");
    

}
else{


$updateEP = "UPDATE login SET username='$unameEP', password='$pwd', name='$nameEP', email='$emailEP', img='pic/$file_name' where id='$idstaff'";
$resultEP = $conn->query($updateEP);
        if($resultEP===true)
            header("Location: staff.php?param=success");
        else
            header("Location: staff.php?param=Error");
    
}