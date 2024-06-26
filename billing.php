<?php
include("display.php");


if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    $id=$_SESSION['id'];
    
$data=$_SESSION['name'];
$capitalize=ucwords($data);
?>


<!DOCTYPE html>
<html>
    <head>
        <title>assessment</title>
        <link rel="stylesheet" href="billingstyle.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/ffc46dca65.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Open+Sans&display=swap" rel="stylesheet">
        <script src="jquery.js"></script>
        <script src="billing.js"></script>
    </head>
    <body>
    
    <div class="home">
        <nav>
            <img src="pic/logo2.png" class="logo">
        
            <ul>
            <h1 class="scc">Sibonga Community College</h1>
                <div class="time">
                    <p><?php date_default_timezone_set('Asia/Manila');
                    $current_time = date('H'); 
                    if($current_time>=5 && $current_time<12)
                    echo"Good morning!";
                    elseif($current_time>=12 && $current_time<18)
                    echo"Good afternoon!";
                    else
                    echo"Good evening!";
                    ?></p>
                </div>
            </ul>
            
            <?php
            include"pic.php"; ?>
            <img src="<?php echo $img; ?>" class="user-pic" onclick="toggleMEnu()"> 
            
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="<?php echo $img; ?>">
                        <h3><div class="sarah"><?php  echo $capitalize;  ?></div<br>
                        <div class="user"><?php echo $_SESSION['usertype']; ?></div></h3>
                    </div>
                    <hr>

                    <a href="#" class="sub-menu-link">
                        <img src="pic/profile.png">
                        <p>Edit profile</p>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="pic/setting.png">
                        <p>Settings & Privacy</p>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="pic/help.png">
                        <p>Help & Support</p>
                        <span>></span>
                    </a>
                    <a href="logout.php" class="sub-menu-link">
                        <img src="pic/logout.png">
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
        
<div class="bot">
    <div class="header">
        <div class="side-nav">
            <ul class="nav-links">
                <li><a href="home.php"><i class="fa-solid fa-house-user"></i><p>Dashboard</p></a></li>
                <li><a href="#"><i class="fa-solid fa-money-check-dollar"></i><p>Assessment/Billing</p></a></li>
                <li><a href="#"><i class="fa-solid fa-file-lines"></i><p>Reports</p></a></li>
                <li><a href="#"><i class="fa-solid fa-person-circle-question"></i><p>Requests</p></a></li>
                <li><a href="#"><i class="fa-solid fa-address-book"></i><p>Contact</p></a></li>
                <div class="activee"></div>
            </ul>
        </div>
        <div class="right">
            <div class="receipt">
            
                <h1 style="text-align: center;font-size: 45px; margin-top: 21px">Statement of Account</h1>
                <hr>
                <?php include'getay.php'; ?>
            </div>  
            
            <div class="botright">
                <?php
                
                include 'conn.php';
                include 'getinfo.php';

                ?>
                <div class='namewrapper'>
                    <div class='namebill'>
                        <div class='h3name'>
                            <h3 class='h3'><?php echo ucwords($fname) ." ".ucwords($mname) ." " .ucwords($lname); ?></h3>
                        </div>
                        <p style='font-size: 13px'>STUDENT NAME</p>
                    </div><br>
                    <div class="idunit">
                        <div class='idnumstud'><h3><?php echo $studidnum; ?></h3> 
                            <P style='font-size: 13px'>STUDENT NO</P>
                        </div>
                        <div class='units'><h3 id='tunit'></h3>
                            <P style='font-size: 13px'>Total Units</P>
                        </div>
                    </div>
                    
                </div>
                
                <div class="table">
                    <div class="bayad">
                        <table id="transrec" class="lamesa" border="1">
                            <thead>
                                <tr>
                                    <th>Official Receipt</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody id="transreclist" style="font-size: 20px"></tbody>
                        </table>
                    </div>
                    <div class="total" id="total"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="buttons-div">

        

            <button id="button" class="button">School Fees Breakdown</a></button>

            <div id="popup" class="popup">
                <div class="button-content" style="border-radius: 20px; padding: 22px 0px 67px 64px; background: #CAFAFE;">
                    
                    <h2>SCHOOL FEES BREAKDOWN</h2>
                    <br>
                    <table style="text-align: left">
                        <thead>
                        <tr>
                            
                            <th style="width: 270px">Description</th>
                            <th style="padding: 15px 0px; width: 150px">Amount</th>
                        </tr>
                        </thead>
                            <tbody id="popupbody" style="font-size: 20px"></tbody>
                    </table>
                </div>
            </div>




            <button id="prelim" class="button2">Assessment</a></button>

            <div id="popup-prelim" class="popup">
                <div class="button-content" style="border-radius: 20px; padding: 28px 0px 67px 45px; background: #CAFAFE;">
                    
                    <h2>PAYMENT DISTRIBUTION SYSTEM</h2>
                    <br>
                    <div><h3 id="posthere"></h3></div>

                </div>
            </div>
    </div> -->



    

</div>

<script>
    let subMenu=document.getElementById("subMenu")

    function toggleMEnu()
    {
        subMenu.classList.toggle("open-menu");
    }

</script> 

    
    </body>
</html>

<?php
}else{
    header("Location: index.php");
            exit();
}



?>