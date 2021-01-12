<?php
session_start();

$errors = array();
$data = array();

if (empty($_POST['email'])) {
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

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) == 1) {
        while ($row = mysqli_fetch_array($query)) {
            if (password_verify($password, $row["password"])) {
                $_SESSION['email'] = $email;
                header("location:welcome");
                $data['success'] = true;
                $data['message'] = 'Success!';
            } else {
                $errors['password'] = 'Email or password does not match.';
                $data['success'] = false;
                $data['errors'] = $errors;
            }
        }
    } else {
        $errors['password'] = 'Email or password does not match.';
        $data['success'] = false;
        $data['errors'] = $errors;
    }
}

header('Content-type: application/json', true, 200);
echo json_encode($data);