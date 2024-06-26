<?php include("display.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tabs</title>
        <link rel="stylesheet" href="tabsstyle.css">
        
    </head>
    <body>
        <div class="tabsidenav">
            
        <?php
        include("tabsnav.php");
        ?>

        </div>
        <h1>STUDENT INFORMATION UPDATE FORM</h1>
       
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
            </div>
            
            <input type="submit" value="SAVE" class="uname">
</form>
            
        </div>
                
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
    </body>
</html>

