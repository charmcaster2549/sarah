<?php

include "conn.php";
include "getparent.php";


$brgy=$_POST["brgy"];
$mun=$_POST["mun"];
$pro=$_POST["pro"];
$gadd=$_POST["gadd"];
$oadd=$_POST["oadd"];
$fname=$_POST["fname"];
$mname=$_POST["mname"];
$gname=$_POST["gname"];
$mob=$_POST["mob"];
$tel=$_POST["tel"];
$email=$_POST["email"];
$id=$idparent;





$sql="update student set barangay='$brgy', province='$pro', mun_city='$mun', gaddress='$gadd', oaddress='$oadd',  fathername='$fname', mothername='$mname', guardianame='$gname', con_num='$mob', tel='$tel', email='$email' where studidnum='$idparent'";
if($conn->query($sql)===true)
header("Location: studupdate2.php?id=$id");
else
    echo"error: " .$conn->error;

