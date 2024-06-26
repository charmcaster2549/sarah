<?php

include("display.php");

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    $id=$_SESSION['id'];
    
    
$data=$_SESSION['name'];
$capitalize=ucwords($data);
?>


<html>
    <head>
        <title>Assessment</title>
        <link rel="stylesheet" href="billing2.css">
        <link rel="stylesheet" href="studupdate2.css">
        
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
                            <li><a href="#"><i class="fa-solid fa-file-lines"></i><p style="margin-left: 8px;">Reports</p></a></li>
                            <li><a href="#"><i class="fa-solid fa-person-circle-question"></i><p>Requests</p></a></li>
                            <li><a href="#"><i class="fa-solid fa-address-book"></i><p>Contact</p></a></li>
                            <div class="activee"></div>
                        </ul>
                </div>
                <div class="righthome">
                <h1 class="updateform">STUDENT INFORMATION UPDATE FORM</h1>
        
        <div class="div">
        <div class="container2">
            <div class="tab_box">
                <button class="tab_btn active">Name</button>
                <button class="tab_btn">Address</button>
                <button class="tab_btn">Parents</button>
                <button class="tab_btn">Contact</button>
                <div class="line"></div>
            </div>
        <div class="content_box">
           <div class="content active">
               
               <br>
               <form method="POST" action="update.php">
                   <table >
                       <tr><td colspan="2"><label>First Name: </label> </td></tr>
                       <tr><td colspan="2"><input type="text" name="fname" value="<?php echo $cfname ?>">  </td></tr>
                       <tr><td colspan="2"><label>Middle Name: </label> </td></tr>
                       <tr><td colspan="2"><input type="text" name="mname" value="<?php echo $cmname ?>">  </td></tr>
                       <tr><td colspan="2"><label>Last Name: </label> </td></tr>
                       <tr><td colspan="2"> <input type="text" name="lname" value="<?php echo $clname ?>">  </td></tr>
                       <tr><td><label>Course: </label> </td>
                       <td> <label>Year: </label></td></tr>
                       <tr> <td><input type="text" name="course" class="course" value="<?php echo $course ?>">  </td>
                       
                       <td><input type="text" name="year" class="year" value="<?php echo $year ?>">  </td></tr>
                       <tr><td>      <br> </td></tr>
                       <tr><td colspan="2" style="text-align: center;">Note: Go to Registrar's Office if you want changes within this form </td></tr>
                    </table>
            </div>
            <div class="content">
               
               
                   <br>
                   <table>
                       <tr><td colspan="2"><label>Barangay: </label> </td></tr>
                       <tr><td colspan="2"><input type="text" name="brgy" value="<?php echo $cbar ?>">  </td></tr>
                       <tr><td colspan="2"><label>Municipality: </label> </td></tr>
                       <tr><td colspan="2"><input type="text" name="mun" value="<?php echo $cmun ?>">  </td></tr>
                       <tr><td colspan="2"><label>Province: </label> </td></tr>
                       <tr><td colspan="2"> <input type="text" name="pro" value="<?php echo $cpro ?>">  </td></tr>
                       
                       <tr><td colspan="2"><label>Guardian Address: </label> </td></tr>
                       <tr><td colspan="2"> <input type="text" name="gadd" value="<?php echo $cgadd ?>">  </td></tr>
                       <tr><td colspan="2"><label>Other Address(if applicable): </label> </td></tr>
                       <tr><td colspan="2"> <input type="text" name="oadd" value="<?php echo $coadd ?>">  </td></tr>
                    </table>
            </div>

           <div class="content">
               <br>
              
                   <table >
                       <tr><td colspan="2"><label>Father: </label> </td></tr>
                       <tr><td colspan="2"><input type="text" name="fname" value="<?php echo $fatname ?>">  </td></tr>
                       <tr><td colspan="2"><label>Mother: </label> </td></tr>
                       <tr><td colspan="2"><input type="text" name="mname" value="<?php echo $motname ?>">  </td></tr>
                       <tr><td colspan="2"><label>Guardian: </label> </td></tr>
                       <tr><td colspan="2"> <input type="text" name="gname" value="<?php echo $gname ?>">  </td></tr>
                      
                    </table>
              
           </div>

           <div class="content">
                <br>
                <table >
                       <tr><td colspan="2"><label>Mobile: </label> </td></tr>
                       <tr><td colspan="2"><input type="text" name="mob" value="<?php echo $mob ?>">  </td></tr>
                       <tr><td colspan="2"><label>Telephone: </label> </td></tr>
                       <tr><td colspan="2"><input type="text" name="tel" value="<?php echo $tel ?>">  </td></tr>
                       <tr><td colspan="2"><label>Email: </label> </td></tr>
                       <tr><td colspan="2"> <input type="text" name="email" value="<?php echo $email ?>">  </td></tr>
                       <tr><td>      <br><br> </td></tr>
                       <tr><td colspan="2" style="text-align: center;"></td></tr>
                </table>
            </div>
        </div> <!--contentbox-->
        <input type="submit" value="SAVE" class="uname">
        </form>
    </div> <!--container -->
</div><!--style-->
</div><!--table-->
</div><!--right-->
           
   <script>
       const tabs=document.querySelectorAll('.tab_btn');
       const all_content=document.querySelectorAll('.content');
       
       tabs.forEach((tab, index)=>{
           tab.addEventListener('click', (e)=>{
               tabs.forEach(tab=>{tab.classList.remove('active')});
               tab.classList.add('active');

               var line=document.querySelector('.line');
               line.style.width=e.target.offsetWidth + "px";
               line.style.left=e.target.offsetLeft + "px";

               all_content.forEach(content=>{content.classList.remove('active')});
               all_content[index].classList.add('active');
           })

           
       })
   </script>
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
    </body>
</html>