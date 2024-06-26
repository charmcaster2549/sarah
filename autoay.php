<html>
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
    <select name="sh_ay" id="sh_ay" class="sh_ay" required>
                                        
        
            <?php
            include "conn.php";

            include "getinfo.php";
            $iday=$idparent;
            $sql= "select ay.no, ay.name 
            from studaccount as stud 
            JOIN ay 
            ON stud.ay = ay.no 
            where sid=$iday ORDER BY no DESC";
            // $sql= "select * from ay ORDER BY no DESC";
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
    </body>
</html>