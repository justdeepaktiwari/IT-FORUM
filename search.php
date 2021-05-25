<!-- connect to data base -->
<?php include 'partials/_dbconnect.php' ?>


<!DOCTYPE html>
<html lang="en">

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

    <div class="searchResults w-75 mx-auto my-5">

        <p class="display-6 mb-3">Search results for "<b class="text-danger"><?php echo $_GET["search"]?></b>"</p>

        <?php 

            $noresults=true;
            $query=$_GET["search"];
            $sql="SELECT * FROM threads WHERE MATCH (thread_title, thread_desc) against ('$query')";
            $result=mysqli_query($conn, $sql);
            while($row=mysqli_fetch_assoc($result)){
                $noresults=false;

                $title=$row["thread_title"];
                $desc=$row["thread_desc"];
                $id=$row["thread_id"];

            echo '<div class="result">
                    <a href="thread.php?threadid='.$id.'">'.$title.'</a>
                    <p>'.$desc.'</p>
                  </div>';
                }
            
            if ($noresults) {
                echo '<p class="display-6 mt-5 ms-5">
                Suggestions:<ul class="ms-5">
                    <li>Make sure that all words are spelled correctly.</li>
                    <li>Try different keywords.</li>
                    <li>Try more general keywords.</li>
                    <li>Try fewer keywords.</li>
                    </ul>
                </p>';
            }    
        ?>
    </div>
        <?php include 'partials/_footer.php'?>
        <!-- Bootstrap 'JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
        </script>
</body>

</html>