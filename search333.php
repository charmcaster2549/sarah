<html>
    <head>
        <title>sample search</title>
    </head>
    <body>
        <form action="" method="GET">
            
        <input type="text" name="search" id="search" class="searchinput">
        <div class="result" id="result"></div>
        </form>
        <?php


        include "conn.php";

        if(isset($_GET['search'])){
            $s=$_GET['search'];
            $sql="select * from student where fname like '%$s%'";
            $result=$conn->query($sql);
        
            if($result->num_rows>0)
            {
                while($row=$result->fetch_assoc()){
                    $id=$row['id'];
                    $studid=$row['studidnum'];
                    $fname=$row['fname'];
                    $lname=$row['lname'];
                    ?>
                    <div id="<?php echo $id ?>">
                        <?php echo $fname ." " .$lname; ?>
                    </div>
                    
                    <?php
                }
            }
            else{
                echo"no record";
            }
                    }


        ?>

        </select>



        <script src="jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <!-- <script src="staff.js"></script> -->
                
    </body>
</html>