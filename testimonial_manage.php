<?php
include("header_admin.php");

$sql = "SELECT * FROM `testimonial`;";
$link = mysqli_connect($server_name, $user_name, $password, $db_name);
$result = mysqli_query($link, $sql, MYSQLI_USE_RESULT);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($rows as $row)
{
    $testimonial_first_name = $row['first_name'];
    $testimonial_comment = $row['comment'];
    $testimonial_id = $row['testimonial_id'];
    $approved_status = $row['approved'];

    echo '<div class="container my-4">';
    echo '<div class="row justify-content-center">';
    echo '<div class="card border-success mb-3 shadow p-3 mb-5 bg-body rounded" style="max-width: 40rem;">';
    echo '<h5 class="card-header">'."$testimonial_first_name".'</h5>';
    echo '<div class="card-body text-success">';
    echo '<h5 class="card-title">'."Testimonial Id: $testimonial_id."."  Aproved status: $approved_status".'</h5>';
    echo '<p class="card-text">'."$testimonial_comment".'</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';    
    echo '</div>';
}
?>


<div class="container-fluid my-contact-us">
    <div class="row justify-content-center">
        <form class="contact-us-form shadow-lg p-3 mb-5 bg-body rounded gy-5" action="testimonial_manage.php" method="post">
            <div class="row">
                <h3 class="contact-us-header1 text-success">Approve Testimonial</h3>
                <div class="col 2">
                    <label for="contact-name" class="form-label">Testimonial Id</label>
                    <input type="numbers" id="contact-first-name" name="approve_testimonial_id" class="form-control border-success" placeholder="e.g. John" aria-label="First name">
                </div>
            </div>
            <button type="submit" name="approve" value="send form" class="btn col 2 align-center btn-outline-success rounded-pill my-3">Approve</button>
            <button type="submit" name="disapprove" value="send form" class="btn col 2 align-center btn-outline-success rounded-pill my-3">Disaprove</button>
        </form> 
    </div>  
</div>

<?php
if (isset($_POST['approve']))
{
    $status = 'yes';
    $approve_testimonial_id = $_POST['approve_testimonial_id'];
    $sql = "UPDATE `testimonial` SET `approved` = '$status' WHERE `testimonial`.`testimonial_id` = '$approve_testimonial_id'";
    $link = mysqli_connect($server_name, $user_name, $password, $db_name);
    mysqli_query($link, $sql);
    mysqli_close($link);
    echo '<script type="text/javascript">';
    echo 'alert("Testimonial Approved!!")';
    echo '</script>';
}

if (isset($_POST['disapprove']))
{
    $status = 'no';
    $approve_testimonial_id = $_POST['approve_testimonial_id'];
    $sql = "UPDATE `testimonial` SET `approved` = '$status' WHERE `testimonial`.`testimonial_id` = '$approve_testimonial_id'";
    $link = mysqli_connect($server_name, $user_name, $password, $db_name);
    mysqli_query($link, $sql);
    mysqli_close($link);
    echo '<script type="text/javascript">';
    echo 'alert("Testimonial Disaproved!")';
    echo '</script>';
}

include('footer.php');
?>