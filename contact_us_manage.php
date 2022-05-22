<?php
include ("header_admin.php");

//read messages from the database
$connection = mysqli_connect($server_name, $user_name, $password, $db_name);
if ($connection == FALSE)
{
    echo "bad connection";
    echo '<br>';
}
else
{
    $sql = "SELECT * FROM `contact_us`";
    $result = mysqli_query($connection, $sql, MYSQLI_USE_RESULT);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($rows as $row) {
        $f_name = $row["f_name"];
        $l_name = $row["l_name"];
        $user_message = $row["user_message"];

        echo '<div class="container my-4">';
        echo '<div class="row justify-content-center">';
        echo '<div class="card border-success mb-3 shadow p-3 mb-5 bg-body rounded" style="max-width: 40rem;">';
        echo '<div class="card-header">'."$f_name"." "."$l_name".'</div>';
        echo '<div class="card-body text-success">';
        echo '<p class="card-text">'."$user_message".'</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';    
        echo '</div>';
    }
}

mysqli_close($connection);
include ("footer.php");
?>