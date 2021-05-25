<?php

$showError="true";
$showAlert="true";
$method=$_SERVER["REQUEST_METHOD"];


if ($method=="POST") {

    include '_dbconnect.php';

    $pass =$_POST["loginPassword"];

    $email= $_POST["loginEmail"];
    
    $sql="SELECT * FROM `users` WHERE `user_email`='$email'";
    $result=mysqli_query($conn,$sql);
    
    $numRows=mysqli_num_rows($result);
    
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);

        if (password_verify($pass, $row['user_password']) ) {
            $showError="You LoggedIn Successfuly";
            $showAlert="success   SuccesFull!";

            session_start();
            $_SESSION['loggedin']= true;
            $_SESSION['userid']= $row["user_id"];
            $_SESSION['email'] = $email;

            header("Location: /itforum/index.php?signupsucces=true&showError=$showError&showAlert=$showAlert");
        }
        else {
            $showError="Wrong Password Entered Please try Again";
            $showAlert="warning   ohh!";
            header("Location: /itforum/index.php?signupsucces=true&showError=$showError&showAlert=$showAlert");
        }
        
    }
    else{
            $showAlert="danger   ohh!";
            $showError="Please Signup Your Account";
        header("Location: /itforum/index.php?signupsucces=true&showError=$showError&showAlert=$showAlert");
    }
    
}
 
    
    ?>