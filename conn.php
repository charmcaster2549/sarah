<?php
$conn = new mysqli("localhost", "root", "", "mit");
if($conn->connect_error)
    die("connection failed: " .$conn->connect_error);

    