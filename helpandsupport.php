<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    $id=$_SESSION['id'];
    
$data=$_SESSION['name'];
$capitalize=ucwords($data);
?>


<html>
    <head>
        <title>Record</title>
        <link rel="stylesheet" href="staff.css">
        <link rel="stylesheet" href="help.css">
        <script src="https://kit.fontawesome.com/ffc46dca65.js" crossorigin="anonymous"></script>
        <script>
            var idvalue = <?php echo json_encode($id); ?>;
        </script>
        
    </head>
    <body>
        <div class="blur"></div>

    <div class="payment">
        <span class="closehelp"></span>
        <ul>
            <li>SG Fund Payment:</li>
            Contact the FASA (Financial Aid and Scholarships Association) treasurer or the designated person responsible for collecting the SG fund. Inquire about the accepted payment methods and any specific instructions they may have. They will provide you with the necessary details to make the payment.
            <li>Tuition Fee Payment:</li>
            Visit the municipal office or relevant department responsible for collecting tuition fees. Inquire about the payment process and the accepted payment methods. They will provide you with the necessary information, such as the account details or payment options available.
            <li>Choose a Payment Method:</li>
            Based on the instructions provided by the FASA treasurer and the municipal office, choose a suitable payment method. Common payment methods include cash, check, bank transfer, or online payment platforms. Ensure you have the required funds or access to the selected payment method.
            <li>Make the Payment:</li>
            Follow the specific instructions for the chosen payment method. If paying in cash, visit the designated location and submit the payment to the respective authority. For check payments, fill out the necessary details on the check and submit it accordingly. If paying through bank transfer or online payment platforms, follow the provided account details or online payment portal instructions.
            <li>Obtain Receipt or Confirmation:</li>
            After making the payment, request a receipt or confirmation as proof of payment. This document is important for record-keeping and documentation purposes. It may also be required for future reference or as evidence of payment.
        </ul>
    </div>

    <div class="bayad2">
        <span class="closebayad"></span> 
        <p style="margin-top: 20px; text-align: justify;">We kindly inform you that for tuition fees and SG (Student Government) fund payments, we only accept cash as the payment method. We understand the convenience of various digital payment options available today, but due to specific administrative requirements and processes, we have limited the accepted payment method to cash for these particular transactions. We appreciate your understanding and cooperation in ensuring a smooth payment process. Should you have any questions or concerns regarding the payment procedure, please feel free to reach out to our dedicated team who will be more than happy to assist you.</p>
    </div>

    <div class="forgot">
        
    <span class="closeforgot"></span> 
        <p style="margin-top: 20px; text-align: justify;">
            In the event that you forget your password, the appropriate course of action depends on your role. If you are a student or user, kindly reach out to the registrar's office to initiate the process of retrieving your password. They will assist you in recovering or resetting your password, ensuring the security of your account. On the other hand, if you are the registrar responsible for managing user accounts, you should submit a request for a new password. 
        </p>
    </div>

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


        <div class="container2">
            <div class="header">
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
                <div class="left" style="height: 117%">
                        <div class="sidenav">
                            <ul>
                                <li><a href="staff_home.php"><i class="fa-solid fa-house-user"></i>HOME</a><br></li>
                                <li><a href="reports.php"><i class="fa-regular fa-folder-open"></i>REPORTS</a><br></li>
                                <li><a href="#"><i class="fa-solid fa-file-pen"></i>RECORD</a></li>
                            </ul>
                            
                            
                            
                        </div>

                </div>
                <div class="right">
                    <div class="hns">
                        
                        <h1>STUDENT FINANCIAL MANAGEMENT SYSTEM</h1><br><br>

                        <main>
                            <section>
                            <h2>Help & Support</h2>
                            <p>Welcome to the Help & Support section of the Student Financial Management System. We are here to assist you with any questions or issues you may have regarding your financial matters.</p>

                            <h2 style="margin-top: 15;">Frequently Asked Questions (FAQs)</h2>
                            <p>Check out our list of frequently asked questions to find answers to common queries:</p>
                            <ul class="ul">
                                <li class="pay">How do I make a payment?</li>
                                <li class="bayad">What are the available payment methods?</li>
                                <li class="limot">What should I do if I forgot my password?</li>
                            </ul>

                            <h2>Contact Information</h2>
                            <p>If you need further assistance or have specific concerns, please feel free to reach out to our support team:</p>
                            <ul class="ul">
                                <li>Email: sibonga.college.cebu@gmail.com</li>
                                <li>Phone: (032)411-0409
                                </li>
                                <li>FB Page: <a href="https://www.facebook.com/sibongacommunitycollege" class="ahref">Sibonga Community College</a></li>
                            </ul>

                           
                            </section>
                        </main>

                        
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
    <script src="staff.js"></script>
    <script src="help.js"></script>
    <!-- <script src="submenu.js"></script> -->

    </body>
</html>

<?php
}