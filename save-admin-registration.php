<?php
$title = 'Saving your registration...';
require('includes/header.php');
?>
<main>
    <?php
    try {
        // retrieve form field values from registration
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];

        $valid = true;

        // check if username is empty
        if (empty($username)) {
            echo '<p class="error">Username is required.</p>';
            $valid = false;
        }

        // check if username format is invalid
        if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            echo '<p class="error">Email format is invalid.</p>';
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
            $sql = "SELECT * FROM optproj_admin WHERE username = :username";
            $cmd = $db->prepare($sql);
            // bind username to variable
            $cmd->bindParam('username', $username, PDO::PARAM_STR, 50);
            $cmd->execute();
            $user = $cmd->fetch();

            // create new user if username doesn't exist in the database
            if (empty($user)) {
                // query to insert new user data
                $sql = "INSERT INTO optproj_admin (username, password) VALUES (:username, :password)";
                $cmd = $db->prepare($sql);
                // bind username to variable
                $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
                // hash password
                $password = password_hash($password, PASSWORD_DEFAULT);
                // bind hashed password to variable
                $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
                $cmd->execute();

                // display success message
                echo '<h1>Your registration was successful</h1>
                    <p><a href="admin-login.php">Login to your account</a></p>';
            }
            else {
                echo '<p class="error">User already exists.</p>';
            }

            // disconnect to database
            $db = null;
        }
    }
    catch (Exception $error) {
        header('location:error.php');
        exit();
    }
    ?>
</main>
<?php require('includes/footer.php'); ?>

<!-- Step 5: Save registered details to database -->
<!-- Test if working -->

<!-- Next: Create general error page, error.php -->
<!-- Next: Create admin login page, admin-login.php -->
