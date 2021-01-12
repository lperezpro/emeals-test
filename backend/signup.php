<?php
session_start();

$name = "";
$address = "";
$email = "";
$errors = array();
$data = array();

if (empty(trim($_POST['name']))) {
    $errors['name'] = 'Name is required.';
}

if (empty(trim($_POST['address']))) {
    $errors['address'] = 'Address is required.';
}

if (empty(trim($_POST['email']))) {
    $errors['email'] = 'Email is required.';
}

if (empty($_POST['password'])) {
    $errors['password'] = 'Password is required.';
} elseif (strlen($_POST['password']) < 6) {
    $errors['password'] = 'Password must be at least 6 characters.';
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

    global $conn;

    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $address = mysqli_real_escape_string($conn, trim($_POST['address']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // check database to make sure a user does not already exist with the same email
    $sql = "SELECT * FROM 'users' WHERE 'email'='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $errors['email'] = 'Email is already taken.';
    } else {
        // Finally, register user if there are no errors in the form
        if (empty($errors)) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (name, address, email, password) VALUES('$name', '$address' ,'$email', '$password_hash')";

            if (mysqli_query($conn, $sql)) {

                $_SESSION['email'] = $email;
                $data['success'] = true;


            } else {
                error_log("Error creating user");
                error_log(mysqli_error($conn));

                $data['success'] = false;
                $data['errors'] = $errors;
            }
        } else {
            $data['success'] = false;
            $data['errors'] = $errors;
        }
    }

}

header('Content-type: application/json', true, 200);
echo json_encode($data);
