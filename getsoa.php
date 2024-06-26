<?php

include "conn.php";

$academicId = $_GET["academic_id"];
$id = $_GET["current_user_id"];
$yr = $_GET["stud_year"];

//display sa record sa bayad
$ay = "SELECT * FROM transrec as a join ay as b on a.ay=b.no where a.ay=$academicId and a.sid=$id";
$getsoa = $conn->query($ay);
$data = [];
while ($rowsoa = $getsoa->fetch_assoc()) {
    $data['trans_rec'][] = $rowsoa;
}

//breakdown sa tuition
$breakdownQuery = "SELECT * FROM fees";
$getbreakdown = $conn->query($breakdownQuery);

if($yr<=1){
    if($academicId==1){
        if ($getbreakdown) {
            $data['break_down'] = [];
            while ($rowb = $getbreakdown->fetch_assoc()) {
                $data['break_down'][] = $rowb;
            }
        } else {
            // Handle query error
            $data['break_down'] = null;
        }
    }
    else{
        $rowb1 = $getbreakdown->fetch_assoc();
        $rowb2 = $getbreakdown->fetch_assoc();
        $rowb3 = $getbreakdown->fetch_assoc();
        $data['break_down'][] = $rowb1;
        $data['break_down'][] = $rowb2;
        $data['break_down'][] = $rowb3;
    }
}
else{
    if($getbreakdown){
        $rowb1 = $getbreakdown->fetch_assoc();
        $rowb2 = $getbreakdown->fetch_assoc();
        $data['break_down'][] = $rowb1;
        $data['break_down'][] = $rowb2;
    } else {
        // Handle query error
        $data['break_down'] = null;
    }

}

//display sa balance, amt paid ug total
$recInfo = "SELECT * FROM recinfo WHERE ay=$academicId and sid=$id";
$recInfo = $conn->query($recInfo);
$data['rec_info'] = $recInfo->fetch_assoc();



//display sa unit
$unit = "SELECT * FROM  studaccount WHERE ay=$academicId and sid=$id";
$unitres=$conn->query($unit);
$data['unit'] = $unitres->fetch_assoc();


//display list students sa misc

$misc = "SELECT * from fees as a join misc as b on a.no=b.mid where b.ay=$academicId and b.sid=$id";
$getmisc = $conn->query($misc);
while($rowmisc = $getmisc->fetch_assoc()){
    $data['misce'][] = $rowmisc;
}





echo json_encode($data);

