<?php
session_start();
include ('connect.php');
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
                    <a class="navbar-brand my-brand col-3 mx-5" href="#">Gym</a>
                    <div class="navbar-collapse col" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="class.php">Classes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="registration.php">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact_us.php">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="testimonial.php">Testimonials</a>
                            </li>
                        </ul>
                    </div>
                    <button class="btn btn-outline-success col-2 mx-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Login</button>
                </div>
            </nav>
      </header>
    <div class="my-gutter shadow bg-success sticky-top"></div>
    <div class="offcanvas offcanvas-end bg-body" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Please Login</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container">
                <div class="row">
                    <form action="header.php" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control border border-success" name='email_addr' id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control border border-success" name='password' id="exampleInputPassword1">
                        </div>
                        <button type="submit" name="login" class="btn btn-outline-success">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
function my_login()
{
    global $server_name, $user_name, $password, $query_create_database, $db_name;

    $user_mail = $_POST['email_addr'];
    $connect = mysqli_connect("$server_name", "$user_name", "$password", "$db_name");
    $sql = "SELECT * FROM user WHERE email = '$user_mail'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);    
    $email =  $row[3];
    $my_user_password = $row[5];

    if ($_POST['email_addr'] == $email && $_POST['password'] == $my_user_password)
    {

        $_SESSION['valid'] = TRUE;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = $email;

        if ($email == "admin@sewa.com")
        {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "header_admin.php"';
            echo '</script>';
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "header_member.php"';
            echo '</script>';
        }
    }
    else 
    {
        echo '<script type="text/javascript">';
        echo 'alert("Wrong Username or Password!")';
        echo '</script>';
    }
}
if(isset($_POST['login']))
{
    my_login();
}
include('footer.php');
?>