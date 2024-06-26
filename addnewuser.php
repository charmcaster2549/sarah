<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    $id=$_SESSION['id'];
    
$data=$_SESSION['name'];
$capitalize=ucwords($data);
?>

<html>
    <head>
        <title>Add New</title>
        <link rel="stylesheet" href="addnewuser.css">
        <script src="https://kit.fontawesome.com/ffc46dca65.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="editprofile2.css">
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
                                <p style="margin:0;">
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
                        <div class="sidenav">
                            <ul>
                                <li><a href="staff_home.php"><i class="fa-solid fa-house-user"></i>HOME</a><br></li>
                                <li><a href="#"><i class="fa-regular fa-folder-open"></i>REPORTS</a><br></li>
                                <li><a href="staff.php"><i class="fa-solid fa-file-pen"></i>RECORD</a></li>
                            </ul>
                            
                            
                            
                        </div>

                    </div>
                    <div class="paraAdd">
                        <div class="paraaddwrapper">
                        <div class="wrapper">
                            <div class="addheader">
                                <h2>Add New User</h2>
                                <p>Please complete the following form to add new user.</p>
                            </div>
                            <div class="addbottom">
                                <form action="addnewuserdb.php" method="post">
                                    <label for="">Username</label>
                                    <input type="text" name="uname" required>
                                    <label for="">Password</label>
                                    <input type="text" name="pwd" required>
                                    <label for="">Name</label>
                                    <input type="text" name="name" required>
                                    <label for="">Usertype: </label>
                                    <select name="utype" id="select">
                                        <option value="staff">Staff</option>
                                        <option value="registrar">Registrar</option>
                                        <option value="instructor">Instructor</option>
                                    </select><br><br>
                                    
                            </div>

                                <div class="buttons">
                                    <button type="submit">Save</button>
                                    <button type="button" onclick="cancelForm()">Cancel</button>
                                </div>
                            </form>

                            <?php if(isset($_GET['param'])){?>
                            <p class="alert">
                            <?php
                            echo $_GET['param'] ."</p>";
                            } 
                            ?>


                            
                            
                        </div>
                        <a href="viewuser.php" class="addnew">View</a>
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
    <script src="editprofile.js"></script>

    </body>
</html>

<?php

}

?>