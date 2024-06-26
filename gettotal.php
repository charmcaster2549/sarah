<?php


$academicId = $_GET["academic_id"];
$id= $_GET["current_user_id"] ;
$recinfo = "SELECT * FROM recinfo as a join ay as b on a.ay=b.no where a.ay=$academicId and a.SID=$id";
$gettotal = $conn->query($recinfo);
// $row = $result->fetch_array();

$data2 = [];
while ($rowtotal = $gettotal->fetch_assoc()) {
    $data2[] = $rowtotal;
}



