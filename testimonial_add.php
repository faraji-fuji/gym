<?php
include ("header.php");
?>

<div class="container-fluid my-contact-us">
    <div class="row justify-content-center">
        <form class="contact-us-form shadow-lg p-3 mb-5 bg-body rounded gy-5" action="testimonial_add.php" method="post">
            <div class="row">
                <h3 class="contact-us-header1 text-success">Write a Testimonial</h3>
            </div>
            <div class="col">
                    <label for="contact-name" class="form-label">Class Name</label>
                    <input type="text" id="contact-first-name" name="class_name" class="form-control border-success" placeholder="e.g. Zumba" aria-label="Class Name">
            </div>
            <div class="col">
                <label for="contact-name" class="form-label">Date</label>
                <input type="text" id="contact-last-name" name="testimonial_date" class="form-control border-success" placeholder="e.g 25-12-2022" aria-label="Date">
            </div>
            <div class="mb-3  col">
                <label for="exampleFormControlInput1" class="form-label">First Name</label>
                <input type="text" class="form-control border-success" name = "f_name" id="exampleFormControlInput1" placeholder="e.g. John">
            </div>
            <div class="mb-3 col">
                <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                <textarea class="form-control border-success" name="user_comment" id="exampleFormControlTextarea1" rows="5"></textarea>
            </div>
            <button type="submit" name="submit" value="send form" class="btn align-center btn-outline-success rounded-pill">Post</button>
        </form> 
    </div>  
</div>


<?php
    if (isset($_POST['submit']))
    {
        $class_name = $_POST['class_name'];
        $testimonial_date = $_POST['testimonial_date'];
        $first_name = $_POST['f_name'];
        $comment = $_POST['user_comment'];

        //define function to insert user input into the database
        insert_into_testimonial($class_name, $testimonial_date, $first_name, $comment);
        echo '<script type="text/javascript">';
        echo 'alert("Your testimonial has been added Successfuly!")';
        echo '</script>';
    }

?>