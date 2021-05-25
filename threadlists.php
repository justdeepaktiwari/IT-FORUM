<?php include 'partials/_dbconnect.php';?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Forum || Fix Your Bug || Solve Programing Problems....</title>

    <!-- Bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Custom Css -->
    <?php include 'style.php'?>
</head>

<body>

    <?php include 'partials/_header.php'?>
    <?php

        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE category_id=$id";
        $result= mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $catname=$row['category_name'];
        $catdesc=$row['category_description'];
    ?>

    <?php
    
        $method=$_SERVER["REQUEST_METHOD"];

        if ($method=="POST") {
            $th_desc=$_POST["desc"];

            $th_desc=str_replace(">","&gt;","$th_desc");
            $th_desc=str_replace("<","&lt;","$th_desc");

            $th_title=$_POST["title"];
            $th_user_id = $_POST["userid"];


            $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$th_user_id', current_timestamp())";
            $result= mysqli_query($conn, $sql);

        }
    
    ?>

    <div class="th-sec-1 w-75 mx-auto my-3 px-3 py-3">
        <h3 class=" text-center">Welcome to <?php echo $catname?> forums</h3>
        <div class="w-75 bg-primary mx-auto my-1"></div>
        <p><?php echo $catdesc?></p>
        <div class="w-100 mx-auto my-1"></div>
        <h5 class="text-danger">Forum Rules..</h5>
        <p class="text-primary">No Spam / Advertising / Self-promote in the forums. Do not post copyright-infringing
            material.Do not post “offensive” posts, links or images. Do not cross post questions. Do not PM users asking
            for help. Remain respectful of other members at all times.</p>
        <div class="w-100 mx-auto my-1"></div>
        <p class="text-danger">If you will login your account then you ask your problems.<br>Otherwise need to login or
            signup to your account..</p>
        <button class="btn btn-primary">Learn More</button>
    </div>

    <div class="w-75 mx-auto my-3 py-3">
        <h2 class="mb-3">Statrt A Discussion</h2>

        <?php

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
          echo '<form action="'.$_SERVER['REQUEST_URI'].'" method="POST">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label m-0">Problem Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label m-0">Ellaborate Your Concern</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3"></textarea>
                    </div>
                    <input type="hidden" name="userid" value="'.$_SESSION['userid'].'">
                    <button class="btn btn-success" type="submit">submit</button>
                </form>';
            }
            else {
               echo  '<p class="restrictUser mb-0 text-danger">Need to login your account otherwise you are not able to ask your problems.. </p>';
            }
        ?>
    </div>

    <h3 class="w-75 mx-auto my-3">Browse Questions</h3>
    <div class="w-75 mx-auto my-1"></div>



    <?php

        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result=mysqli_query($conn, $sql);
        
        $numRows=mysqli_num_rows($result);
        if($numRows>0){
            while($row = mysqli_fetch_assoc($result)){
                $id=$row['thread_id'];
                $desc=$row['thread_desc'];
                $title=$row['thread_title'];
                $time=$row['timestamp'];
                $thread_user_id=$row['thread_user_id'];

                $sql2="SELECT user_email FROM `users` WHERE `user_id`='$thread_user_id'";
                $result2=mysqli_query($conn,$sql2);

                $row2 = mysqli_fetch_assoc($result2);


                $user_email=$row2["user_email"];

                echo '<div class="th-sec-2 w-75 mx-auto my-3 "> 
                        <div class="bg-primary mx-0 py-0 px-1 d-flex justify-content-between">
                            <div class="m-0 d-flex align-items-center">
                                <img src="images/profile.png" class="m-0 p-0" style="width:30px; height:30px;">
                                <p class="m-0 mb-1 text-warning ms-0"><b>'.$user_email.'</b></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class=" m-1 ms-1"><b>
                                        <svg xmlns="http://www.w3.org/2000/svg"  width="20" height="20" fill="currentColor" class="bi bi-pen text-warning" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                        </svg>
                                </b></p>
                                <p class=" m-1 ms-1"><b>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                                </b></p>
                                <h5 class="m-0 text-light">'.$time.'</h5>
                            </div>
                        </div>
                        <div class="2-child mx-3">
                            <a href="thread.php?threadid='.$id.'">'.$title.'</a>
                            <p>'.$desc.'</p>
                        </div>
                    </div>';
            }
        }
        else {
                echo '<div class="w-75 mx-auto emptycontainer mb-3 py-3"><p class="display-6 text-center">You are the first one to start discussion and ask your problem related to this category..</p></div>';
            }
        ?>






    <?php include 'partials/_footer.php'?>
    <!-- Bootstrap 'JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>