<html>
    <head>
        <title></title>
        <script src="jquery.js"></script>
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
    <select name="sh_ay" id="sh_ay" class="sh_ay">
                                        
        <option value="0">--Select Academic Year--</option>
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
    </body>
</html>