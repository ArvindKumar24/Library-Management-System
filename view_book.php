<?php
session_start();

// Debugging output to check session variables
if (!isset($_SESSION['user_id'])) {
    echo "<script>console.log('User ID not set in session');</script>";
}
if (!isset($_SESSION['role'])) {
    echo "<script>console.log('Role not set in session');</script>";
} else {
    echo "<script>console.log('User role: " . $_SESSION['role'] . "');</script>";
}

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit(); // Ensure script stops after redirection
}

include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
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
        <h1>View Books</h1>
        <div class="content-area">
            <?php
            $stmt = $conn->prepare("SELECT id, title, author, status FROM books");
            $stmt->execute();
            $books = $stmt->fetchAll();

            if (count($books) > 0) {
                echo "<table>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Status</th>
                        </tr>";
                foreach ($books as $book) {
                    echo "<tr>
                            <td>{$book['id']}</td>
                            <td>{$book['title']}</td>
                            <td>{$book['author']}</td>
                            <td>{$book['status']}</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No books found.</p>";
            }
            ?>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Gyan Shala</p>
    </footer>
</body>
</html>