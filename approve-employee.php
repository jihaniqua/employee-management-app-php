<?php
require('includes/admin-auth.php');

$title = 'Saving changes...';
require('includes/header.php');
?>
<main>
    <?php
    // retrieve employeeId and access data from POST
    $access = $_POST['access'];

    $valid = true;

    // if there are no access selected
    if (empty($access)) {
        echo '<p class="error">Choose to approve or deny employee access is required.</p>';
        $valid = false;
    }

    // if valid, save changes and show success message
    if ($valid == true) {
        // connect to database
        require('includes/db.php');

        // query to update employee access based on the employeeId
        $sql = "UPDATE optproj_employee SET access = :access WHERE employeeId = :employeeId";
        $cmd = $db->prepare($sql);

        // bind all values for each employee
        foreach ($access as $employeeId => $selectedValue) {
            $cmd->bindParam(':employeeId', $employeeId, PDO::PARAM_INT);
            $cmd->bindParam(':access', $selectedValue, PDO::PARAM_STR, 10);
            $cmd->execute();
        }

        // disconnect to database
        $db = null;

        // display success message
        echo '<h1>Updated successfully</h1>
            <p><a href="employees.php">See updated employee list</a></p>';
    }
    ?>
</main>
<?php require('includes/footer.php'); ?>

<!-- Step 15: Create page that updates employee access changes -->

<!-- Next: Create clients page, clients.php -->