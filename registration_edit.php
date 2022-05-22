<?php
include ("header_admin.php");


$sql = "SELECT * FROM `fee`";
$link = mysqli_connect($server_name, $user_name, $password, $db_name);
$result = mysqli_query($link, $sql, MYSQLI_USE_RESULT);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($rows as $row)
{
    $title = $row['title'];
    $price = $row['price'];
    $benefits = $row['benefit'];

$content = <<< EOT
<div class="container-fluid my-contact-us">
    <div class="row justify-content-center">
        <div class="card text-bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header">$title</div>
            <div class="card-body">
                <h5 class="card-title">$price.00 $</h5>
                <p class="card-text">$benefits</p>
            </div>
        </div>
    </div>
</div>
EOT;

echo $content;
}
?>

<div class="container-fluid my-contact-us">
    <div class="row justify-content-center">
        <form class="contact-us-form shadow-lg p-3 mb-5 bg-body rounded gy-5" action="registration_edit.php" method="post">
            <div class="row">
            <h3 class="contact-us-header1 text-success">Update Registration Details</h3>
                <div class="col">
                    <label for="contact-name" class="form-label">Subscription</label>
                    <input type="text" id="contact-first-name" name="subscription" class="form-control border-success" placeholder="e.g. Daily" aria-label="First name">
                </div>
            </div>
            <div class="mb-3  col">
                <label for="exampleInputEmail1" class="form-label">Price</label>
                <input type="numbers" class="form-control border-success" name="price" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 col">
                <label for="exampleFormControlTextarea1" class="form-label">Benefits</label>
                <textarea class="form-control border-success" name="benefits" id="exampleFormControlTextarea1" rows="5"></textarea>
            </div>
            <button type="submit" name="submit" value="send form" class="btn align-center btn-outline-success rounded-pill">Update</button>
        </form> 
    </div>  
</div>


<?php
if (isset($_POST['submit']))
{
    $subscription = $_POST['subscription'];
    $price = $_POST['price'];
    $benefits = $_POST['benefits'];

    $link = mysqli_connect($server_name, $user_name, $password, $db_name);


    if ($price != "")
    {
        $sql = "UPDATE `fee` SET `price` = '$price' WHERE `fee`.`title` = '$subscription'";
        mysql_query($link, $sql);
    }
    if ($benefits != "")
    {
        $sql = "UPDATE `fee` SET `benefit` = '$benefits' WHERE `fee`.`title` = '$subscription'";
        mysql_query($link, $sql);
    }
    
    echo '<script type="text/javascript">';
    echo 'alert("Pricing Details Updated Successfully!")';
    echo '</script>';
    echo '<script type="text/javascript">';
    echo 'window.location.href = "registration_edit.php"';
    echo '</script>'; 
}
?>