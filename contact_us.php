<?php
    //include the header file
    include('header.php')
?>

<!-- html form -->
<div class="container-fluid my-contact-us">
    <div class="row justify-content-center">
        <form class="contact-us-form shadow-lg p-3 mb-5 bg-body rounded gy-5" action="contact_us.php" method="post">
            <div class="row">
            <h3 class="contact-us-header1 text-success">Contact Us</h3>
                <div class="col">
                    <label for="contact-name" class="form-label">First Name</label>
                    <input type="text" id="contact-first-name" name="first_name" class="form-control border-success" placeholder="e.g. John" aria-label="First name">
                </div>
                <div class="col">
                    <label for="contact-name" class="form-label">Last Name</label>
                    <input type="text" id="contact-last-name" name="last_name" class="form-control border-success" placeholder="e.g Doe" aria-label="Last name">
                </div>
            </div>
            <div class="mb-3  col">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control border-success" name = "email_addr" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3  col">
                <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                <input type="numbers" class="form-control border-success" name="phone_number" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 col">
                <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                <textarea class="form-control border-success" name="user_message" id="exampleFormControlTextarea1" rows="5"></textarea>
            </div>
            <button type="submit" name="submit" value="send form" class="btn align-center btn-outline-success rounded-pill">Send</button>
        </form> 
    </div>  
</div>

<?php
// check whether submit button is set
// get values from post method
// store the values in the variables
if (isset($_POST["submit"])){
    $f_name = $_POST["first_name"];
    $l_name = $_POST["last_name"];
    $email_addr = $_POST["email_addr"];
    $phone_number = $_POST["phone_number"];
    $user_message = $_POST["user_message"];

    // validate user input

    // store the validated values in the database
    insert_into_contact_us($email_addr, $f_name, $l_name, $phone_number, $user_message);
    echo '<script type="text/javascript">';
    echo 'alert("Message Sent Successfuly")';
    echo '</script>';
}

include("footer.php");
?>