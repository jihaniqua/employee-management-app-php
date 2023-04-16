<?php
$title = 'Saving your registration...';
require('includes/header.php');
?>
<main>
    <?php
    // try {
        // retrieve form field values from registration
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        // set timezone adn format
        date_default_timezone_set("America/Toronto");
        $dateCreated = date("y-m-d h:i");

        $valid = true;

        // check if username is empty
        if (empty($username)) {
            echo '<p class="error">Username is required.<p>';
            $valid = false;
        }

        // check if username format is invalid
        if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            echo '<p class="error">Email format is invalid.<p>';
            $valid = false;
        }

        // check if password is empty
        if (empty($password)) {
            echo '<p class="error">Password is required.</p>';
            $valid = false;
        }

        // check if the two passwords doesn't match
        if ($password != $confirm) {
            echo '<p class="error">Passwords must match.</p>';
            $valid = false;
        }

        // if all are valid
        if ($valid == true) {
            // connect to database
            require('includes/db.php');

            // query to check if user exists
            $sql = "SELECT * FROM optproj_employee WHERE username = :username";
            $cmd = $db->prepare($sql);
            // bind username to variable
            $cmd->bindParam('username', $username, PDO::PARAM_STR, 50);
            $cmd->execute();
            $user = $cmd->fetch();

            // create new user if username doesn't exist in the database
            if (empty($user)) {
                // query to insert new user data
                $sql = "INSERT INTO optproj_employee (username, password, dateCreated) VALUES (:username, :password, :dateCreated)";
                $cmd = $db->prepare($sql);
                // bind username to variable
                $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
                // hash password
                $password = password_hash($password, PASSWORD_DEFAULT);
                // bind hashed password to variable
                $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
                // bind date to variable
                $cmd->bindParam(':dateCreated', $dateCreated, PDO::PARAM_STR);
                $cmd->execute();

                // display success message
                echo '<h1>Your registration was successful</h1>
                    <p><a href="employee-login.php">Login to your account</a></p>';
            }
            else {
                echo '<p class="error">User already exists.</p>';
            }

            // disconnect to database
            $db = null;
        }
    // }
    // catch (Exception $error) {
    //     header('location:error.php');
    //     exit();
    // }
    ?>
</main>
<?php require('includes/footer.php'); ?>

<!-- Step 10: Save registered details to database -->
<!-- Copy code from save admin registration, change sql query and success message link -->
<!-- Test if working -->

<!-- Next: Create employee login page, employee-login.php -->