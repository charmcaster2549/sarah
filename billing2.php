<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    $id=$_SESSION['id'];
    
$data=$_SESSION['name'];
$capitalize=ucwords($data);
?>


<html>
    <head>
        <title>Accounts</title>
        <link rel="stylesheet" href="billing2.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/ffc46dca65.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="editprofile2.css">
        <script>
            var idvalue = <?php echo json_encode($id); ?>;
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
                            <li><a href="#"><i class="fa-solid fa-money-check-dollar"></i><p>Assessment/Billing</p></a></li>
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
                <div class="right">
                    <div class="receipt">
            
                        <h1 style="text-align: center;font-size: 45px; margin-top: 21px" class="h1">Statement of Account</h1>
                        <hr>
                        <?php include'getay.php'; ?>
                    </div>  
        
        
                    <?php
                    
                    include 'conn.php';
                    include 'getinfo.php';

                    ?>

                    <div class="nametable">
                        <div class="nttop">
                            <div class='namewrapper'>
                                <div class='namebill'>
                                    <div class='h3name'>
                                        <h3 class='h3'><?php echo ucwords($fname) ." " .ucwords($lname); ?></h3>
                                    </div>
                                    <p style='font-size: 13px'>STUDENT NAME</p>
                                </div>
                                <div class="idunit">
                                    <div class='idnumstud'><h3><?php echo $studidnum; ?></h3> 
                                        <P style='font-size: 13px'>STUDENT NO</P>
                                    </div>
                                    <div class='units'><h3 id='tunit'></h3>
                                        <P style='font-size: 13px'>Total Units</P>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="table">
                                <div class="bayad">
                                    <table id="transrec" class="lamesa" border="1">
                                        <thead>
                                            <tr>
                                                <th>Official Receipt</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody id="transreclist" style="font-size: 20px"></tbody>
                                    </table>
                                </div>
                                
                            </div>
                    

                            <div class="buttons-div">

                                <button id="button" class="button">School Fees Breakdown</a></button>

                                <div id="popup" class="popup">
                                    <div class="button-content">
                                        
                                        <h2>SCHOOL FEES BREAKDOWN</h2>
                                        <br>
                                        <table style="text-align: left; width: 65%;">
                                            <thead>
                                            <tr>
                                                
                                                <th style="width: 270px">Description</th>
                                                <th style="padding: 15px 0px; width: 150px">Amount</th>
                                            </tr>
                                            </thead>
                                                <tbody id="popupbody" style="font-size: 20px"></tbody>
                                        </table>
                                    </div>
                                </div>

                                <button id="prelim" class="button">Assessment</a></button>

                                <div id="popup-prelim" class="popup">
                                    <div class="button-content">
                                        
                                        <h2>Assessment</h2>
                                        <br>
                                        <div style="width:70%"><h3 id="posthere"></h3></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ntbot">
                            <div class="total" id="total"></div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
        

        <?php } ?>

        
    <script>
    let subMenu=document.getElementById("subMenu")

    function toggleMEnu()
    {
        subMenu.classList.toggle("open-menu");
    }

    </script>
    <script src="jquery.js"></script>
    <script src="editprofile.js"></script>
    <script src="billing.js"></script>
    <script src="getAY.js"></script>
    </body>
</html>