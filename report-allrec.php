
<html>
    <head>
        <title>Records</title>
        <link rel="stylesheet" href="report-allrec.css">
        <script src="jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    </head>
    <body>
        <?php
        $sid = $_GET['sid'];
        ?>
        <div class="body2">
        <div class="asmt2" >
        <img src="pic/logo2.png" id="scc2">
        <img src="pic/sibonga.png" id="sib2">
        <p style="margin-top: 20">Republic of the Philippines</p>

        <p>Municipality of Sibonga</p>
        <h3 id="h3">Sibonga Community College</h3>
        <p>Poblacion, Sibonga, Cebu
        <p>sibonga.college.cebu@gmail.com</p>
        <div style="width: 87%; margin-top: 11px"><hr></div>
        
        <h1 style="margin: 14 0">Records</h1>
        <div class="infobox">
                <div class="namebox" style="display:flex">
                    <p>Name: </p><p id="nameres"></p>
                </div>
            
        
            <select name="sh_ay" id="sh_ay" class="sh_ay" required>
                                           
            <option value="0">All Semesters</option>
                <?php
                
                
                
                include "conn.php";
                
                $sql= "select * from ay ORDER BY no DESC";
                $result=$conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        
                ?>
                <option value="<?php echo $row['no'] ?>"><?php echo $row['name'] ?></option>
                <?php
                }
            }
            ?>
            </select>
            </div>
            
            <table id="table" border="1">
                <thead id="thead">
                    <tr>
                        <th>Official Receipt</th>
                        <th>Date</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody id="transreclist"></tbody>
            </table>

    </div>

        <div>
            <button id="printButton">Print</button>
            <a href="home2.php"><button id="home">Home</button></a>
        </div>        
        
        </div>

        <script>
            // 

            $(window).on('load', async function(){
            const sid = <?php echo json_encode($sid); ?>;
            console.log("sid: ", sid);
            const ay = $('#sh_ay').val();
            console.log("ay: ", ay);
            
            const request = await axios.get(`report-allrecdb.php?sid=${sid}&ay=${ay}`);
            const response = await request.data.transrec;
            const response2 = await request.data.student;
            $('#nameres').html(` <h4>${response2.fname} ${response2.lname}</h4>`);

            if(ay==0){
                    $('thead').html(`<tr>
                        <th>Official Receipt</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Semester</th>
                    </tr>`)
                    $('#transreclist').empty();
                    response.forEach(trans => {
                            $('#transreclist').append(`
                            <tr>
                            <td>${trans.Ofrcpt}</td>
                            <td>${trans.date}</td>
                            <td>${trans.amt}</td>
                            <td>${trans.name}</td>
                            </tr>
                        `);
                        });
                }else{
                    $('thead').html(`<tr>
                        <th>Official Receipt</th>
                        <th>Date</th>
                        <th>Amount</th>
                    </tr>`)
                    $('#transreclist').empty();
                    response.forEach(trans => {
                            $('#transreclist').append(`
                            <tr>
                            <td>${trans.Ofrcpt}</td>
                            <td>${trans.date}</td>
                            <td>${trans.amt}</td>
                            </tr>
                        `);
                    });

                
                }
            });

            $('#sh_ay').on('change', async function(){
                const sid = <?php echo json_encode($sid); ?>;
                console.log("sid: ", sid);
                const ay = $('#sh_ay').val();
                console.log("ay: ", ay);

                const request = await axios.get(`report-allrecdb.php?sid=${sid}&ay=${ay}`);
                const response = await request.data.transrec;
                const response2 = await request.data.student;
                console.log("response", response);
                console.log("response2", response2);

                if(ay==0){
                    $('thead').html(`<tr>
                        <th>Official Receipt</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Semester</th>
                    </tr>`)
                    $('#transreclist').empty();
                    response.forEach(trans => {
                            $('#transreclist').append(`
                            <tr>
                            <td>${trans.Ofrcpt}</td>
                            <td>${trans.date}</td>
                            <td>${trans.amt}</td>
                            <td>${trans.name}</td>
                            </tr>
                        `);
                        });
                }else{
                    $('thead').html(`<tr>
                        <th>Official Receipt</th>
                        <th>Date</th>
                        <th>Amount</th>
                    </tr>`)
                    $('#transreclist').empty();
                    response.forEach(trans => {
                            $('#transreclist').append(`
                            <tr>
                            <td>${trans.Ofrcpt}</td>
                            <td>${trans.date}</td>
                            <td>${trans.amt}</td>
                            </tr>
                        `);
                    });

                
                }
                
            })

            
        </script>
        
<script>
        $(document).ready(function() {
            $('head').append('<link rel="stylesheet" href="print.css" type="text/css" media="print">');
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
    </body>
</html>

<?php



