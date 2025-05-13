<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <img src="logo.png" alt="Library Logo">
        </div>
        <h1 style="color:White;">Gyan Shala</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </header>

    <!-- Registration Form -->
    <div style="display: flex; justify-content: center; align-items: center; height: 80vh;">
        <div style="background: white; padding: 20px; width: 350px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); text-align: center;">
            <h2 style="color: #007BFF;">Register</h2>
            <form action="register.php" method="post" style="display: flex; flex-direction: column;">
                <input type="text" name="username" placeholder="Username" required autocomplete="off" 
                    style="padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 5px;">
                <input type="password" name="password" placeholder="Password" required autocomplete="off" 
                    style="padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 5px;">
                <input type="email" name="email" placeholder="Email" required autocomplete="off" 
                    style="padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 5px;">
                <select name="role" required 
                    style="padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 5px;">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" 
                    style="padding: 12px; margin-top: 10px; background-color: #007BFF; color: white; font-weight: bold; border: none; border-radius: 5px; cursor: pointer;">
                    Register
                </button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Gyan Shala</p>
    </footer>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'db.php'; 

    $username = trim(htmlspecialchars($_POST['username']));
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = trim(htmlspecialchars($_POST['email']));
    $role = $_POST['role'];

    try {
        $stmt = $conn->prepare("INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $password, $email, $role]);

        echo "<script>alert('Registration successful! You can now log in.'); window.location.href='login.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Registration failed. Please try again.');</script>";
    }
}
?>
