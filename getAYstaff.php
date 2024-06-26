<html>
    <head><title>aystaff</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    
    <script src="jquery.js"></script>
    <script src="jquery.cookie.js"></script>
    
    </head>
    <body>
        
    <?php

    include "conn.php";

    $sql= "select * from ay";
    $result=$conn->query($sql);
    ?>

    <select name="" id="aystaff">
    <option value='option1'>--Select Academic Year--</option>

    <?php

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


