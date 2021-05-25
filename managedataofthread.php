<?php
     $threadid = $_GET["thid"];
     $method=$_SERVER["REQUEST_METHOD"];

     if ($method=="POST") {
        include 'partials/_dbconnect.php';

         $commentdesc=$_POST['desc'];

         $commentdesc= str_replace("<","&lt;","$commentdesc");
         $commentdesc= str_replace(">","&gt;","$commentdesc");
         
         $userid = $_POST['userid'];

         $sql="INSERT INTO `comments` (`comment_desc`, `comment_th_id`, `comment_by`, `timestamp`) VALUES ('$commentdesc', '$threadid', '$userid', current_timestamp())";
        $result= mysqli_query($conn, $sql);
     }
     echo $threadid;
     header("Location: thread.php?threadid=$threadid");

        
?>