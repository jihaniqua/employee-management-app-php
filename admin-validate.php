<?php
try {
    // retrieve input values from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // connect to database
    require('includes/db.php');

    // query to check if user exists
    $sql = "SELECT * FROM optproj_admin WHERE username = :username";
    $cmd = $db->prepare($sql);
    // bind username to variable
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
    $cmd->execute();
    // fetch user
    $user = $cmd->fetch();

    // check if username field is empty
    // if empty, go back to login page
    if (empty($user)) {
        $db = null;
        header('location:admin-login.php?valid=false');
    }
    else {
        // check if hashed password doesn't exist
        // if empty, go back to login page
        if (password_verify($password, $user['password']) == false) {
            $db = null;
            header('location:admin-login.php?valid=false');
            exit();
        }
        // if username field is not empty and matched hashed password exisits, redirect to admin home
        else {
            session_start();
            $_SESSION['user'] = $username;
            header('location:admin-home.php');

            // disconnect to database
            $db = null;
        }
    }
}
catch (Exception $error) {
    header('location:error.php');
    exit();
}
?>

<!-- Step 6: Create page that chcks login credential validity -->
<!-- Make sure database for admin exists -->

<!-- Next: Go back to admin login to display error message if login credentials are not valid -->
<!-- Next: Create admin dashboard page, admin-home.php -->