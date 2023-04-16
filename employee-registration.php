<?php
$title = 'Register';
require('includes/header.php');
?>
<main>
    <h2>Registration</h2>
    <h5>Passwords must be a minimum of 8 characters, including 1 digit, 1 upper-case letter, and 1 lower-case letter.</h5>
    <!-- start of form -->
    <form action="save-employee-registration.php" method="post">
        <fieldset>
            <label for="username">Username *</label>
            <input type="email" name="username" id="username"
                placeholder="email@email.com" required>
        </fieldset>
        <!-- end of form -->
        <!-- start of password -->
        <fieldset>
            <label for="password">Password *</label>
            <input type="password" name="password" id="password"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
        </fieldset>
        <!-- end of password -->
        <!-- start of confirm -->
        <fieldset>
            <label for="confirm"></label>
            <input type="password" name="confirm" id="confirm"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
        </fieldset>
        <!-- end of confirm -->
        <button>Register</button>
    </form>
    <p>Already have an account? <a href="employee-login.php">Login</a></p>
    <!-- end of form -->
</main>
<?php require('includes/footer.php'); ?>

<!-- Step 9: Create employee registration page -->
<!-- Copy form from admin registration and change action attribute -->

<!-- Next: Create page that checks login credential validity, employee-validate.php -->