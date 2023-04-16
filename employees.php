<?php
require('includes/admin-auth.php');

$title = 'Employees';
require('includes/header.php');
?>
<main>
    <p><a href="admin-home.php">Back to dashboard</a></p>
    <h1>List of Employees</h1>
    <?php
    // connect to database
    require('includes/db.php');

    // query to get employee usernames and access
    $sql = "SELECT employeeId, username, dateCreated, access FROM optproj_employee ORDER BY dateCreated DESC";
    $cmd = $db->prepare($sql);
    $cmd->execute();
    $employees = $cmd->fetchAll();

    // start of table
    echo '<div>
        <form action="approve-employee.php" method="post">
        <table>
            <tr>
                <th>Employee</th>
                <th>Date Created</th>
                <th>Access</th>
            </tr>';

    // loop through fetched data
    foreach ($employees as $employee) {
        echo '<tr>
                <td>' . $employee['username'] . '</td>
                <td>' . $employee['dateCreated'] . '</td>';

        // query to get all distinct access
        $sql = "SELECT DISTINCT access FROM optproj_employee";
        $cmd = $db->prepare($sql);
        $cmd->execute();
        $access = $cmd->fetchAll();

        // set access options
        $accessOptions = array("Approve", "Deny");

        echo '<td><select name="access[' . $employee['employeeId'] . ']">';

        // loop through access options and create dropdown
        foreach ($accessOptions as $value) {
            // Pre-select the dropdown based on the current access
            if ($value == $employee['access']) {
                $selected = 'selected';
            }
            else {
                $selected = '';
            }
            echo '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
        }

        echo '</select>
                </td>
            </tr>';
    }

    echo '</table>
        <button type="submit">Save changes</button>
        </form>
        </div>';
    ?>
</main>

<!-- Step 14: Create list of all employees -->

<!-- Next: Create page that updates changes, approve-employee.php -->