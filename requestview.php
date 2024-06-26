<?php

include "conn.php";
$sid = $_GET['sid'];
$sqlview = "SELECT a.datesubmit, a.approvedate, a.datevalidated, b.name
FROM request as a 
join reqlist as b
on b.no=a.description
where a.sid='$sid' order by a.no desc";
$result2 = $conn->query($sqlview);
$data = [];
while ($row = $result2->fetch_assoc()) {
    $data['view'][] = $row;
}


echo json_encode($data);