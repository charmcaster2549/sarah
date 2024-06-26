<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    $id=$_SESSION['id'];
    
$data=$_SESSION['name'];
$capitalize=ucwords($data);
?>

<html>
    <head>
        <title>Update Student</title>
        <link rel="stylesheet" href="studentupdate.css">
        <script src="https://kit.fontawesome.com/ffc46dca65.js" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="editprofile.css">
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
                        <div class="sidenav">
                            <ul>
                                <li><a href="staff_home.php"><i class="fa-solid fa-house-user"></i>HOME</a><br></li>
                                <li><a href="#"><i class="fa-regular fa-folder-open"></i>REPORTS</a><br></li>
                                <li><a href="staff.php"><i class="fa-solid fa-file-pen"></i>RECORD</a></li>
                            </ul>
                            
                            
                            
                        </div>

                    </div>
                    <div class="paraAdd">
                    <div class="search">
                        <!-- <form id="sarah"> -->
                        <label class="searchlabel">Search</label>
                            <div class="search-container">
                                <input type="text" class="searchinput" id="searchinput">
                                <div id="results"></div>
                            </div>
                        <!-- </form> -->
                    </div>
                        <div class="middiv">
                            <div class="headerstud">
                                <h1 class="add">Update Student</h1>
                            </div>
                            <div class="wrapperstud">
                                <table>
                                    <tr><td colspan="2"><h2>MAIN INFORMATION</h2></td></tr>
                                    <tr>
                                        <td><label for="">Student ID Number</label></td>
                                        <td><input type="text" required name="id"></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 150;"><label for="">First Name</label></td>
                                        <td><input type="text" name="fname"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Middle Name</label></td>
                                        <td><input type="text" name="mname"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Last Name</label></td>
                                        <td><input type="text" name="lname"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Course</label></td>
                                        <td><input type="text" name="course"></td>
                                    </tr>
                                    <tr>
                                        <td ><label for="">Year</label></td>
                                        <td style="display: flex; align-items: center; justify-content: space-between;">
                                        <select name="year" id="" style="height: 38px;">
                                            <option value="0">--Select Year--</option>
                                            <option value="1">1st Year</option>
                                            <option value="2">2nd Year</option>
                                            <option value="3">3rd Year</option>
                                            <option value="4">4th Year</option>
                                        </select></td>
                                    </tr>
                             
                                    <tr>
                                        <td colspan="2"><h2>BACKGROUND INFORMATION</h2></td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Barangay</label></td>
                                        <td><input type="text" name="brgy" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Municipality/City</label></td>
                                        <td><input type="text" name="mun" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Province</label></td>
                                        <td><input type="text" name="pro"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Guardian Address</label></td>
                                        <td><input type="text" name="gadd"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Other Address</label></td>
                                        <td><input type="text" name="oadd"></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><label for="">Father's Name</label></td>
                                        <td><input type="text" name="father"></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><label for="">Mother's Name</label></td>
                                        <td><input type="text" name="mother"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Guardian's Name</label></td>
                                        <td><input type="text" name="gname"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><h2>OTHER INFORMATION</h2> </td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Contact Number</label></td>
                                        <td><input type="text" name="cnum"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Telephone/Mobile</label></td>
                                        <td><input type="text" name="tel"></td>
                                    </tr>
                                    
                                    
                                    
                                    <tr>
                                        <td><label for="">Email</label></td>
                                        <td><input type="text" name="email"></td>
                                    </tr>
                                    
                                </table>
                                

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

    <script>
        
    function cancelForm(){
        $("input[type='text']").val("");
        $(".alert").hide();
    }
    </script>
    <script src="jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="studentupdate.js"></script>
    <script src="editprofile.js"></script>


    </body>
</html>

<?php

}

?>