<?php
require('includes/admin-auth.php');

$title = 'Clients';
require('includes/header.php');
?>
<main>
    <p><a href="admin-home.php">Back to dashboard</a></p>
    <h1>List of Clients</h1>
    <p><a href="add-client.php">Add client</a></p>
    <?php
    // connect to database
    require('includes/db.php');

    // query to get client details in alphabetical order
    $sql = "SELECT * FROM optproj_clients ORDER BY name DESC";
    $cmd = $db->prepare($sql);
    $cmd->execute();
    $clients = $cmd->fetchAll();

    // start of table
    echo '<div>
        <table>
            <tr>
                <th>Client</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>';

    // loop through fetched data
    foreach ($clients as $client) {
        echo '<tr>
                <td>' . $client['name'] . '</td>
                <td>' . $client['email'] . '</td>
                <td>' . $client['phone'] . '</td>
                <td>
                    <a href="edit-client.php?id=' . $client['id'] . '">Edit</a>
                </td>
                <td>
                    <a href="delete-client.php?id=' . $client['id'] . '" onclick="return confirmDelete();">Delete</a>
                </td>
            </tr>';
    }

    echo '</table>
        </div>';

    // disconnect to database
    $db = null;
    ?>
</main>

<!-- Step 16: Create clients page -->

<!-- Next: Create page that adds clients, add-client.php -->
<!-- Next: Create page that edit clients, edit-client.php -->
<!-- Next: Create page that delete clients, delete-client.php -->