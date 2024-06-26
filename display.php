<?php

include"conn.php";

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    $id=$_SESSION['id'];




$sql = "SELECT * FROM student a join login b on a.studidnum = b.stud_id where b.id=$id";
$result=$conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $fname=$row['fname'];
        $mname=$row['mname'];
        $lname=$row['lname'];
        $course=$row['course'];
        $year=$row['year'];

        $brgy=$row["barangay"];
        $mun=$row["mun_city"];
        $pro=$row["province"];
        $gadd=$row["gaddress"];
        $oadd=$row["oaddress"];

        $fatname=$row["fathername"];
        $motname=$row["mothername"];
        $gname=$row["guardianame"];

        $mob=$row["con_num"];
        $tel=$row["tel"];
        $email=$row["email"];


        $cfname=ucwords($fname);
        $cmname=ucwords($mname);
        $clname=ucwords($lname);

        $cbar=ucwords($brgy);
        $cmun=ucwords($mun);
        $cpro=ucwords($pro);
        $cgadd=ucwords($gadd);
        $coadd=ucwords($oadd);

        $cfname=ucwords($fname);
        $cmname=ucwords($mname);
        $cgname=ucwords($gname);

        
        $cmob=ucwords($mob);
        $ctel=ucwords($tel);
        $cemail=ucwords($email);
        
       
        
        
    }
} 
}
?>