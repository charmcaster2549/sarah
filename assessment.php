<?php

include("getinfo.php");


$sql="select * from recinfo where sid=$idparent";
$result=$conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $balance = $row["balance"];
    }
} 



echo "Outstanding balance: PHP " .$balance;
