<?php
        
    include "conn.php";

    $sid = $_GET['sid'];
    $ay = $_GET['ay'];


    



    if($ay==0){
        $sql = "SELECT * FROM transrec as a join ay as b on a.ay=b.no where a.sid=$sid";
        $getsoa = $conn->query($sql);
        $data = [];
        while ($rowsoa = $getsoa->fetch_assoc()) {
            $data['transrec'][] = $rowsoa;
        }

        $name = "SELECT * FROM student AS a
        JOIN transrec as b
        on a.studidnum=b.sid
        JOIN ay as c
        on c.no=b.ay
        WHERE b.sid=$sid";

        $nameresult = $conn->query($name);
        $data['student'] = $nameresult->fetch_assoc();


        
        echo json_encode($data);
    }

    else{
        $sql = "SELECT * FROM transrec as a join ay as b on a.ay=b.no where a.ay=$ay and a.sid=$sid";
        $getsoa = $conn->query($sql);
        $data = [];
        while ($rowsoa = $getsoa->fetch_assoc()) {
            $data['transrec'][] = $rowsoa;
        }

        $name = "SELECT * FROM student AS a
        JOIN transrec as b
        on a.studidnum=b.sid
        JOIN ay as c
        on c.no=b.ay
        WHERE b.ay=$ay and b.sid=$sid";

        $nameresult = $conn->query($name);
        $data['student'] = $nameresult->fetch_assoc();


        
        echo json_encode($data);
    }


    
