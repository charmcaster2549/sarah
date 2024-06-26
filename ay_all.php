<html>
    <head>
        <title></title>
        
    </head>
    <body>
    <select name="all" id="all" class="all">
                                        
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