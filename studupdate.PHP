<?php
include("display.php");


if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    $id=$_SESSION['id'];
    
$data=$_SESSION['name'];
$capitalize=ucwords($data);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, inital-scale=1.0">
        <title>HOME</title>
        <link rel="stylesheet" href="studupdatestyle.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans&display=swap" rel="stylesheet">

        <script src="https://kit.fontawesome.com/ffc46dca65.js" crossorigin="anonymous"></script>
</head>
<body>
    

<div class="home">
    
    <nav>
        <img src="pic/logo2.png" class="logo">
        
            <ul>
            <h1 class="scc">Sibonga Community College</h1>
            <div class="time">
            <p><?php date_default_timezone_set('Asia/Manila');
            $current_time = date('H'); 
            if($current_time>=5 && $current_time<12)
               echo"Good morning!";
            elseif($current_time>=12 && $current_time<18)
               echo"Good afternoon!";
            else
               echo"Good evening!";
            ?></div>
            </ul><?php
            include"pic.php"; ?>
            <img src="<?php echo $img; ?>" class="user-pic" onclick="toggleMEnu()"> 
            
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="<?php echo $img; ?>">
                        <h3><div class="sarah"><?php  echo $capitalize;  ?></div<br>
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

        </nav>
        
</div>
<div style="">
<div class="header">
    <div class="side-nav">
        <ul class="nav-links">
            <li><a href="home.php"><i class="fa-solid fa-house-user"></i><p>Dashboard</p></a></li>
            <li><a href="billing.php"><i class="fa-solid fa-money-check-dollar"></i><p>Assessment/Billing</p></a></li>
            <li><a href="#"><i class="fa-solid fa-file-lines"></i><p>Reports</p></a></li>
            <li><a href="#"><i class="fa-solid fa-person-circle-question"></i><p>Requests</p></a></li>
            <li><a href="#"><i class="fa-solid fa-address-book"></i><p>Contact</p></a></li>
            <div class="activee"></div>
        </ul>
    </div>
    <div style="width: calc(100% - 250px);">
        <h1 class="updateform">STUDENT INFORMATION UPDATE FORM</h1>
        
            <div style="
            height: calc(100% - 69px);
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            ">
            <div class="container">
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


<script>
    let subMenu=document.getElementById("subMenu")

    function toggleMEnu()
    {
        subMenu.classList.toggle("open-menu");
    }

</script> 

    

</body>
</html>

<?php
}else{
    header("Location: index.php");
            exit();
}



?>

