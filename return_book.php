<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
}
include 'db.php';

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Update book status to available
    $stmt = $conn->prepare("UPDATE books SET status = 'available' WHERE id = ?");
    $stmt->execute([$book_id]);

    // Update return date in borrowed_books table
    $stmt = $conn->prepare("UPDATE borrowed_books SET return_date = CURDATE() WHERE book_id = ? AND user_id = ?");
    $stmt->execute([$book_id, $user_id]);

    echo "<script>alert('Book returned successfully!'); window.location.href='borrowed_books.php';</script>";
}
?>