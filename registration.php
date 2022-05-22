<?php
include("header.php");

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
        <form class="contact-us-form shadow-lg p-3 mb-5 bg-body rounded gy-5" action="registration.php" method="post">
            <div class="row">
            <h3 class="contact-us-header1 text-success">Register With Us</h3>
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
			<div class="mb-3  col">
                <label for="exampleInputEmail1" class="form-label">Gender</label>
                <input type="text" class="form-control border-success" name="gender" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div><label for="inlineCheckbox1" class="form-label">Classes</label></div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name = "zumba" type="checkbox" id="inlineCheckbox1" value="option1">
                <label class="form-check-label" for="inlineCheckbox1">Zumba</label>
            </div>
             <div class="form-check form-check-inline">
                <input class="form-check-input" name="aerobics" type="checkbox" id="inlineCheckbox2" value="option2">
                <label class="form-check-label" for="inlineCheckbox2">Aerobics</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="pilates" type="checkbox" id="inlineCheckbox3" value="option3">
                <label class="form-check-label" for="inlineCheckbox3">Pilates</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="powerfit" type="checkbox" id="inlineCheckbox4" value="option4">
                <label class="form-check-label"  for="inlineCheckbox3">Powerfit</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="boxing" type="checkbox" id="inlineCheckbox5" value="option5">
                <label class="form-check-label" for="inlineCheckbox3">Boxing</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="crossfit" type="checkbox" id="inlineCheckbox6" value="option6">
                <label class="form-check-label" for="inlineCheckbox3">crossfit</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input"  name="spinning" type="checkbox" id="inlineCheckbox7" value="option7">
                <label class="form-check-label" for="inlineCheckbox3">spinning</label>
            </div>
			<div class="mb-3  col my-4">
                <label for="exampleInputEmail1" class="form-label">Subscription</label>
                <div class="form-check">
                    <input class="form-check-input" name="daily" type="checkbox" value="option8" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Daily
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="weekly" type="checkbox" value="option9" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Weekly
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="monthly" type="checkbox" value="option0" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Monthly
                    </label>
                </div>
            </div>
			<div class="mb-3  col">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" class="form-control border-success" name="password" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
			<div class="mb-3  col">
                <label for="user_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control border-success" name="password1" id="user_password" aria-describedby="emailHelp">
            </div>
            <button type="submit" name="submit" value="send form" class="btn align-center btn-outline-success rounded-pill">Register</button>
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
	$user_password = $_POST["password"];
    $gender = $_POST["gender"];

    if (isset($_POST['zumba']))
    {
        $class = 'zumba';
    }
    if (isset($_POST['aerobics']))
    {
        $class = 'aerobics';
    }
    if (isset($_POST['pilates']))
    {
        $class = 'pilates';
    }
    if (isset($_POST['powerfit']))
    {
        $class = 'powerfit';
    }
    if (isset($_POST['boxing']))
    {
        $class = 'boxing';
    }
    if (isset($_POST['crossfit']))
    {
        $class = 'crossfit';
    }
    if (isset($_POST['spinning']))
    {
        $class = 'spinning';
    }
    if (isset($_POST['daily']))
    {
        $subscriptiond = 'daily';
    }
    if (isset($_POST['weekly']))
    {
        $subscription = 'weekly';
    }
    if (isset($_POST['monthly']))
    {
        $subscription = 'monthly';
    }

    // validate user input
    // store the validated values in the database
    insert_into_user($f_name, $l_name, $gender, $email_addr, $phone_number, $user_password, $class, $subscription);

    echo '<script type="text/javascript">';
    echo 'alert("Registered Successfuly")';
    echo '</script>';
}

include("footer.php");
?>