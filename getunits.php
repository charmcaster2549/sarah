<?php

include "conn.php";


$academicId = $_GET["academic_id"];
$idd= $_GET["current_user_id"] ;

$sqlunit="select * from studaccount where id=$idd and ay=$academiId";
$resultay=$conn->query($sqlid);


if ($resultay->num_rows > 0) {
    while ($row = $resultay->fetch_assoc()) {
        $units = $row["units"];
    }
} 