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
        <title>Dashboard</title>
        <link rel="stylesheet" href="billing2.css">
        <link rel="stylesheet" href="home2.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/ffc46dca65.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="editprofile2.css">

        <script>
            var idvalue = <?php echo json_encode($id); ?>;
            var sidval = <?php echo json_encode($sid); ?>;
            // console.log("sidval: ", sidval);
            // console.log("id staff: ", idvalue);
            
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
                            <li><a href="request.php"><i class="fa-solid fa-person-circle-question"></i><p>Requests</p></a></li>
                            <li><a href="contact.php"><i class="fa-solid fa-address-book"></i><p>Contact</p></a></li>
                            <div class="activee"></div>
                            <div class="repdiv">
                                <div class="assessment"><a href="asmtperstudent.php" id="rep">Assessment</a></div>
                                <div class="report"><a href="report-allrec.php" id="asmt">Payment Records</a></div>
                            </div>
                        </ul>
                </div>
                <div class="righthome">

                <div class="wrappertitle">
                    <h1>Dashboard</h1>
                    <p><?php include "autoay.php"; ?></p>
                </div>
                <div class="wrapperhome">
                    <div class="profbil">
                        <div class="profile">
                            <div class="titleprofbox">
                                <h1>My Profile</h1>
                                <a href="studupdate2.php"><img src="pic/edit.png" alt="edit" id="imgedit"></a>
                            </div>
                            
                            <div class="nameprofbox">
                                <img src="<?php echo $img; ?>" id="imgprof">
                                <div class="nameprof">
                                    <?php include "profilebox.php"; ?>
                                    <table id="proftb">
                                        <tr>
                                            <td>Name:</td>
                                            <td><?php  echo $capitalize;  ?></td>
                                        </tr>
                                        <tr>
                                            <td>Course:</td>
                                            <td><?php echo $course ?></td>
                                        </tr>
                                        <tr>
                                            <td>Year:</td>
                                            <td><?php echo $year ?></td>
                                        </tr>
                                        <tr>
                                            <td>Address:</td>
                                            <td><?php echo $bar .", " .$mun .", " .$prov ?></td>
                                        </tr>
                                    </table>
                                    
                                    
                                </div>
                            </div>
                        </div>

                        <div class="billing">
                            <div class="billtop">
                                <h1>Assessment/Billing</h1>
                                <a href="billing2.php"><img src="pic/view.png" id="view" alt=""></a>
                            </div>
                            <div class="topbilling">
                                <div class="duebox">
                                    <img src="pic/due.png" id="dueimg" alt="due">
                                    <div class="fees">
                                        <h1 id="dueno">xxxx</h1>
                                        <p>Last Payment</p>
                                    </div>
                                </div>

                                <div class="paid">
                                    <img src="pic/paid.png" id="paidimg" alt="">
                                    <div class="paybox">
                                        <h1 id="paidno">xxxx</h1>
                                        <p>Total Payment</p>
                                    </div>
                                </div>
                            </div>

                            <div class="botbilling">

                                <div class="balance-ay">
                                    <img src="pic/balanceay.png" id="balay">
                                    <div class="balbox">
                                        <h1 id="balno">xxxx</h1>
                                        <p id="balsem">xxxx</p>
                                    </div>
                                </div>

                                <div class="balance-out">
                                    <img src="pic/balanceout.png" id="balout">
                                    <div class="balbox">
                                        <h1 id="outno">xxxx</h1>
                                        <p>Outstanding balance</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ubos">
                        <a href="asmtperstudent.php" id="rep2"><button>Assessment</button></a>
                        <a href="report-allrec.php?sid=<?php echo $sid; ?>"><button>Payment Record</button></a>
                    </div>
                </div>

                </div>
            
            </div>
        </div>
        

        <?php }?>

        <script>
        $('#repp').mouseenter(function () { 
            $('.repdiv').show();
            $('.assessment').mouseenter(function () {  
                $(this).css('background', '#c1fff9');
            });
            $('.assessment').mouseleave(function () {  
                $(this).css('background', 'white');
            })

            $('.report').mouseenter(function () {  
                $(this).css('background', '#c1fff9');
            });
            $('.report').mouseleave(function () {  
                $(this).css('background', 'white');
            })
            
            })
            
            $('.repdiv').mouseleave(function () {
            $(this).hide();
       })

        </script>
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
    <script src="home2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    </body>
</html>