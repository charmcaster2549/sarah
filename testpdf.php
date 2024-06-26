<?php
require 'vendor/autoload.php';
include"conn.php";
// require_once 'vendor/dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

$sql = "SELECT * FROM recinfo as a join student as b on a.sid = b.studidnum where a.no=1";
$result=$conn->query($sql);

$html = '
    <table>
        <thead>
            <th>Student Id Number</th>
            <th>Total Amount Paid</th>
            <th>Balance</th>
        </thead>
    <tbody>
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

