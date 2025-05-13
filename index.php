<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gyan Shala</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e6f2ff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header */
        header {
            background-color: #007BFF;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

       

        header h1 {
            flex-grow: 1;
            text-align: center;
            margin: 0;
            font-size: 24px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #d9d9d9;
        }

        /* Main Container */
        .main-container {
            display: flex;
            width: 80%;
            max-width: 1000px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            flex-grow: 1;
        }

        .left-container {
            flex: 1;
            padding: 20px;
            text-align: center;
            border-right: 2px solid #ddd;
        }

        .left-container h1 {
            color: #007BFF;
            margin-bottom: 10px;
        }

        .left-container p {
            color: #333;
            font-size: 16px;
            line-height: 1.6;
        }

        .left-container img {
            margin-top: 15px;
            width: 250px;
            height: auto;
            border-radius: 5px;
        }

        .right-container {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .button-container, .login-buttons {
            margin-top: 20px;
            text-align: center;
        }

        .btn {
            display: block;
            width: 200px;
            padding: 12px;
            margin: 10px 0;
            background-color: #007BFF;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Footer */
        footer {
            background-color:#333;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 16px;
            margin-top: auto;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
                width: 90%;
                text-align: center;
            }

            .left-container {
                border-right: none;
                border-bottom: 2px solid #ddd;
                padding-bottom: 20px;
            }

            .right-container {
                padding-top: 20px;
            }

            header {
                flex-direction: column;
                text-align: center;
            }

            nav ul {
                margin-top: 10px;
            }

            nav ul li {
                margin: 5px 10px;
            }
        }
    </style>
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
                <li><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </header>

    <div class="main-container">
        <!-- Left Side -->
        <div class="left-container">
            <h1>Welcome to Gyan Shala</h1>
            <p>Welcome to our Library Management System, where the world of books meets seamless organization! <br><br>
                Our system boasts a rich array of features designed to streamline the management of your library's treasures.</p>
            <img src="home.png" alt="Library Logo" />
        </div>

        <!-- Right Side -->
        <div class="right-container">
            <h2>Get Started</h2>
            <div class="button-container">
                <a href="register.php" class="btn">Register</a>
            </div>

            <h2>Login</h2>
            <div class="login-buttons">
                <a href="login.php?role=user" class="btn">Login as User</a>
                <a href="login.php?role=admin" class="btn">Login as Admin</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Gyan Shala - All Rights Reserved</p>
    </footer>

</body>
</html>
