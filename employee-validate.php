<?php
try {
    // retrieve input values from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // connect to database
    require('includes/db.php');

    // query to check if user exists
    $sql = "SELECT * FROM optproj_employee WHERE username = :username";
    $cmd = $db->prepare($sql);
    // bind username to variable
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
    $cmd->execute();
    // fetch user
    $employee = $cmd->fetch();

    // check if employee doesn't exist, go back to login page
    if (empty($employee)) {
        $db = null;
        header('location:employee-login.php?valid=false');
    }
    elseif ($employee['access'] == 'Deny') {
        $db = null;
        header('location:employee-waitlist.php');
    }
    elseif ($employee['access'] == 'Approve') {
        // check if hashed password doesn't exist
        // if empty, go back to login page
        if (password_verify($password, $employee['password']) == false) {
            $db = null;
            header('location:employee-login.php?valid=false');
            exit();
        }
        else {
            // if username field is not empty and matched hashed password exisits, redirect to employee home
            session_start();
            $_SESSION['user'] = $username;
            header('location:employee-home.php');

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

<!-- Step 12: Create page that checks login credential validity -->
<!-- Make sure database for admin exists -->
<!-- Copy form from admin validation and change sql queries -->

<!-- Next: Create employee dashboard page, employee-home.php -->