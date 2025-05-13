<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
}
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo.png" alt="Library Logo">
        </div>
        <h1 style="color:White;">Gyan Shala</h1>
        <nav>
            <ul>
                <li><a href="admin_dashboard.php">Home</a></li>
                <li><a href="add_book.php">Add Book</a></li>
                <li><a href="remove_book.php">Remove Book</a></li>
                <li><a href="view_books.php">View Books</a></li>
                <li><a href="view_users.php">View Users</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Welcome, Admin!</h1>
        <div class="content-area">
            <h2>Gyan Shala</h2>
            <p>Use the navigation links to manage the library.</p>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Gyan Shala</p>
    </footer>
</body>
</html>