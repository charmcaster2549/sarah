<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    $id=$_SESSION['id'];
    
$data=$_SESSION['name'];
$capitalize=ucwords($data);
?>


<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="staff_home.css">
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
                <div class="middiv">
                    <div class="sh_left">
                        <div class="left">
                            <ul class="sidenav">
                                <li><a href="#"><i class="fa-solid fa-house-user"></i><p>HOME</p></a></li>
                                <li><a href="reports.php"><i class="fa-regular fa-folder-open"></i><p>REPORTS</p></a></li>
                                <li><a href="staff.php"><i class="fa-solid fa-file-pen"></i><p>RECORD</p></a></li>
                                <li><a href="staff_request.php"><i class="fa-solid fa-calendar-check"></i><p style="margin-left:5;">REQUEST</p></a></li>
                            </ul>
                            
                            
                            
                        </div>

                    </div>
                    <div class="sh_right">
                        <div class="wrapper_summary">
                            <div class="sh_summary_box">
                                <h1 class="sh_summary">SUMMARY</h1>
                                <?php include"ay.php"; ?>
                            </div>
                            <div class="wrappersummarry_box">
                                <div class="sibonganhon">
                                    <h3 class="sh_sib">Sibonganhon</h3>
                                    <hr>
                                    <h4 style="margin-left: 16px; margin-top: 20;">SG Fund</h4>
                                    <p id="list">No. of students: </p> 
                                    <p id="full">Paid in full: </p>
                                    <p id="total">Total amount collected: </p>
                                </div>
                                <div class="nonsibonganhon">
                                    <h3 class="sh_sib">Non-Sibonganhon</h3>
                                    <hr>
                                    <select name="" id="non_select" class="sh_select">
                                        <h4>
                                        <option value="1">SG Fund</option>
                                        <option value="2">Tuition</option>
                                        </h4>
                                    </select>
                                    <div id="non_display">
                                            <p id="list_non">No. of students: </p>
                                            <p id="full_non">Paid in full: </p>
                                            <p id="total_non">Total amount collected: </p>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wrapper_user">
                            <div class="edituser">
                                <div class="dropdown">
                                    <button id="student">STUDENT</button>
                                    
                                    <div class="dropdown-menu">
                                        <a href="addstudent.php">New Student</a>
                                        <a href="oldstudent.php">Old Student</a>
                                        <a href="studentupdate.php">Update Info</a>
                                    </div>
                                </div>

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
                                            <!-- <button id="viewmisc"> </button> -->
                                           
                                        </div>
                                    
                                        
                                    
                                    <button class="closemisc" id="closemisc">X</button>
                                    
                                
                                </div>
                            </div>
                            <div class="addnewuser">
                                <div class="edituser">
                                    <div class="dropdown">
                                        <button id="student">USER</button>
                                            <div class="dropdown-menu">
                                                <a href="addnewuser.php">Add New</a>
                                                <a href="viewuser.php">View</a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

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
    <script src="staff_home.js"></script>
    
    <script src="addsemester.js"></script>

    </body>
</html>

<?php
}