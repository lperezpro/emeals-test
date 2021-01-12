<?php
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '12345678';
$db_name = 'emeals';

//Code to see if database Exists
$conn = mysqli_connect($db_hostname, $db_username, $db_password);
if (!$conn) {
    error_log("Connection with database failed");
    error_log(mysqli_connect_error());
    die("Connection failed: " . mysqli_connect_error());
}
if (!mysqli_select_db($conn, $db_name)) {
    // Create database
    $sql = "CREATE DATABASE $db_name;";
    if (mysqli_query($conn, $sql)) {
    } else {
        error_log("Error creating database");
        error_log(mysqli_error($conn));
    }
}
mysqli_close($conn);

//Code to see if table Exists
$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
if (!$conn) {
    error_log("Connection with database failed");
    error_log(mysqli_connect_error());
    die('Error: ' . mysqli_connect_error());
}

$sql = "SELECT * FROM information_schema.tables
            WHERE table_schema = '$db_name'
            AND table_name = 'users'
            LIMIT 1;";
$exists = mysqli_query($conn, $sql);

if (mysqli_num_rows($exists) <= 0) {
    // Create table
    $sql = "CREATE TABLE users (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(255) NOT NULL,
                    address VARCHAR(255) NOT NULL,
                    email VARCHAR(255) NOT NULL UNIQUE,
                    password VARCHAR(255) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";

    if (!mysqli_query($conn, $sql)) {
        error_log("Error creating table");
        error_log(mysqli_error($conn));
    }
}
mysqli_close($conn);


$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
if (!$conn) {
    error_log("Unable to connect database");
    error_log(mysqli_error($conn));
    die;
}