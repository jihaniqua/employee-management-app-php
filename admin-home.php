<?php
// authentication check
require('includes/admin-auth.php');

$title = 'Admin Dashboard';
require('includes/header.php');
?>
<main>
    <h1>Admin Dashboard</h1>
    <!-- start of employees -->
    <div>
        <a href="employees.php">
            <section>
                <h2>Employees</h2>
            </section>
        </a>
    </div>
    <!-- end of employees -->
    <!-- start of clients -->
    <div>
        <a href="clients.php">
            <section>
                <h2>Clients</h2>
            </section>
        </a>
    </div>
    <!-- end of clients -->
    <!-- start of projects -->
    <div>
        <a href="projects.php">
            <section>
                <h2>Projects</h2>
            </section>
        </a>
    </div>
    <!-- end of projects -->
</main>
<?php require('includes/footer.php'); ?>

<!-- Step 8: Create admin dashboard page -->
<!-- Make this a private page -->

<!-- Next: Create employee registration page, employee-registration.php -->

<!-- After Step 13, employee-home.php -->
<!-- Next: Create pages for the employee, client and project list -->