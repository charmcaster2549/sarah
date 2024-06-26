<?php
require 'vendor/autoload.php';
include"conn.php";
// require_once 'vendor/dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

$sql = "SELECT * FROM recinfo as a join student as b on a.sid = b.studidnum where a.no=1";
$result=$conn->query($sql);

$html = '
<div class="asmt" style="background: #44daff; 
display: flex;
flex-direction: column;
width: 400;
align-items: center;
position: relative;
border: solid;
padding-bottom: 20;">

<img src="pic/logo2.png" id="scc" style="width: 50;
position: absolute;
left: 23;
top: 48;">
<img src="pic/sibonga.png" id="sib" style="width: 50;
position: absolute;
right: 23;
top: 48;">

<p style="margin-top: 20">Republic of the Philippines</p>

<p>Municipality of Sibonga</p>
<h3 id="h3" style="font-family: old english text mt">Sibonga Community College</h3>
<p>Poblacion, Sibonga, Cebu
<p>sibonga.college.cebu@gmail.com</p>
<div style="width:90%;"><hr style="border: 1px solid black; margin-top: 8px"></div>
<h2 style="margin-top: 20">Students Assessment</h2>
<p>Term:<select name="term" id="term">
    <option value="1">Prelim</option>
    <option value="2">Midterm</option>
    <option value="3">Semi-final</option>
    <option value="4">Final</option>
</select></p>

';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= '
            <tr>
                <td>'.$row["sid"].'</td>
                <td>'.$row["totalAmtPaid"].'</td>
                <td>'.$row["balance"].'</td>
            </tr>
        ';

    }

    
}



$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

