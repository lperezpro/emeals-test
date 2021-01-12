<!DOCTYPE html>
<html lang="en">
<head>
    <title>eMeals | Sign Up</title>

    <link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#99c74a">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#99c74a">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/javascript.js"></script>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    header('location:welcome');
}
?>
<div class="wrapper fadeInDown">
    <div id="formContentSignup">
        <!-- Header -->
        <div id="formHeader">
            <p class="underlineHover">Sign Up</p>
        </div>

        <!-- Login Form -->
        <form action="backend/signup.php" method="POST" id="signup">
            <div id="name-group" class="form-group">
                <label for="name"></label>
                <input type="text" id="name" class="fadeIn fadeInForm second" name="name" placeholder="Name"
                       required>
            </div>

            <div id="address-group" class="form-group">
                <label for="address"></label>
                <input type="text" id="address" class="fadeIn fadeInForm third" name="address" placeholder="Address"
                       required>
            </div>

            <div id="email-group" class="form-group">
                <label for="email"></label>
                <input type="email" id="email" class="fadeIn fadeInForm fourth" name="email" placeholder="Email"
                       required>
            </div>

            <div id="password-group" class="form-group">
                <label for="password"></label>
                <input type="password" id="password" class="fadeIn fadeInForm fifth" name="password"
                       placeholder="Password"
                       minlength="6" required>
            </div>

            <input type="submit" class="fadeIn fadeInForm last fadeInSubmit" value="Submit">
        </form>

        <!-- Sign Up -->
        <div id="formFooter">
            <a class="underlineHover" href="/">Login</a>
        </div>

    </div>
</div>
</body>
</html>