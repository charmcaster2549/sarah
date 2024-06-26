<?php

include "conn.php";

$studentId = $_GET['student_id'];

$student = "SELECT * FROM student WHERE id = {$studentId}";
$studentResult = $conn->query($student);
$data = $studentResult->fetch_assoc();


echo json_encode($data);