<html>
    <head><title>acad</title>
    <link rel="stylesheet" href="acad.css">
    <link rel="stylesheet" href="getstyle.css">
</head>
<body>
   

<?php

include"conn.php";
include "getinfo.php";
$iday=$idparent;
$yr=$year;

$sql= "select ay.no, ay.name from studaccount as stud JOIN ay ON stud.ay = ay.no where sid=$iday ORDER BY no DESC";
$result=$conn->query($sql);

?>

<input type="hidden" id=currentUserId value="<?php echo $iday; ?>">
<input type="hidden" id=year value="<?php echo $yr; ?>">
<select id='acad' style = "height: 30px;
    display: inline-block; 
    margin-top: 10px; 
    border: 1px solid skyblue;">
        
    
<?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        
        ?>

        <option value="<?php echo $row['no'] ?>"><?php echo $row['name'] ?></option>
      
<?php
        
        
    }
    
}
else
echo"error: " .$conn->error;


?>
</select>
</form>

<script src="jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="getAY.js"></script>
</body>
</html>