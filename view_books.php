<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
}
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Book List</title>
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
                <li><a href="user_dashboard.php">Home</a></li>
                <li><a href="view_books.php">View Book List</a></li>
                <li><a href="search_books.php">Search Books</a></li>
                <li><a href="borrowed_books.php">Borrowed Books</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Available Books</h1>
        <div class="content-area">
            <?php
            $stmt = $conn->prepare("SELECT * FROM books WHERE status = 'available'");
            $stmt->execute();
            $available_books = $stmt->fetchAll();

            if (count($available_books) > 0) {
                echo "<div class='book-list'>";
                foreach ($available_books as $book) {
                    echo "<div class='book-item'>
                            <p>{$book['title']} by {$book['author']}</p>
                            <a href='borrow_book.php?id={$book['id']}' class='btn'>Borrow</a>
                          </div>";
                }
                echo "</div>";
            } else {
                echo "<p>No books available.</p>";
            }
            ?>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Gyan Shala</p>
    </footer>
</body>
</html>