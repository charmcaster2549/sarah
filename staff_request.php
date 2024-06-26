<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    $id=$_SESSION['id'];
    
$data=$_SESSION['name'];
$capitalize=ucwords($data);
?>


<html>
    <head>
        <title>Record</title>
        <link rel="stylesheet" href="staff.css">
        <script src="https://kit.fontawesome.com/ffc46dca65.js" crossorigin="anonymous"></script>
        <script>
            var idvalue = <?php echo json_encode($id); ?>;
        </script>
        
    </head>
    <body>

    <div class="editprofcon">
        <div class="editprof">
            
            <div class="topEP"><p style="padding: 11px 0; padding-left: 15px;">Edit</p>
            <span class="close"></span>
            <hr></div>
            <div class="botEP">
            <table id="EPtable">
                <form action="" method="post"  enctype="multipart/form-data">
                <tr>
                    <td><label for="">Username</label></td>
                    <td><input type="text" name="uname" class="uname"></td>
                </tr>
                <tr></tr>
                    <td><label for="">Password</label></td>
                    <td><input type="text" name="pwd"></td>
                </td>
                <tr>
                    <td><label for="">Name</label></td>
                    <td><input type="text" name="name" id=""></td>
                </tr>
                <tr>
                    <td><label for="">Email</label></td>
                    <td><input type="text" name="email" id=""></td>
                </tr>
                <tr>
                    <td><label for="">Image</label></td>
                    <td>
                        <input type="file" name="file" id="file">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="upload" id="upload" value="submit">
                    </td>
                </tr>
                </form>
            </table>
            </div>
        </div>
    </div>


        <div class="container">
            <div class="header">
                <div class="group1">
                    <img src="pic/logo2.png" alt="logo" class="logo">
                    <h1 class="scc">Sibonga Community College</h1>
                </div>

                <div class="group2">
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

                    <img src="pic/bell.png" alt="bell" style="width: 32px">
                    
                    <?php include"pic.php"; ?>
                    <img src="<?php echo $img; ?>" class="user-pic" onclick="toggleMEnu()"> 
                    
                    <div class="sub-menu-wrap" id="subMenu">
                        <div class="sub-menu">
                            <div class="user-info">
                                <img src="<?php echo $img; ?>">
                                <h3><div class="name"><?php  echo $capitalize;  ?></div<br>
                                <div class="user"><?php echo $_SESSION['usertype']; ?></div></h3>
                            </div>
                            <hr>
                            <div class="editdiv">
                                <p>
                                    <img src="pic/profile.png">
                                    <p class="EP">Edit profile</p>
                                    <span>></span>
                                </p>
                            </div>


                         
                            <a href="helpandsupport.php" class="sub-menu-link">
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
                <div class="sh_left">
                        <div  class="left">
                            <ul class="sidenav">
                                <li><a href="staff_home.php"><i class="fa-solid fa-house-user"></i>HOME</a></li>
                                <li><a href="reports.php"><i class="fa-regular fa-folder-open"></i>REPORTS</a></li>
                                <li><a href="staff.php"><i class="fa-solid fa-file-pen"></i>RECORD</a></li>
                                <li><a href="#"><i class="fa-solid fa-calendar-check"></i><p style="margin-left:5;">REQUEST</p></a></li>
                            </ul>
                            
                            
                            
                        </div>

                </div>
                <div class="right">
                    <?php include "ay_all.php" ?>
                    <div class="reqwrapper"></div>
                </div>
            </div>
        </div>
        


    <script>
    let subMenu=document.getElementById("subMenu")

    function toggleMEnu()
    {
        subMenu.classList.toggle("open-menu");
    }

    </script>
    <script src="jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="staff_request.js"></script>

    </body>
</html>

<?php
}