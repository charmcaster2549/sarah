<?php

include "conn.php";

$no=0;
$sql = "SELECT * FROM fees where no>1";
$result = $conn->query($sql);
echo "<table class='viewtb'>";
echo "<thead><tr><th>NO.</th> <th>Description</th> <th>Amount</th></thead>";
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $no++;
        $desc = $row['description'];
        $amt = $row['amt'];
        echo "<tbody><tr><td>" .$no ."</td><td>" .$desc ."</td><td>" .$amt ."</td>" ."</tr></tbody>";
    }
}
?>
</table>