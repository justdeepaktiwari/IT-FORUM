<?php

$showError="true";
$showAlert="true";

$method=$_SERVER["REQUEST_METHOD"];


if ($method=="POST") {

    include '_dbconnect.php';
    $pass =$_POST["signupPassword"];
    $email= $_POST["signupEmail"];
    $cnfpass=$_POST["signupCPassword"];
    
    $sql="SELECT * FROM `users` WHERE `user_email`='$email'";
    $result=mysqli_query($conn,$sql);
    
    $numRows=mysqli_num_rows($result);
    
    if($numRows>0){
        $showError="Email Already Exsist";
        $showAlert="danger   ohh!";
        header("Location: /itforum/index.php?signupsucces=true&showError=$showError&showAlert=$showAlert");
    }
    else{
        
        if ($pass==$cnfpass) {
            
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql="INSERT INTO `users` (`user_email`, `user_password`, `timestamp`) VALUES ('$email', '$hash', current_timestamp())";
            $result=mysqli_query($conn,$sql);
            $showAlert="success  Successful!";
            $showError="Your Account Successful created";
            
        }
        else {
            $showAlert="warning   ohh!";
            $showError="Password Don't match";
            header("Location: /itforum/index.php?signupsucces=false&showError=$showError&showAlert=$showAlert");
        }
        header("Location: /itforum/index.php?signupsucces=true&showError=$showError&showAlert=$showAlert");
    }
    
}
 
    
    ?>