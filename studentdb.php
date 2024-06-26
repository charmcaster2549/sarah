<?php
include "conn.php";


$studdbcheck = "SELECT * FROM student WHERE studidnum = '$id'";
$result = $conn->query($studdbcheck);

if($result->num_rows>0){
    $row = $result->fetch_assoc();
    if($row['studidnum']===$id){
        $result = false;
    }
}
else{

    $stud = "INSERT INTO student(studidnum, fname, mname, lname, barangay, residence, mun_city, province, course, year, gaddress, oaddress, fathername, mothername, guardianame, con_num, tel, email, img) VALUES('$id', '$fname', '$mname', '$lname', '$brgy', '$residence', '$mun', '$pro', '$course', '$year', '$gadd', '$oadd', '$father', '$mother', '$gname', '$cnum', '$tel', '$email', 'pic/1.png')";
    $result = $conn->query($stud);
    if($result!=true)
    echo "sayop: ";


}
