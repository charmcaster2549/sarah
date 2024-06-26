<?php

include("display.php");
$sql="select stud_id from login where id=$id";
$result=$conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $idparent = $row["stud_id"];
    }
} 

