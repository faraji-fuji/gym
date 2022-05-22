<?php

// initialize global variables
$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "gym";

// store MYSQL queries in variables
$query_create_database = "CREATE DATABASE $db_name";
$query_use_database_gym = "USE $db_name;";

$query_create_table_page = "CREATE TABLE page(
    page_id INT NOT NULL AUTO_INCREMENT, 
    new_classes VARCHAR(1000) NOT NULL,
    events VARCHAR(1000) NOT NULL,
    special_offers VARCHAR(1000) NOT NULL,
    PRIMARY KEY(page_id)
);";

$query_create_table_class = "CREATE TABLE class(
    title VARCHAR(20) NOT NULL, 
    class_description_brief VARCHAR(1500) NOT NULL,
    class_description_full VARCHAR(1500) NOT NULL,
    image_path VARCHAR(100) NOT NULL,
    PRIMARY KEY(title)
);";

$query_create_table_testimonial = "CREATE TABLE testimonial(
    testimonial_id INT NOT NULL AUTO_INCREMENT,
    class_name VARCHAR(30) NOT NULL,
    testimonial_date VARCHAR (30) NOT NULL,
    first_name VARCHAR (50),
    comment VARCHAR (1500),
    approved VARCHAR(10),
    PRIMARY KEY(testimonial_id)
);";
    

$query_create_table_contact_us = "CREATE TABLE contact_us(
    contact_id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    f_name VARCHAR(200) NOT NULL,
    l_name VARCHAR(200) NOT NULL,
    phone_no INT(20) NOT NULL,
    user_message VARCHAR(1500) NOT NULL,
    PRIMARY KEY (contact_id)
);";

// query to create user table
$query_create_table_user = "CREATE TABLE user(
	f_name VARCHAR(20) NOT NULL,
	l_name VARCHAR(20) NOT NULL,
    gender VARCHAR(20) NOT NULL,
	email VARCHAR(50) NOT NULL UNIQUE,
	phone_no INT(20) NOT NULL,
	user_password VARCHAR(20) NOT NULL,
    class VARCHAR(50),
    subscription VARCHAR(50),
    PRIMARY KEY (email)
);";

// query to create fee table
$query_create_table_fee = "CREATE TABLE fee(
    fee_id INT NOT NULL AUTO_INCREMENT,
	title VARCHAR(20) NOT NULL,
	price INT(4) NOT NULL,
    benefit VARCHAR(500),
    PRIMARY KEY(fee_id)
);";

// define functions
// function to make initial database connection and create database
function initial_db_connection(){
    global $server_name, $user_name, $password, $query_create_database;
    $db_connection = mysqli_connect($server_name, $user_name, $password);
    mysqli_query($db_connection, $query_create_database);
    mysqli_close($db_connection);
}

// create user table
function create_user_table(){
	global $server_name, $user_name, $password, $query_create_table_user, $db_name;
	$db_connection = mysqli_connect($server_name, $user_name, $password, $db_name);
    $user_table = mysqli_query($db_connection, $query_create_table_user);
    if ($user_table == FALSE){
        echo "Failed to create user table";
    }
    mysqli_close($db_connection);
}

//create testimonial table
function create_testimonial_table(){
    global $server_name, $user_name, $password, $query_create_table_testimonial, $db_name;
	$db_connection = mysqli_connect($server_name, $user_name, $password, $db_name);
    $user_table = mysqli_query($db_connection, $query_create_table_testimonial);
    if ($user_table == FALSE){
        echo "Failed to create testimonial table";
    }
    mysqli_close($db_connection);
}

// create contact_us table
function create_contact_us_table(){
    global $server_name, $user_name, $password, $query_create_table_contact_us, $db_name;
    $db_connection = mysqli_connect($server_name, $user_name, $password, $db_name);
    $contact_us_table = mysqli_query($db_connection, $query_create_table_contact_us);
    if ($contact_us_table == FALSE){
        echo "Failed to create contact_us table";
    }
    mysqli_close($db_connection);
}

// create class table
function create_class_table(){
    global $server_name, $user_name, $password, $query_create_table_class, $db_name;
    $db_connection = mysqli_connect($server_name, $user_name, $password, $db_name);
    $class_table = mysqli_query($db_connection, $query_create_table_class);
    if ($class_table == FALSE){
        echo "Failed to create class table";
    }
    mysqli_close($db_connection);
}

// create page table
function create_page_table(){
    global $server_name, $user_name, $password, $query_create_table_page, $db_name;
    $db_connection = mysqli_connect($server_name, $user_name, $password, $db_name);
    $page_table = mysqli_query($db_connection, $query_create_table_page);
    if ($page_table == FALSE){
        echo "Failed to create page table";
    }
    mysqli_close($db_connection);
}

//create fee table
function create_fee_table(){
    global $server_name, $user_name, $password, $query_create_table_fee, $db_name;
    $db_connection = mysqli_connect($server_name, $user_name, $password, $db_name);
    $fee_table = mysqli_query($db_connection, $query_create_table_fee);
    if ($fee_table == FALSE){
        echo "Failed to create fee table";
    }
    mysqli_close($db_connection);
}

// insert values into contact_us table
function insert_into_contact_us($email, $f_name, $l_name, $phone_no, $user_message){
    global $server_name, $user_name, $password, $query_insert_into_contact_us, $db_name;
    $query_insert_into_contact_us = "INSERT INTO contact_us(email, f_name, l_name, phone_no, user_message) VALUES ('$email', '$f_name', '$l_name', $phone_no, '$user_message')";
    $db_connection = mysqli_connect($server_name, $user_name, $password, $db_name);
    mysqli_query($db_connection, $query_insert_into_contact_us);
    mysqli_close($db_connection);
}

// insert values into class table
function insert_into_class($title, $class_description_brief, $class_description_full, $image_path){
    global $server_name, $user_name, $db_name, $password, $query_insert_into_class;
    $query_insert_into_class = "INSERT INTO class(title, class_description_brief, class_description_full, image_path) VALUES('$title', '$class_description_brief', '$class_description_full', '$image_path')";
    $db_connection = mysqli_connect($server_name, $user_name, $password, $db_name);
    mysqli_query($db_connection, $query_insert_into_class);
    mysqli_close($db_connection);
}

// insert values into user table
function insert_into_user($f_name, $l_name, $gender, $email_addr, $phone_number, $user_password, $class, $subscription){
    global $server_name, $user_name, $password, $db_name;
    $query_insert_into_user = "INSERT INTO `user` (`f_name`, `l_name`, `gender`, `email`, `phone_no`, `user_password`, `class`, `subscription`) VALUES
	('$f_name', '$l_name', '$gender', '$email_addr', '$phone_number', '$user_password', '$class', '$subscription');";
    $db_connection = mysqli_connect($server_name, $user_name, $password, $db_name);
    $res = mysqli_query($db_connection, $query_insert_into_user);
    mysqli_close($db_connection);
}

//insert values into testimonial table
function insert_into_testimonial($class_name, $testimonial_date, $first_name, $comment){
    global $server_name, $user_name, $password, $db_name;
    $query_insert_into_testimonial = "INSERT INTO `testimonial` (`testimonial_id`, `class_name`, `testimonial_date`, `first_name`, `comment`, `approved`) VALUES
	(NULL, '$class_name', '$testimonial_date', '$first_name', '$comment', 'no');";
    $db_connection = mysqli_connect($server_name, $user_name, $password, $db_name);
    mysqli_query($db_connection, $query_insert_into_testimonial);
    mysqli_close($db_connection);
}

//insert values into fee
function insert_into_fee($title, $price, $benefit) {
	global $server_name, $user_name, $password, $db_name, $query_insert_into_fee;
	$query_insert_into_fee = "INSERT INTO `fee` (`fee_id`, `title`, `price`, `benefit`) VALUES 
    (NULL, '$title', '$price', '$benefit')";
	$db_connection = mysqli_connect($server_name, $user_name, $password, $db_name);
    mysqli_query($db_connection, $query_insert_into_fee);
    mysqli_close($db_connection);
}

//insert values into page
function insert_into_page($new_classes, $events, $special_offers) {
	global $server_name, $user_name, $password, $db_name, $query_insert_into_fee;
	$query_insert_into_page = "INSERT INTO `page` (`page_id`, `new_classes`, `events`, `special_offers`) VALUES 
    (NULL, '$new_classes', '$events', '$special_offers')";
	$db_connection = mysqli_connect($server_name, $user_name, $password, $db_name);
    mysqli_query($db_connection, $query_insert_into_page);
    mysqli_close($db_connection);
}
?>