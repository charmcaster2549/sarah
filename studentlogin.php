<?php

include "conn.php";



$studcheck = "SELECT * FROM login WHERE stud_id='$id'";
$result = $conn->query($studcheck);

if($result->num_rows>0){
    $row = $result->fetch_assoc();
    if($row['stud_id']===$id){
        $result = false;
    }
}
else{

    $studlogin = "INSERT INTO login(stud_id, username, password, name, usertype, img) VALUES('$id', '$lname', CONCAT('$fname','123'), CONCAT('$fname', ' ', '$lname'), 'student', 'pic/1.png')";
    $result = $conn->query($studlogin);
    if($result!=true)
    echo "sayop: ";
    
}

