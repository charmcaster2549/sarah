<?php

include "conn.php";


$studidnum = $_GET['student_id'];

//para sa ay choices
$sql= "SELECT ay.no, ay.name FROM studaccount as stud JOIN ay as ay ON stud.ay = ay.no where sid=$studidnum ORDER BY stud.no DESC";
$result=$conn->query($sql);

$data = [];
while ($roway = $result->fetch_assoc()){
    $data['ayname'][] = $roway;
}
echo json_encode($data);