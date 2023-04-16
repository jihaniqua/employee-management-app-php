<?php
// authentication check
require('includes/employee-auth.php');

$title = 'Employee Dashboard';
require('includes/header.php');
?>
<main>
    <h1>Employee Dashboard</h1>
    <!-- start of clients -->
    <div>
        <a href="">
            <section>
                <h2>Clients</h2>
            </section>
        </a>
    </div>
    <!-- end of clients -->
    <!-- start of projects -->
    <div>
        <a href="">
            <section>
                <h2>Projects</h2>
            </section>
        </a>
    </div>
    <!-- end of projects -->
    <!-- start of timesheets -->
    <div>
        <a href="">
            <section>
                <h2>Timesheets</h2>
            </section>
        </a>
    </div>
    <!-- end of timesheets -->
</main>
<?php require('includes/footer.php'); ?>

<!-- Step 13: Create employee dashboard -->
<!-- Create clients, projects and timesheets tables on the database -->

<!-- Next: Create authentication page for private pages, auth.php -->