<html>
    <head>
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
       
    </head>
    <body>
    <?php

include "conn.php";
$s=$_GET['search'];
$sql="select * from student where fname like '%$s%'";
$result=$conn->query($sql);
?>

<?php
echo "<div id='acad' style = 'height: auto;
    display: inline-block; 
    margin-top: 10px; 
    // border: 1px solid skyblue;''>";
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc()){
        $id=$row['id'];
        $studid=$row['studidnum'];
        $fname=$row['fname'];
        $lname=$row['lname'];
        ?>
        <div data-student-id="<?php echo $id ?>"><?php echo $fname ." " .$lname; ?></div>
        
        <?php
    }
}
else{
    echo"no record";
}


?>

</select>
<script src="axios.js"></script>

    </body>
</html>

