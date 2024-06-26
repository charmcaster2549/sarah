
<?php

include "conn.php";
// $ay = $_COOKIE["acadyr"];


// $sid= $_GET["sid"];
//$ay= $_GET['ay'];

//echo "<br>siddd: " .$sid ."<br>";
//echo "ayyy: " .$ay;

$sid=1;
$ay=1;

$sql="select * from transrec where sid=$sid and ay=$ay";
$result=$conn->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        
        echo "<tr><td>" .$row['Ofrcpt'] ."</td>";
        echo "<td>" .$row['date'] ."</td>";
        echo "<td>" .$row['amt'] ."</td></tr>";
    }
}

//$getsoa = $conn->query($sql);
// $data = array();
// while ($rowsoa = $getsoa->fetch_assoc()) {
//     $data['trans_rec'][] = $rowsoa;
// }

// $recInfo = "SELECT * FROM recinfo WHERE sid=$sid and ay=$ay";
// $recInfo = $conn->query($recInfo);

// $data['rec_info'] = $recInfo->fetch_assoc();

//echo json_encode($data);




//START SA LOOP. GIILISAN NAKO SA GETSOA NGA FORMULA NI SONSON
