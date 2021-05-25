<?php
session_start();


echo '<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container-fluid">
        <a class="navbar-brand ms-2" href="/itforum">Find Your Solution</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item mx-1">
                    <a class="nav-link active font-size-nav-item" aria-current="page" href="/itforum">Home</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link active font-size-nav-item" href="/itforum/about.php">About</a>
                </li>
                <li class="nav-item dropdown mx-1">
                    <a class="nav-link active font-size-nav-item" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                       Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

                        $sql = "SELECT * FROM `categories` LIMIT 4";
                        $result= mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            $id=$row["category_id"];
                       echo '<li><a class="dropdown-item" href="threadlists.php?catid='.$id.'">'.$row['category_name'].'</a></li>';
                    }

              echo '</ul>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link active font-size-nav-item" href="/itforum/contact.php">ContactUs</a>
                </li>
                <li class="nav-item m-1">
                    <button class="btn btn-outline-warning px-2 py-1" aria-current="page" data-bs-toggle="modal"90
                        data-bs-target="#exampleModal">
                        Search
                    </a></button>
                </li>';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {

    echo '<li class="nav-item m-1">
            <p class="text-light px-1 py-0 my-2">
              Welcome-'.$_SESSION['email'].'
            </p>
        </li>
        <li class="nav-item m-1">
           <a class="btn btn-outline-info px-2 py-1" aria-current="page" href="partials/_handlelogout.php"> 
                LogOut
            </a>
        </li>';

}
else {
    
    echo '<li class="nav-item m-1">
            <button class="btn btn-outline-info px-3 py-1" aria-current="page" data-bs-toggle="modal" data-bs-target="#loginModal"> 
                LogIn
            </a></button>
        </li>
        <li class="nav-item m-1">
            <button class="btn btn-outline-info px-2 py-1" aria-current="page" data-bs-toggle="modal"
                data-bs-target="#signupModal"> 
                SignUp</button>
        </li>';
}


       echo '</ul>

        </div>
    </div>
    </nav>

    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-3">
                <form class="d-flex" action="search.php" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search1">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>';



    include 'partials/_login.php';
    include 'partials/_signup.php';

    if (isset($_GET['signupsucces']) && $_GET['signupsucces']=="true") {
        echo '<div class="alert alert-'. substr($_GET['showAlert'],0,9) .' alert-dismissible fade show my-0" role="alert">
                    <strong>'. substr($_GET['showAlert'],9,100) .'!</strong> '. $_GET['showError'] .'..
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
?>
