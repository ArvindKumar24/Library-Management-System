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
    <title>Add Book</title>
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
        <h1>Add Book</h1>
        <form action="add_book.php" method="post">
            <input type="text" name="title" placeholder="Book Title" required  autocomplete="off">
            <input type="text" name="author" placeholder="Author" required  autocomplete="off">
            <button type="submit" class="btn">Add Book</button>
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
    $author = $_POST['author'];

    $stmt = $conn->prepare("INSERT INTO books (title, author) VALUES (?, ?)");
    
    if ($stmt->execute([$title, $author])) {
        echo "<script>alert('Book added successfully!'); window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Failed to add book. Please try again.');</script>";
    }
}
?>