<?php
include 'partials/_dbconnect.php';
session_start();

$commentid = $_GET["commentId"];

// update data of comments
$sql="SELECT * FROM `comments` WHERE `comment_id`='$commentid'";
$result=mysqli_query($conn,$sql);

if($row = mysqli_fetch_assoc($result)){
    $comment_by = $row['comment_by'];
    if ($_SESSION['userid']==$comment_by) {

        $elm = $row["comment_th_id"];

        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $comentdesc = $_POST["desc"];
            $comentdesc= str_replace("<","&lt;","$comentdesc");
            $comentdesc= str_replace(">","&gt;","$comentdesc");
            $sql="UPDATE `comments` SET `comment_desc` = '$comentdesc' WHERE `comments`.`comment_id` = $commentid";
            $result=mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
        }
        header("LOCATION: thread.php?threadid=$elm");
    }
}
//! update data of comments

// update data of threads
$sql="SELECT * FROM `threads` WHERE `thread_id`='$commentid'";
$result=mysqli_query($conn,$sql);

if($row = mysqli_fetch_assoc($result)){
    $threaduserid = $row['thread_user_id'];

    if ($_SESSION['userid']==$threaduserid) {
        
        $elm = $row["thread_cat_id"];
        
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $comentdesc = $_POST["desc"];
            $comentdesc= str_replace("<","&lt;","$comentdesc");
            $comentdesc= str_replace(">","&gt;","$comentdesc");
            $sql="UPDATE `threads` SET `thread_desc` = '$comentdesc' WHERE `threads`.`thread_id` = $commentid";
            $result=mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
        }
        header("LOCATION: threadlists.php?catid=$elm");
    }
}
//! update data of threads



?>