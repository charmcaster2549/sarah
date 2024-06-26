<?php

include "conn.php";
$ay=$_GET['sh_ay'];

$type=$_GET['type'];

//sibonganhon total studyante
$sql = "SELECT COUNT(DISTINCT sid) as count FROM studaccount WHERE residence='sibonganhon' and ay=$ay";
$result=$conn->query($sql);
$data['count'] = $result->fetch_assoc();

//total sa nakabayad ug full

$full = "SELECT COUNT(*) AS sid_count
FROM (
    SELECT sid, SUM(amt) AS total_amt
    FROM transrec
    WHERE ay = $ay
    GROUP BY sid
    HAVING total_amt = 1300
  ) AS subquery
  
  JOIN studaccount AS b ON subquery.sid = b.sid
  WHERE b.residence = 'sibonganhon';";
$fullres = $conn->query($full);
$data['sid_count'] = $fullres->fetch_assoc();

//total amount collected

$total = "SELECT sum(amt) as total
FROM transrec as a 
JOIN student as b 
ON a.sid=b.studidnum
WHERE ay=$ay and residence='sibonganhon' and type=2";
$totalres = $conn->query($total);
$data['total'] = $totalres->fetch_assoc();

//NON SIBONGANHON list
$non = "SELECT COUNT(DISTINCT sid) as non FROM studaccount WHERE residence!='sibonganhon' and ay=$ay";
$resnon=$conn->query($non);
$data['non'] = $resnon->fetch_assoc();


//NON SIBONGANHON total sa nakabayad ug full
$fullnon = "SELECT COUNT(*) AS sid_countnon
FROM (
    SELECT sid, SUM(amt) AS total_amt
    FROM transrec
    WHERE ay = $ay and type=2
    GROUP BY sid
    HAVING total_amt = 1300
  ) AS subquery
  
  JOIN student AS b ON subquery.sid = b.studidnum
  WHERE b.residence != 'sibonganhon'";
$fullresnon = $conn->query($fullnon);
$data['sid_countnon'] = $fullresnon->fetch_assoc();




//NON SIBONGANHON total amount collected

$totalnon = "SELECT sum(amt) as totalnon
FROM transrec as a 
JOIN student as b 
ON a.sid=b.studidnum
WHERE ay=$ay and type=2 and residence!='sibonganhon'";
$totalresnon = $conn->query($totalnon);
$data['totalnon'] = $totalresnon->fetch_assoc();

//NONSIBONGANHON TUITION


$totaltuition = "SELECT sum(amt) as tuition
FROM transrec as a 
JOIN student as b 
ON a.sid=b.studidnum
WHERE ay=$ay and type=$type and residence!='sibonganhon'";
$totalresnon = $conn->query($totaltuition);
$data['tuition'] = $totalresnon->fetch_assoc();





echo json_encode($data);
