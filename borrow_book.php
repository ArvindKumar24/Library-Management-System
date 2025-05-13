<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
}
include 'db.php';

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Check if the book is available
    $stmt = $conn->prepare("SELECT * FROM books WHERE id = ? AND status = 'available'");
    $stmt->execute([$book_id]);
    $book = $stmt->fetch();

    if ($book) {
        // Update book status to borrowed
        $stmt = $conn->prepare("UPDATE books SET status = 'borrowed' WHERE id = ?");
        $stmt->execute([$book_id]);

        // Add to borrowed_books table
        $stmt = $conn->prepare("INSERT INTO borrowed_books (user_id, book_id, borrowed_date) VALUES (?, ?, CURDATE())");
        $stmt->execute([$user_id, $book_id]);

        echo "<script>alert('Book borrowed successfully!'); window.location.href='search_books.php';</script>";
    } else {
        echo "<script>alert('Book is not available for borrowing.'); window.location.href='search_books.php';</script>";
    }
}
?>