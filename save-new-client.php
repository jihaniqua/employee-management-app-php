<?php
require('includes/admin-auth.php');

$title = 'Saving new client...';
require('includes/header.php');
?>
<main>
    <?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $valid = true;

    // check if name field is empty
    if (empty($name)) {
        echo '<p class="error">Client name is required.</p>';
        $valid = false;
    }

    // check if password is empty
    if (empty($email)) {
        echo '<p class="error">Email is required.</p>';
        $valid = false;
    }

    // check if email format is invalid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<p class="error">Email format is invalid.</p>';
        $valid = false;
    }

    // check if the phone field is empty
    // if empty, set the phone variable to nul
    if (empty($phone)) {
        $phone = null;
    }

    // if all are valid
    if ($valid == true) {
        // connect to database
        require('includes/db.php');

        // query to insert new client data
        $sql = "INSERT INTO optproj_clients (name, email, phone) VALUES (:name, :email, :phone)";
        $cmd = $db->prepare($sql);
        // bind form values to variables
        $cmd->bindParam(':name', $name, PDO::PARAM_STR, 50);
        $cmd->bindParam(':email', $email, PDO::PARAM_STR, 50);
        $cmd->bindParam(':phone', $phone, PDO::PARAM_STR, 20);
        $cmd->execute();

        // display success message
        echo '<h1>Client was successfully added</h1>
            <p><a href="clients.php">See updated client list</a></p>';
    }
    
    // disconnect to database
    $db = null;
    ?>
</main>

<!-- Step 18: Create that saves new client -->
<!-- Next: Add page to edit client, edit-clients.php -->