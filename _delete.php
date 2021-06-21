<!-- Modal -->
<?php
include 'partials/_dbconnect.php';

$commentid = $_GET["commentId"];

// delete comment from datatable comments
    $sql="SELECT * FROM `comments` WHERE `comment_id`='$commentid'";
    $result=mysqli_query($conn,$sql);

    if($row = mysqli_fetch_assoc($result)){

        $elm = $row["comment_th_id"];

        $sql1="SELECT `comment_desc` FROM `comments`";

        $result1=mysqli_query($conn,$sql1);
        $row = mysqli_fetch_assoc($result1);
        $numrow = mysqli_num_rows($result1);

        $sql="DELETE FROM `comments` WHERE `comments`.`comment_id` = $commentid";
        $result=mysqli_query($conn, $sql);
        header("LOCATION: thread.php?threadid=$elm");
    }
//! delete comments from datatable comments

// delete thread from datatable threads
    $sql="SELECT * FROM `threads` WHERE `thread_id`='$commentid'";
    $result=mysqli_query($conn,$sql);

    if($row = mysqli_fetch_assoc($result)){

        $elm = $row["thread_cat_id"];

        $sql1="SELECT `thread_desc` FROM `threadss`";

        $result1=mysqli_query($conn,$sql1);
        $row = mysqli_fetch_assoc($result1);

        $sql="DELETE FROM `threads` WHERE `threads`.`thread_id` = $commentid";
        $result=mysqli_query($conn, $sql);
        header("LOCATION: threadlists.php?catid=$elm");
    }
//! delete thread from datatable threads




?>