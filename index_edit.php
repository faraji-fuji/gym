<?php
    include ("header_admin.php");



    // uncoment and initialize the variables to add new event, class or special offer
    // $new_class = "";
    // $event = "";
    // $special_offer = "";
    // insert_into_page("$new_class", "$event", "$special_offer");
    
    //read page table from the database
    $connection = mysqli_connect($server_name, $user_name, $password, $db_name);
    if ($connection == FALSE)
    {
        echo "bad connection";
        echo '<br>';
    }
    else
    {
        $sql = "SELECT * FROM `page`";
        $result = mysqli_query($connection, $sql, MYSQLI_USE_RESULT);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($rows as $row) {
            $new_classes = $row["new_classes"];
            $events = $row["events"];
            $special_offers = $row["special_offers"];
    
            echo '<div class="container my-4">';
            echo '<div class="row justify-content-center">';
            echo '<div class="card border-success mb-3 shadow p-3 mb-5 bg-body rounded" style="max-width: 40rem;">';
            echo '<div class="card-header"></div>';
            echo '<div class="card-body text-success">';
            echo '<p class="card-text">'."New Class: $new_classes".'</p>';
            echo '<p class="card-text">'."Event: $events".'</p>';
            echo '<p class="card-text">'."Special offer: $special_offers".'</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';    
            echo '</div>';
        }
    }    
    mysqli_close($connection);
    include ("footer.php");
?>