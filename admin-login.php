<?php
$title = 'Admin Login';
require('includes/header.php');
?>
<main>
    <h2>Admin Login</h2>
    <!-- start of php code -->
    <?php
    try {
        // return from admin-validate.php
        // if username field is not empty and matched hashed password exists
        if (!empty($_GET['valid'])) {
            echo '<h5 class="error>Invalid Login</h5>';
        }
        else {
            echo '<h5>Please enter your credentials.</h5>';
        }
    }
    catch (Exception $error) {
        header('location:error.php');
        exit();
    }
    ?>
    <!-- end of php code -->
    <!-- start of form -->
    <form action="admin-validate.php" method="post">
        <fieldset>
            <label for="username">Username</label>
            <input type="email" name="username" id="username"
                placeholder="email@email.com" required />
        </fieldset>
        <fieldset>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required />
        </fieldset>
        <button>Login</button>
    </form>
    <p>Not yet registered? <a href="admin-registration.php">Sign up</a></p>
    <!-- end of form -->
</main>
<?php require('includes/footer.php'); ?>

<!-- Step 5: Create admin login page -->
<!-- Make sure you have a table in the database -->
<!-- Next: Create admin validate page, admin-validate.php -->

<!-- Step 7: Add validation message -->
<!-- Next: Create admin dashboard page, admin-home.php -->