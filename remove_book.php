<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
}
include 'db.php'; // Ensure this file sets up the $conn variable correctly
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Book</title>
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
        <h1>Remove Book</h1>
        <form action="remove_book.php" method="post">
            <input type="text" name="title" placeholder="Book Title" required  autocomplete="off">
            <button type="submit" class="btn">Remove Book</button>
        </form>
    </div>
    <footer>
        <p>&copy; 2025 Gyan Shala</p>
    </footer>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];

    if ($conn) {
        // Check if the book is referenced in the borrowed_books table
        $checkStmt = $conn->prepare("SELECT COUNT(*) FROM borrowed_books WHERE book_id = (SELECT id FROM books WHERE title = ?)");
        $checkStmt->execute([$title]);
        $count = $checkStmt->fetchColumn();

        if ($count > 0) {
            echo "<script>alert('Cannot remove book. It is currently borrowed.');</script>";
        } else {
            $stmt = $conn->prepare("DELETE FROM books WHERE title = ?");
            if ($stmt) {
                if ($stmt->execute([$title])) {
                    echo "<script>alert('Book removed successfully!'); window.location.href='admin_dashboard.php';</script>";
                } else {
                    echo "<script>alert('Failed to remove book. Please try again.');</script>";
                }
            } else {
                echo "<script>alert('Failed to prepare statement.');</script>";
            }
        }
    } else {
        echo "<script>alert('Database connection error.');</script>";
    }
}
?>