<?php
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     
    <!-- linke css files -->
    <link rel="stylesheet" href="css\header.css">
    <link rel="stylesheet" href="css\contact_us.css">
    <link rel="stylesheet" href="css\testimonials.css">
    <link rel="stylesheet" href="css\classes.css">


    <title>Gym</title>
  </head>
  <body>
  <div class="my-gutter shadow bg-success"></div>
        <header class="my-header">
            <nav class="navbar navbar-expand-lg navbar-dark bg-transparent sticky-top">
                <div class="container-fluid my-4">
                    <a class="navbar-brand my-brand col-3 mx-5" href="#">Gym member</a>
                    <div class="navbar-collapse col" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="class.php">Classes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact_us.php">Contact Us</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    More
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="testimonials.php">Testimonials</a></li>
                                    <li><a class="dropdown-item" href="testimonial_add.php">Write a Testimonial</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <a href="logout.php"><button type="button" class="btn btn-outline-success mx-5">Logout</button></a>
                </div>
            </nav>
      </header>
<?php 
include('footer.php');
?>