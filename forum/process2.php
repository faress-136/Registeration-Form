<?php
require_once('connection.php');
// include('connection.php');
session_start();
if(isset($_POST['register'])){

    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $pass = mysqli_real_escape_string($con,$_POST['password']);
    $cpass = mysqli_real_escape_string($con,$_POST['cpassword']);

$pass = md5($pass);
$cpass = md5($cpass);
    // $pas = password_hash($pass,PASSWORD_BCRYPT);
    // $cpas = password_hash($cpass,PASSWORD_BCRYPT);

    $emailquery = "select email from workers where email='$email' ";
    $query =mysqli_query($con,$emailquery);

    $emailcount =mysqli_num_rows($query);

    if($emailcount > 0){
        // echo "<h1> Email is already taken</h1>";
            echo '<script> alert("Email already taken")
            window.location="signup.html";
            </script>';


    }
    else{
        if($pass === $cpass){
            $insert_query="insert into workers (name,email,pass,cpass) values ('$name','$email','$pass','$cpass')";
            $result=mysqli_query($con,$insert_query);
            $_SESSION['User']=$_POST['name'];
            echo '<script> alert("Registered Sucessfully")
            window.location="login.html";
            </script>';

            // header("location:login.html");
    
        }
        // else{
        //     echo '<script> alert("Password doesnt match")</script>';
        //     // exit();
            

        // }



    }



      
        // if(mysqli_fetch_assoc($result)){

        //     $_SESSION['User']=$_POST['name'];
        //     header("location:welcome.php");
        // }
        
        // else{

        //     echo'Wrong Email Or Password';
        //     exit();
        // }


    
}




// else{
// echo 'Not Working';
// }


?>
            
