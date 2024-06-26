<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    $id=$_SESSION['id'];
    $sid=$_SESSION['stud_id'];
    $pwd=$_SESSION['password'];
    $utype=$_SESSION['usertype'];
    $data=$_SESSION['name'];
    $capitalize=ucwords($data);
?>


<html>
    <head>
        <title>Request</title>
        <link rel="stylesheet" href="billing2.css">
        <link rel="stylesheet" href="request.css">
        <link rel="stylesheet" href="studreport.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/ffc46dca65.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="editprofile2.css">

        <script>
            var sidval = <?php echo json_encode($sid); ?>;
            var idvalue = <?php echo json_encode($id); ?>;
            console.log("id val: ", idvalue);
            
        </script>
        
    </head>
    <body>
        
    <div id="extra2">
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
    </div>
        <div class="container">
            <div class="top">
                <div class="group1">
                    <img src="pic/logo2.png" alt="logo" class="logo">
                    <h1 class="scc">Sibonga Community College</h1>
                </div>

                <div class="group2">
                    <div class="time">
                        
                        <p><?php 
                        date_default_timezone_set('Asia/Manila');
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


                        
                            <a href="billing-help.php" class="sub-menu-link">
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
                <div class="left">
                    
                        <ul class="nav-links">
                            <li><a href="home2.php"><i class="fa-solid fa-house-user"></i><p>Dashboard</p></a></li>
                            <li><a href="billing2.php"><i class="fa-solid fa-money-check-dollar"></i><p>Assessment/Billing</p></a></li>
                            <li><a href="#"><i class="fa-solid fa-file-lines"></i><p style="margin-left: 8px;" id="repp">Reports<span id="span">></span></p></a></li>
                            <li><a href="#"><i class="fa-solid fa-person-circle-question"></i><p>Requests</p></a></li>
                            <li><a href="contact.php"><i class="fa-solid fa-address-book"></i><p>Contact</p></a></li>
                            <div class="activee"></div>
                            <div class="repdiv">
                                <div class="assessment">
                                    <a href="asmtperstudent.php" id="sarah">Assessment</a>
                                </div>
                                <div class="report">
                                    <a href="report-allrec.php" id="asmt">Payment Records</a>
                                </div>
                            </div>
                        </ul>
                </div>
                <div class="righthome">
                    <div class="requestbox">
                        <div class="wrapper">
                            <div class="header">
                                <img src="pic/request.png" alt="" id="imgreq">
                                <h3 id="h3">Document Request Form</h3>
                            </div>
                            <div class="bottom">
                                <div class="topbox">
                                    <div class="div1">
                                        <!-- <form action="requestdb.php" method="get"> -->
                                            <label for="">Item: </label>
                                            <select name="select" id="select" style="margin-left: 20">
                                                <option value="0">Select Request</option>
                                                <option value="1">Transcript of Record</option>
                                                <option value="2">CAV</option>
                                                <option value="3">Good Moral</option>
                                                <option value="4">Diploma</option>
                                                <option value="5">Grades</option>
                                                <option value="6">Studyload</option>
                                                <option value="7">Others</option>
                                            </select>
                                            </div>
                                            <div class="div2">
                                                <label for="">Reason for request: </label>
                                                <textarea id="reason" name="reason" rows="2" cols="30" style="margin-left: 20"></textarea>
                                                <input type="submit" name="submit" id="submit" style="margin-left: 20;">
                                            </div>
                                        <!-- </form> -->
                                            
                                    
                                </div>
                                <div class="botbox">
                                    <table border="1" id="botboxtb">
                                        <thead id="thead">
                                            <tr>
                                                <th>No</th>
                                                <th>Description</th>
                                                <th>Date submitted</th>
                                                <th>Approved Schedule</th>
                                                <th>Date Validated</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            <tr>
                                                <td>XXXX</td>
                                                <td>XXXX</td>
                                                <td>XXXX</td>
                                                <td>XXXX</td>
                                                <td>XXXX</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                </div>
            
            </div>
        </div>
        

        <?php }
        ?>
        <div id="extra">
            <div id="grade">
            <span id="sjs"></span>
            </div>
        </div>
    <div class="hide">
        <?php include "autoay.php"; ?>
    </div>
        
    <script>
    let subMenu=document.getElementById("subMenu")

    function toggleMEnu()
    {
        subMenu.classList.toggle("open-menu");
    }

    </script>
    <script>
  
    </script>

    <script src="jquery.js"></script>
    <script src="editprofile.js"></script>
    <script src="billing.js"></script>
    <script src="request.js"></script>
    <script src="getAY.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    </body>
</html>