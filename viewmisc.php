<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    $id=$_SESSION['id'];
    
$data=$_SESSION['name'];
$capitalize=ucwords($data);
?>

<html>
    <head>
        <title>View User</title>
        <link rel="stylesheet" href="viewuser.css">
        <link rel="stylesheet" href="viewmisc.css">
        <script src="https://kit.fontawesome.com/ffc46dca65.js" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="group1">
                    <img src="pic/logo2.png" alt="logo" class="logo">
                    <h1 class="sh_scc">Sibonga Community College</h1>
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
                <div class="sh_left">
                    <div class="sidenav">
                        <ul>
                            <li><a href="staff_home.php"><i class="fa-solid fa-house-user"></i>HOME</a><br></li>
                            <li><a href="#"><i class="fa-regular fa-folder-open"></i>REPORTS</a><br></li>
                            <li><a href="staff.php"><i class="fa-solid fa-file-pen"></i>RECORD</a></li>
                        </ul>
                        
   
                        
                    </div>

                </div>
                
                    
                <div class="table">
                    
                <div class="sulod"></div>
                    <div class="wrappermisc">
                        <div class="title">
                            <h1 style="margin-top: 20;">MISCELLANEOUS FEES</h1>
                        </div>
                    
                        <div class="tbgroup">
                            <?php  include "viewmiscdb.php"; ?>
                        </div>
                    </div>
                    

                    <!-- <div class="wrapper_user">
                        <div class="edituser">
                            <button><a href="addstudent.php">Student</a></button>
                        </div>
                        <div class="sem">
                            <button class="addsem">Add Semester</button>
                            <div class="popup">
                                <h3>Add Semester</h3>
                                <hr><br>
                                <form action="addsemesterdb.php" method="get">
                                    <label>Enter academic year:</label>
                                    <input type="text" name="name" class="aytext" placeholder="1st Sem AY YYYY-YYYY" required>
                                    
                                    <input type="submit" class="aysubmit">
                                </form>
                                <button id="closeButton" class="closeButton">X</button>
                            </div>
                        </div>
                        <div class="addmisc">
                            <button class="misc">Add Miscellaneous</button>
                            <div class="miscellaneous">
                                <h3>Add Miscellaneous</h3>
                                <hr><br>
                                <form action="addmiscdb.php" method="get">
                                    <label for="">Enter Miscellaneous:</label>
                                    <input type="text" id="miscfocus" name="title" class="aytext" placeholder="e.g. Departmental Fee" required>
                                    <input type="number" name="amt" class="amt" placeholder="amount" required>
                                    <select name="miscyear" id="">
                                        <option value="0">All Years</option>
                                        <option value="1">1st Year Only</option>

                                    </select>

                                    <select name="miscay" id="">
                                        <option value="0">All Sem</option>
                                        <option value="1">1st Sem</option>
                                        <option value="2">2nd Sem</option>
                                    </select><br>
                                    <div class="btnmisc" style="margin-top: 10px;">
                                        <input type="submit" class="aysubmit">
                                </form>
                                        <a href="viewmisc.php" class="ahref">View</a>
                                        <button id="viewmisc"> </button>
                                        
                                    </div>
                                
                                    
                                
                                <button class="closemisc" id="closemisc">X</button>
                                
                            
                            </div>
                        </div>
                        <div class="addnewuser">
                            <button><a href="addnewuser.php">Add New User</a></button>
                        </div>
                        <div class="viewuser">
                            <button><a href="viewuser.php">View Staff</a></button>
                        </div>
                    </div> -->
                    
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
    <script src=""></script>
    
    <script src="addsemester.js"></script>

    </body>
</html>

<?php

}

?>