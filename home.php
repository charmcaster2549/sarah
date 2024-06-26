<?php

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    $id=$_SESSION['id'];
    
$data=$_SESSION['name'];
$capitalize=ucwords($data);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, inital-scale=1.0">
        <title>HOME</title>
        <link rel="stylesheet" href="homestyle.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">


        <script src="https://kit.fontawesome.com/ffc46dca65.js" crossorigin="anonymous"></script>
</head>
<body>
    

<div class="home">
    
    <nav>
        <img src="pic/logo2.png" class="logo">
        
            <ul>
            <h1>Sibonga Community College </h1>
            <div class="time">
            <p><?php date_default_timezone_set('Asia/Manila');
            
            $current_time = date('H'); 
            if($current_time>=5 && $current_time<12)
               echo"Good morning!";
            elseif($current_time>=12 && $current_time<18)
               echo"Good afternoon!";
            else
               echo"Good evening!";
            ?></div>
            </ul><?php
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

                    <a href="studupdate.php" class="sub-menu-link">
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
<div class="header">
    <div class="side-nav">
        <ul class="nav-links">
            <li><a href="#"><i class="fa-solid fa-house-user"></i><p>Dashboard</p></a></li>
            <li><a href="billing2.php"><i class="fa-solid fa-money-check-dollar"></i><p>Assessment/Billing</p></a></li>
            <li><a href="#"><i class="fa-solid fa-file-lines"></i><p>Reports</p></a></li>
            <li><a href="#"><i class="fa-solid fa-person-circle-question"></i><p>Requests</p></a></li>
            <li><a href="#"><i class="fa-solid fa-address-book"></i><p>Contact</p></a></li>
            
            <div class="active"></div>
        </ul>
    </div>
    <div class="container">
        <div class="profile"><img src="pic/1.png" class="pic-profile"><p class="studprof">Student Profile</p><br>
        <p class="nameprof">
            <?php 
            include"profilebox.php"; ?>
            <br>
            
        </p>
            <div class="editprofbox"><a href="studupdate.php" class="editprof">Update Profile Information</a></div>
        </div>

        <div class="assessment"><img src="pic/2.png" class="pic-profile2"><p class="assess">Assessment/ Billing</p>
        <p class="ambot">
            <?php
            include "assessment.php";
            ?>
        </p>
        
        <div class="viewbillbox"><a href="billing2.php" class="viewbill">View</a></div>
        </div>
        <div class="reports"><img src="pic/3.png" class="pic-profile3"><p class="rep">Reports</p></div>
</div>
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

