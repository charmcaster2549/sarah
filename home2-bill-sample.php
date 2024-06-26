<html>
    <head>
        <title>bill</title>
        <script src="jquery-3.7.1.min.js"></script>
        <style>
            #due{
                display: none;
            }
            #upcoming{
                display: none;
            }
        </style>
    </head>
    <body>
        <form action="" method="get" id="form">
        <input type="number" name="tuition" id="tuition" placeholder="tuition balance">
        <input type="number" name="month" id="month" placeholder="1 - prelim, 2 -midterm, etc">
        <input type="submit" name="submit" id="submit">
        </form>
        due fees: <p id="due"></p><br>
        upcoming fees: <p id="upcoming"></p><br>

        
<?php
$due=0;
if(isset($_GET['submit'])){
    $tuition = $_GET['tuition'];
    $month = $_GET['month'];
    echo "tuition: $tuition";
    echo "<br>month: " .$month;

    if($month==1){
        $due = $tuition/4;
        $upcoming = $tuition/3;
        
        
    }
}

?>

<script>
    var due = <?php echo json_encode($due); ?>;
    var upcoming = <?php echo json_encode($upcoming);?>;

    $(document).ready(function(){
        
        console.log('due: ', due);
        $('#due').show();
        $('#due').html(`<input type="text" value="${due}">`);
        $('#upcoming').show();
        $('#upcoming').html(`<input type="text" value="${upcoming}">`)
    })
        
</script>
    </body>
</html>

