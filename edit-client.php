<?php
require('includes/admin-auth.php');

$title = 'Edit Client Details';
require('includes/header.php');
?>
<main>
    <?php
    $id = $_GET['id'];

    if (empty($id)) {
        header('location:404.php');
        exit();
    }

    // connect to database
    require('includes/db.php');

    // query to get client details
    $sql = "SELECT * FROM optproj_clients WHERE id = :id";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':id', $id, PDO::PARAM_INT);
    $cmd->execute();
    $client = $cmd->fetch();

    if (empty($client)) {
        header('location:404.php');
        exit();
    }
    ?>
    <h1>Edit client details</h1>
    <form action="update-client.php" method="post">
         <!-- start of name field -->
         <fieldset>
            <label for="name">Client Name *</label>
            <input type="text" name="name" id="name" 
                value="<?php echo $client['name']; ?>" required>
        </fieldset>
        <!-- end of name field -->
        <!-- start of email field -->
        <fieldset>
            <label for="email">Email *</label>
            <input type="email" name="email" id="email"
                placeholder="email@email.com" 
                value="<?php echo $client['email']; ?>" required>
        </fieldset>
        <!-- end of email field -->
        <!-- start of phone field -->
        <fieldset>
            <label for="phone">Phone</label>
            <input type="tel" name="phone" id="phone" 
                placeholder="123-456-7890" 
                pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                value="<?php echo $client['phone']; ?>">
        </fieldset>
        <!-- end of phone field -->
        <!-- Hidden userId field so that the value is still included in the form  -->
        <input type="hidden" name="id" id="id" 
            value="<?php echo $client['id']; ?>">
        <button>Save Changes</button>
    </form>
</main>
<?php require('includes/footer.php'); ?>

<!-- Step 19: Create page that edit client details -->
<!-- Next: Add page save changes, update-client.php -->