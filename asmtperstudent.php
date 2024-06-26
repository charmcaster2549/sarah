<html>
    <head><title>Assessment</title>
    <link rel="stylesheet" href="a.css">
    <script src="jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    
    <script>
    </script>
</head>
<body>
    
<div class="body">
<div class="asmt" >
<img src="pic/logo2.png" id="scc">
<img src="pic/sibonga.png" id="sib">
<p style="margin-top: 20">Republic of the Philippines</p>

<p>Municipality of Sibonga</p>
<h3 id="h3">Sibonga Community College</h3>
<p>Poblacion, Sibonga, Cebu
<p>sibonga.college.cebu@gmail.com</p>
<div style="width:90%;"><hr style="border: 1px solid black; margin-top: 8px"></div>
<h2 style="margin-top: 20">Student's Assessment</h2>

<p>Term:
<select name="term" id="term">
    <option value="0">--Select Exam--</option>
    <option value="1">Prelim</option>
    <option value="2">Midterm</option>
    <option value="3">Semi-final</option>
    <option value="4">Final</option>
</select>
</p>

<?php

include "conn.php";

$ay = $_GET['ay'];
$sid = $_GET['sid'];

$namedb = "SELECT *
FROM recinfo as a
join student as b
on a.sid=b.studidnum
WHERE sid='$sid' and ay='$ay'";
$resname = $conn->query($namedb);
if($resname->num_rows==1){
    while($row=$resname->fetch_assoc()){
        echo "<table id='namebox' ><td>Name: </td><td>" .$row['fname'] ." " .$row['lname'] ."</td></tr>";
        echo "<tr><td>Program:</td><td>" .$row['course'] ."</td></tr>";
        echo "<tr><td>Year:</td><td>" .$row['year'] ."</td></tr>";
        echo "<tr><td>Residence:</td><td>" .$row['residence'] ."</td></tr>";
    }
    echo "</table>";
}

?>

    <table id="sumtb" border="1">
        
            <th>TOSF</th>
            <th>Amount</th>
            <th>Pay to:</th>
        

            <tr>
                <td>Tuition</td><td><p id="tuition"></p></td><td>Municipal Treasury</td></tr>
            <tr>
                <td>SG Fee</td><td><p id="sgfee"></p></td><td>FASA Treasurer</td></tr>
            <tr>
                <td>Total</td><td  colspan=2></td>
            </tr>

            </table>

        
<div class="signature">
    <div class="access">
        <p style="margin-bottom: 21;">Accessed by:</p>
        <b>______________</b>
        <p>Admin Staff</p>
    </div>
    

    <div class="certified">
        <p>Certified true and correct:</p>
        
        <b style="font-size:12; margin-top: 27"><u>ATTY. EDWARD MAGLUCOT, PH.D.</u></b>
        <p>College Admin</p>
        <!-- <div style="width: 150; ">
        <hr> -->
        </div>
    </div>
    
</div>
<div>
    <button id="printButton">Print</button>
    <a href="home2.php"><button id="home">Home</button></a>
</div>
</div>

<script>
        $(document).ready(function() {
            $('#printButton').click(function() {
                $(this).hide();
                 // Hide the print button
                $('#home').hide();
                window.print();
            });

            // Event handler for after print
            window.onafterprint = function() {
                $('#printButton').show(); // Show the print button again
                $('#home').show();
            };
        });
    </script>
    <script>
        const sid = <?php echo json_encode($sid); ?>;
        const ay = <?php echo json_encode($ay); ?>;
        console.log("ay: ", ay);
        console.log("sid: ", sid);
        $('#term').on('change', async function(){
                console.log("sid: ", sid)
                const term = $('#term').val();
                console.log("term: ", term);
                const request = await axios.get(`asmtperstudentdb.php?sid=${sid}&ay=${ay}`);
                const recinfo = await request.data.rec_info;
                const studacc = await request.data.tuition1;
                console.log("recinfo: ",recinfo);
                console.log("stud acc: ",studacc);
                if(term==1){
                    var residence = studacc.residence;
                    var result = (recinfo.balance/4).toFixed(2);
                    
                    console.log("res: ", result)
                    console.log("residence: ",residence);
                    if(residence=="nonsibonganhon"){
                        
                        $('#tuition').html(`<p>${result}</p>`);
                    }
                    else{
                        $('#sgfee').html(`<p>${result}</p>`);
                    }
                    
                }
                else if(term==2){
                    var residence = studacc.residence;
                    var result = (recinfo.balance/3).toFixed(2);
                    
                    console.log("res: ", result)
                    console.log("residence: ",residence);
                    if(residence=="nonsibonganhon"){
                        
                        $('#tuition').html(`<p>${result}</p>`);
                    }
                    else{
                        $('#sgfee').html(`<p>${result}</p>`);
                    }
                }else if(term==3){
                    var residence = studacc.residence;
                    var result = (recinfo.balance/2).toFixed(2);
                    
                    console.log("res: ", result)
                    console.log("residence: ",residence);
                    if(residence=="nonsibonganhon"){
                        
                        $('#tuition').html(`<p>${result}</p>`);
                    }
                    else{
                        $('#sgfee').html(`<p>${result}</p>`);
                    }
                }else if(term==4){
                    var residence = studacc.residence;
                    var result = (recinfo.balance/1).toFixed(2);
                    
                    console.log("res: ", result)
                    console.log("residence: ",residence);
                    if(residence=="nonsibonganhon"){
                        
                        $('#tuition').html(`<p>${result}</p>`);
                    }
                    else{
                        $('#sgfee').html(`<p>${result}</p>`);
                    }
                }
                


            });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>