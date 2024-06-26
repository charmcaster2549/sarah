
<!-- <html>
    <head>
        <title></title>
        <script>
        $(document).ready(function() {

            $('#myForm').submit(function(e) {
                e.preventDefault(); // Prevent form submission

                var selectedOption = $('#sh_ay').val();
                if (selectedOption < 1) {
                    alert("Please select a valid Academic Year");
                } else {
                    // Perform form submission
                    this.submit();
                }
            });
        });
    </script>
    </head>
    <body>
    <select name="sh_ay" id="sh_ay" class="sh_ay" required> -->
                                        
        
            <?php
            include "conn.php";

            $iday=$_GET['student_id'];
            $sql= "SELECT ay.no, ay.name 
            FROM studaccount as stud 
            JOIN ay 
            ON stud.ay = ay.no 
            where sid=$iday ORDER BY no DESC";
            $result=$conn->query($sql);
            $d=[];
            while ($row = $result->fetch_assoc()){
                $d['ayname'][] = $roway;
            }
            
            echo json_encode($d);
                    