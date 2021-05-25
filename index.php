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

    

    <!-- Start Carousel  -->
    <div class="container-fluid p-0 section-1">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/car1.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="">Fixing bug to going easy</h5>
                        <p>fix your bug of own computer, laptop, etc...</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/car2.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>programing problems are easy to solve</h5>
                        <p>Solve your all problems related to programing.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/car3.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Be a member of this platform</h5>
                        <p>Being member of this platform by doing signup of your account.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- End Carousel  -->




    <!-- start categories -->
    <div class="container section-2">

        <div class="first_child">
            <h2 class="text-center mt-5 mb-1">Explore Your Categories</h2>
            <div class="border_line mx-auto mt-0 mb-3 w-75"></div>
        </div>

        <div class="second_child my-2 py-3">

            <div class="row mx-auto gy-3">


                <!-- Fetching Category From Data Base -->
                <?php
              
              $sql="SELECT * FROM `categories`";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) {

                  $id=$row['category_id'];
                  $cat=$row['category_name'];
                  $desc=$row['category_description'];

                  echo '<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="card">
                                <img src="images/'.$cat.'.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="threadlists.php?catid='.$id.'">'.$cat.'</a></h5>
                                    <p class="card-text">'.substr($desc, 0, 110).'....</p>
                                    <a href="threadlists.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
                                </div>
                            </div>
                        </div>';
              }

              ?>







            </div>
        </div>


    </div>



    </div>

    <div class="container section-3">



    </div>

    <?php include 'partials/_footer.php'?>
    <!-- Bootstrap 'JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>