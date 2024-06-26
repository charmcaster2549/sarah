<?php

include "conn.php";

$no=0;
$sql = "SELECT * FROM login where usertype!='student'";
$result = $conn->query($sql);
echo "<table class='viewtb'>";
echo "<thead><tr><th>NO.</th> <th>NAME</th> <th>USERNAME</th> <th>USERTYPE</th></tr></thead>";
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $no++;
        $uname = $row['username'];
        $name = $row['name'];
        $utype = $row['usertype'];
        echo "<tbody class='tbody'><tr><td>" .$no ."</td><td>" .$name ."</td><td>" .$uname ."</td><td>" .$utype ."</td></tr></tbody>";
    }
}