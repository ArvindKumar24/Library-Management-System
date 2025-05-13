<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

    <!-- Login Form -->
    <div style="display: flex; justify-content: center; align-items: center; height: 80vh;">
        <div style="background: white; padding: 20px; width: 350px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); text-align: center;">
            <h2 style="color: #007BFF;">Login as <?php echo isset($_GET['role']) ? ucfirst($_GET['role']) : 'User'; ?></h2>
            <form action="login.php" method="post" style="display: flex; flex-direction: column;">
                <input type="text" name="username" placeholder="Username" required autocomplete="off" 
                    style="padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 5px;">
                <input type="password" name="password" placeholder="Password" required autocomplete="off" 
                    style="padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 5px;">
                <input type="hidden" name="role" value="<?php echo isset($_GET['role']) ? $_GET['role'] : 'user'; ?>">
                <button type="submit" 
                    style="padding: 12px; margin-top: 10px; background-color: #007BFF; color: white; font-weight: bold; border: none; border-radius: 5px; cursor: pointer;">
                    Login
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
    $password = $_POST['password'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND role = ?");
    $stmt->execute([$username, $role]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        $login_type = ucfirst($user['role']);
        echo "<script>alert('Login successful! You are logged in as $login_type.');";

        // Redirect based on role
        if ($user['role'] == 'admin') {
            echo "window.location.href='admin_dashboard.php';</script>";
        } else {
            echo "window.location.href='user_dashboard.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid username or password.');</script>";
    }
}
?>
