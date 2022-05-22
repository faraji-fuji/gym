<?php
//header
include("header.php");

//get title with method get
$selected_title = $_GET['class'];

//fetch the specified row from the database
$link = mysqli_connect($server_name, $user_name, $password, $db_name);
$sql = "SELECT * FROM class WHERE title = '$selected_title'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC); 

//store relevant values in variables
$title =  $row["title"];
$class_description_full = $row['class_description_full'];
$img =  $row["image_path"];
?>

<!-- html with dynamic content from the database -->
<div class="container-fluid my-4">
    <div class="row justify-content-evenly ">
        <div class="card mb-3 shadow p-3 mb-5 bg-body rounded" style="width: 50rem;" >
            <img src="<?php echo 'class-images/'.$img?>" class="card-img-top" alt="..." >
            <div class="card-body">
                <h5 class="card-title"><?php echo $title;?></h5>
                <p class="card-text"><?php echo $class_description_full;?></p>
            </div>
        </div>
    </div>
</div>
    

<?php
// footer
include ("footer.php");
?>