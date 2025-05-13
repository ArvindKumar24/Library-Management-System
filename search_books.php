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
    <title>Search Books</title>
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
        <h1>Search Books</h1>
        <div class="content-area">
            <form action="search_books.php" method="get">
                <input type="text" name="search" placeholder="Search by title or author" required autocomplete="off">
                <button type="submit" class="btn">Search</button>
            </form>
            <?php
            if (isset($_GET['search'])) {
                $search = $_GET['search'];
                $query = "SELECT * FROM books WHERE (title LIKE ? OR author LIKE ?) AND status = 'available'";
                $stmt = $conn->prepare($query);
                $stmt->execute(["%$search%", "%$search%"]);
                $books = $stmt->fetchAll();

                if (count($books) > 0) {
                    echo "<div class='book-list'>";
                    foreach ($books as $book) {
                        echo "<div class='book-item'>
                                <p>{$book['title']} by {$book['author']}</p>
                                <a href='borrow_book.php?id={$book['id']}' class='btn'>Borrow</a>
                              </div>";
                    }
                    echo "</div>";
                } else {
                    echo "<p>No books found matching your search.</p>";
                }
            }
            ?>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Gyan Shala</p>
    </footer>
</body>
</html>