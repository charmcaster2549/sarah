<?php
session_start();
include "conn.php";

if(isset($_POST['username']) && isset($_POST['password'])){
//    function validate($data){
//         $data=trim($data);
//         $data=striplashes($data);
//         $data=htmlspecialchars($data);
//         return $data;
//     }
    
    $username=($_POST['username']);
    $password=($_POST['password']);

    if(empty($username)){
        
        header("Location: index.php?error=Username is required");
        exit();

    }else if(empty($password)){
        header("Location: index.php?error=Password is required");
    }
    else{
            

        $sql="SELECT * FROM login WHERE username='$username' AND password='$password'";
        $result=mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)===1){
            $row=mysqli_fetch_assoc($result);
            if($row['username']===$username && $row['password']===$password){
                $_SESSION['username']=$row['username'];
                $_SESSION['name']=$row['name'];
                $_SESSION['id']=$row['id'];
                $_SESSION['usertype']=$row['usertype'];
                $_SESSION['stud_id']=$row['stud_id'];
                $_SESSION['password']=$row['password'];

                $user1="student";
                if($_SESSION['usertype']===$user1){
                    header("Location: home2.php");
                exit();
                }
                else
                header("Location: staff.php");


                
            }else{
                header("Location: index.php?error=Wrong login details");
                exit();
            }
        }else{
            header("Location: index.php?error=Wrong login details");
            exit();
        }
    }
        
}   
else{
    header("Location: index.php");
    exit();
}
        