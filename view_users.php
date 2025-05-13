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
    <title>View Users</title>
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
        <h1>View Users</h1>
        <div class="content-area">
            <?php
            $stmt = $conn->prepare("SELECT id, username, email, role FROM users");
            $stmt->execute();
            $users = $stmt->fetchAll();

            if (count($users) > 0) {
                echo "<table >
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>";
                foreach ($users as $user) {
                    echo "<tr>
                            <td>{$user['id']}</td>
                            <td>{$user['username']}</td>
                            <td>{$user['email']}</td>
                            <td>{$user['role']}</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No users found.</p>";
            }
            ?>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Gyan Shala</p>
    </footer>
</body>
</html>