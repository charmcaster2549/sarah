<?php

include "conn.php";

$sql = "UPDATE recinfo set totalAmtPaid = (SELECT totalAmtPaid + $amt) WHERE sid = '$sid' and ay = '$ay'";
$result = $conn->query($sql);
