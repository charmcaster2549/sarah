<?php
include("display.php");


if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    $id=$_SESSION['id'];
    
$data=$_SESSION['name'];
$capitalize=ucwords($data);
?>

<html>
    <head><title>SFB</title>
    <link rel="stylesheet" href="breakdown.css">
</head>
    <body>
        <div class="container">
            <div class="header">
                <div class="logo-scc">
                   
                    <img src="pic/logo2.png" class="logo">
                    <h1 class="scc">Sibonga Community College</h1>
                </div>
                <div class="time-pic">
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
                </div>
                
            </div>
            <div class="bot">
                <div class="sidenav"></div>
                <div class="right"></div>
            </div>

        </div>



    </body>
</html>

<?php

}


?>

