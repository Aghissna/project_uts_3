<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple PHP Auth System</title>
    <link rel="stylesheet" href="style.css?v=3">
</head>
<body>
    <h1>User Authentication System</h1>

    <nav>
        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- Jika SUDAH login -->
            <a href="index.php">Home</a> |
            <a href="index.php?page=dashboard">Dashboard</a> |
            <a href="index.php?page=masterProduct">Master Product</a> |
            <a href="index.php?page=masterUser">Master User</a> |
            <a href="index.php?page=masterSupplier">Master Supplier</a> |
            <a href="index.php?page=logout">Logout</a>
        <?php else: ?>
            <!-- Jika BELUM login -->
            <a href="index.php?page=home">Home</a> |
            <a href="index.php?page=login">Login</a> |
            <a href="index.php?page=register">Register</a>
        <?php endif; ?>
    </nav>
    <hr>

    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        if ($page == "login") {
            include "login.php";
        } elseif ($page == "register") {
            include "register.php";
        } elseif ($page == "dashboard") {
            include "dashboard.php";
        } elseif ($page == "masterProduct") {
            include "master_Product.php";
        } elseif ($page == "masterUser") {
            include "user.php";
        } elseif ($page == "masterSupplier") {
            include "master_supplier.php";
        } elseif ($page == "data") {
            if (isset($_SESSION['user_id'])) {
                include "data.php";
            } else {
                echo "<p style='color:red;'>Access denied! Please login first.</p>";
            }
        } elseif ($page == "logout") {
            include "logout.php";
        } else {
            echo "<h2>404 - Page not found!</h2>";
        }
    } else {
       
        if (isset($_SESSION['user_id'])) {
            echo "<h2>Welcome, " . htmlspecialchars($_SESSION['username']) . " 👋</h2>";
            echo "<p>You are logged in successfully.</p>";
        } else {
            echo "<h2>Welcome 👋💗</h2><p>Please select Login or Register from the menu above.</p>";
        }
    }
    ?>
</body>
</html>

