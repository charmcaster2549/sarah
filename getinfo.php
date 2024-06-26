<?php

include "conn.php";


$sql = "SELECT * FROM student as a join login as b on a.studidnum = b.stud_id where b.id=$id";
$result=$conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $studidnum=$row['studidnum'];
        $fname=$row['fname'];
        $mname=$row['mname'];
        $lname=$row['lname'];
        $baranggay=$row['barangay'];
        $mun_city=$row['mun_city'];
        $prov=$row['province'];
        $course=$row['course'];
        $year=$row['year'];
    }
}

 else {
    echo "No results found.";
}

$sqlid="select stud_id from login where id=$id";
$resultid=$conn->query($sqlid);


if ($resultid->num_rows > 0) {
    while ($row = $resultid->fetch_assoc()) {
        $idparent = $row["stud_id"];
    }
} 


