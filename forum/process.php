<?php
require_once('connection.php');
session_start();

if(isset($_POST['login'])){

    // if(isset($_POST['UName']) || isset($_POST['PWord'])){

    //     header("location:login.html?=Empty = Please Fill The Blanks");
    // } 
    $email =$_POST['UName'];
    $pass = $_POST['PWord'];
    $pass = md5($pass);


        $query="select * from workers where email='$email' AND pass='$pass' ";
        $result=mysqli_query($con,$query);

        if(!$result->num_rows == 1){

            echo '<script> alert("Wrong Email Or Password")
            window.location="login.html";
            </script>';
            exit();
        }
        
        else{

           $record = mysqli_fetch_assoc($result);
            $name = $record['name'];
            $_SESSION['User']=$name;
            header("location:welcome.php");
        }


    
}




// else{
// echo 'Not Working';
// }


?>
            
