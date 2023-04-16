<?php
require('includes/admin-auth.php');

$title = 'Add New Client';
require('includes/header.php');
?>
<main>
    <p><a href="clients.php">Back to client list</a></p>
    <h1>Add new client</h1>
    <!-- start of form -->
    <form action="save-new-client.php" method="post">
        <!-- start of name field -->
        <fieldset>
            <label for="name">Client Name *</label>
            <input type="text" name="name" id="name" required>
        </fieldset>
        <!-- end of name field -->
        <!-- start of email field -->
        <fieldset>
            <label for="email">Email *</label>
            <input type="email" name="email" id="email"
                placeholder="email@email.com" required>
        </fieldset>
        <!-- end of email field -->
        <!-- start of phone field -->
        <fieldset>
            <label for="phone">Phone</label>
            <input type="tel" name="phone" id="phone"
                placeholder="123-456-7890" 
                pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
        </fieldset>
        <!-- end of phone field -->
        <button>Add Client</button>
    </form>
    <!-- end of form -->
</main>
<?php require('includes/footer.php'); ?>

<!-- Step 17: Create page with form to add clients -->
<!-- Next: Add page to save new client, save-new-client.php -->