<?php 
include('header.php');

$status = 'yes';
$sql = "SELECT * FROM `testimonial` WHERE approved = '$status'";
$link = mysqli_connect($server_name, $user_name, $password, $db_name);
$result = mysqli_query($link, $sql, MYSQLI_USE_RESULT);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($rows as $row)
{
    $testimonial_first_name = $row['first_name'];
    $testimonial_comment = $row['comment'];

    echo '<div class="container my-4">';
    echo '<div class="row justify-content-center">';
    echo '<div class="card border-success mb-3 shadow p-3 mb-5 bg-body rounded" style="max-width: 40rem;">';
    echo '<div class="card-header">'."$testimonial_first_name".'</div>';
    echo '<div class="card-body text-success">';
    echo '<p class="card-text">'."$testimonial_comment".'</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';    
    echo '</div>';
}

include('footer.php');
?>