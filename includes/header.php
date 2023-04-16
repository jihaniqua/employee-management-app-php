<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <!-- css -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <!-- js -->
    <script src="js/scripts.js" defer></script>
</head>
<body>
    <header>
        <!-- start of logo container-->
        <div>
        </div>
        <!-- end of logo container -->
        <!-- start of nav links -->
        <nav>
            <ul>
                <?php
                session_start();
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                if (empty($_SESSION['user'])) {
                    echo '<li><a href="admin-login.php">Admin Login</a></li>
                    <li><a href="employee-login.php">Employee Login</a></li>';
                }
                else {
                    echo '<li><a href="#">' . $_SESSION['user'] . '</a></li>
                    <li><a href="logout.php">Logout</a></li>';
                }
                ?>
            </ul>
        </nav>
        <!-- end of nav links -->
    </header>
</body>
</html>

<!-- Step 2: Create header page -->
<!-- Add nav links later -->
<!-- Next: Create footer page -->