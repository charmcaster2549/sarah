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
        <title>Contact</title>
        <link rel="stylesheet" href="billing2.css">
        <link rel="stylesheet" href="request.css">
        
        <link rel="stylesheet" href="contact.css">
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
                            <li><a href="#" id="rep"><i class="fa-solid fa-file-lines"></i><p style="margin-left: 8px;" id="repp">Reports<span id="span">></span></p></a></li>
                            <li><a href="request.php"><i class="fa-solid fa-person-circle-question"></i><p>Requests</p></a></li>
                            <li><a href="#"><i class="fa-solid fa-address-book"></i><p>Contact</p></a></li>
                            <div class="activee"></div>
                            <div class="repdiv">
                                <div class="assessment"><a href="asmtperstudent.php" id="rep">Assessment</a></div>
                                <div class="report"><a href="report-allrec.php" id="asmt">Payment Records</a></div>
                            </div>
                        </ul>
                </div>
                <div class="righthome">
                    <div class="picbox">
                            <h1 id="h1">CONTACT US</h1>
                            <p>We value your feedback, inquiries, and suggestions. Please feel free to reach out to us using any of the contact methods below. Our dedicated team is here to assist you and provide the information you need.</p>
                            <br>
                            <p>Contact Information: <br>
                            Address: R. Bacaltos St., Poblacion, Sibonga, Cebu <br>
                            Phone: +0324868232 <br>
                            Email: sibongacommunitycollege@gmail.com</p>
                            <br>
                            <p>Contact Form:
                            If you prefer to communicate with us online, please fill out the contact form below. Provide your name, email address, subject, and message, and we will respond to you as soon as possible.
                            <br>

                            [<a href="https://forms.gle/qBeHM2Nhj1w2iAkY8" id="href">Contact Form</a>
                            ]</p>

                            <p>
                            Office Hours:
                            Our administrative and support staff are available during the following office hours:
                            Monday to Friday: 8:00 AM - 5:00 PM
                            </p>
                            <br>
                            <p>
                            We encourage you to reach out to us within these hours for prompt assistance. We strive to respond to all inquiries in a timely manner.
                            </p>
                    </div>
                    
                </div>
            
            </div>
        </div>
        

        <?php }?>
        <div id="extra">
            <div id="grade">
            <span id="sjs"></span>
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
  
    </script>

    <script src="jquery.js"></script>
    <script src="editprofile.js"></script>
    <script src="billing.js"></script>
    <script src="request.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    </body>
</html>