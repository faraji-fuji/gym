<?php
include ("header_admin.php");

$sql = "SELECT * FROM `class`";
$link = mysqli_connect($server_name, $user_name, $password, $db_name);
$result = mysqli_query($link, $sql, MYSQLI_USE_RESULT);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($rows as $row)
{
    $class_title = $row['title'];
    $class_description_brief = $row['class_description_brief'];
    $class_description_full = $row['class_description_full'];
    $class_image_path = $row['image_path'];

    echo '<div class="container my-4">';
    echo '<div class="row justify-content-center">';
    echo '<div class="card shadow p-3 mb-5 bg-body rounded" style="width: 40rem; ">';
    echo '<div class="card-header">';
    echo "Class title: $class_title";
    echo '</div>';
    echo '<ul class="list-group list-group-flush">';
    echo '<li class="list-group-item">'."Brief description: $class_description_brief".'</li>';
    echo '<li class="list-group-item">'."Full description: $class_description_full".'</li>';
    echo '<li class="list-group-item">'."Image path: $class_image_path".'</li>';
    echo '</ul>';
    echo '</div>';
    echo '</div>';    
    echo '</div>';
}
?>

<div class="container-fluid my-contact-us">
    <div class="row justify-content-center">
        <form class="contact-us-form shadow-lg p-3 mb-5 bg-body rounded gy-5" action="class_details_edit.php" method="post">
            <div class="row">
            <h3 class="contact-us-header1 text-success">Edit Class Details</h3>
                <div class="col">
                    <label for="contact-name" class="form-label">Title</label>
                    <input type="text" id="contact-first-name" name="class_title" class="form-control border-success" placeholder="e.g. Zumba" aria-label="Class Title">
                </div>
            </div>
            <div class="mb-3 col my-2">
                <label for="exampleFormControlTextarea1" class="form-label">Brief Description</label>
                <textarea class="form-control border-success" name="class_description_brief" id="exampleFormControlTextarea1" rows="5"></textarea>
            </div>
            <div class="mb-3 col">
                <label for="exampleFormControlTextarea1" class="form-label">Full Description</label>
                <textarea class="form-control border-success" name="class_description_full" id="exampleFormControlTextarea1" rows="5"></textarea>
            </div>
            <div class="mb-3  col">
                <label for="exampleInputEmail1" class="form-label">Path to class image</label>
                <input type="text" class="form-control border-success" name="class_image_path" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" name="save" value="send form" class="btn align-center btn-outline-success rounded-pill">Save Changes</button>
        </form> 
    </div>  
</div>

<?php 

if(isset($_POST['save']))
{
    $f_class_title = $_POST['class_title'];
    $f_class_description_brief = $_POST['class_description_brief'];
    $f_class_description_full = $_POST['class_description_full'];
    $f_class_image_path = $_POST['class_image_path'];

    if ($f_class_description_brief != "")
    {
        $sql2 = "UPDATE `class` SET `class_description_brief` = '$f_class_description_brief' WHERE `class`.`title` = '$f_class_title'";
        mysqli_query($link, $sql2);
    }
    if ($f_class_description_full != "")
    {
        $sql3 = "UPDATE `class` SET `class_description_full` = '$f_class_description_full' WHERE `class`.`title` = '$f_class_title'";
        mysqli_query($link, $sql3);
    }
    if ($f_class_image_path != "")
    {
        $sql4 = "UPDATE `class` SET `image_path` = '$f_class_image_path' WHERE `class`.`title` = '$f_class_title'";
        mysqli_query($link, $sql4);
    }
    echo '<script type="text/javascript">';
    echo 'alert("Class Details Updated Successfully!")';
    echo '</script>';
    echo '<script type="text/javascript">';
    echo 'window.location.href = "class_details_edit.php"';
    echo '</script>'; 
}

include ("footer.php");
?>