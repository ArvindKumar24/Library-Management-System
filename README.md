# Library Management System - Gyan Shala 📚

A simple yet powerful PHP and MySQL-based Library Management System for managing books, users, and borrow/return operations. Perfect for small to medium-sized libraries, schools, or educational institutions.

![Home](home.png)

## ✨ Features

### For Administrators
- 📖 **Book Management**: Add, remove, and view all books in the library
- 👥 **User Management**: View and manage registered users
- 📊 **Dashboard**: Comprehensive admin dashboard for oversight
- 🔍 **Search Functionality**: Search books by title or author
- 📋 **Track Borrowed Books**: Monitor all borrowed books and their status

### For Users
- 🔐 **User Authentication**: Secure registration and login system
- 📚 **Browse Books**: View all available books in the library
- 🔎 **Search Books**: Find books by title or author
- 📤 **Borrow Books**: Easy book borrowing system
- 📥 **Return Books**: Simple book return process
- 📖 **View Borrowed Books**: Track personal borrowed books history

## 🛠️ Technologies Used

- **Backend**: PHP 8+
- **Database**: MySQL / MariaDB
- **Frontend**: HTML5, CSS3
- **Database Access**: PDO (PHP Data Objects)
- **Architecture**: Role-based access control (Admin/User)

## 📁 Project Structure

```
Library-Management-System/
├── README.md
├── db.php                    # Database connection
├── index.php                 # Landing page
├── login.php                 # User login
├── register.php              # User registration
├── logout.php                # Logout functionality
├── admin_dashboard.php       # Admin control panel
├── user_dashboard.php        # User control panel
├── add_book.php              # Add new books (Admin)
├── remove_book.php           # Remove books (Admin)
├── view_books.php            # View all books
├── view_book.php             # View individual book details
├── view_users.php            # View all users (Admin)
├── search_books.php          # Search books functionality
├── borrow_book.php           # Borrow book functionality
├── return_book.php           # Return book functionality
├── borrowed_books.php        # View borrowed books
├── style.css                 # Main stylesheet
├── styles1.css               # Additional styles
├── logo.png                  # Library logo
└── home.png                  # Home page image
```

## 🚀 Installation & Setup

### Prerequisites
- PHP 8.0 or higher
- MySQL 5.7+ or MariaDB 10.3+
- Web server (Apache/Nginx)
- Local development environment (XAMPP/WAMP/LAMP/MAMP)

### Step-by-Step Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/ArvindKumar24/Library-Management-System.git
   cd Library-Management-System
   ```

2. **Setup Database**
   - Create a new MySQL database:
   ```sql
   CREATE DATABASE library_management;
   ```

3. **Create Database Tables**
   ```sql
   USE library_management;

   -- Users Table
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(50) UNIQUE NOT NULL,
       password VARCHAR(255) NOT NULL,
       email VARCHAR(100) UNIQUE NOT NULL,
       role ENUM('admin', 'user') DEFAULT 'user',
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );

   -- Books Table
   CREATE TABLE books (
       id INT AUTO_INCREMENT PRIMARY KEY,
       title VARCHAR(255) NOT NULL,
       author VARCHAR(255) NOT NULL,
       isbn VARCHAR(13) UNIQUE,
       category VARCHAR(100),
       quantity INT DEFAULT 1,
       available INT DEFAULT 1,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );

   -- Borrowed Books Table
   CREATE TABLE borrowed_books (
       id INT AUTO_INCREMENT PRIMARY KEY,
       user_id INT NOT NULL,
       book_id INT NOT NULL,
       borrow_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
       return_date TIMESTAMP NULL,
       status ENUM('borrowed', 'returned') DEFAULT 'borrowed',
       FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
       FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE
   );
   ```

4. **Configure Database Connection**
   - Open `db.php` and update the database credentials:
   ```php
   $host = 'localhost';
   $dbname = 'library_management';
   $username = 'your_username';
   $password = 'your_password';
   ```

5. **Start Your Web Server**
   - If using XAMPP: Place the project folder in `htdocs`
   - If using WAMP: Place the project folder in `www`
   - Start Apache and MySQL services

6. **Access the Application**
   - Open your browser and navigate to:
   ```
   http://localhost/Library-Management-System/index.php
   ```

7. **Create Admin Account**
   - Register a new user through the registration page
   - Manually update the user role in the database:
   ```sql
   UPDATE users SET role = 'admin' WHERE username = 'your_admin_username';
   ```

## 📖 Usage Guide

### For Administrators
1. **Login** with admin credentials
2. **Access Admin Dashboard** to manage the library
3. **Add Books**: Navigate to "Add Book" section
4. **View Users**: Monitor registered users
5. **Track Borrowed Books**: View all borrowing activities

### For Users
1. **Register** a new account or **Login** with existing credentials
2. **Browse** available books in the library
3. **Search** for specific books by title or author
4. **Borrow** books with a single click
5. **Return** books when finished reading
6. **Track** your borrowed books history

## 🔒 Security Features

- Password hashing for secure authentication
- PDO prepared statements to prevent SQL injection
- Role-based access control (RBAC)
- Session management for user authentication
- Input validation and sanitization


## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 Future Enhancements

- [ ] Email notifications for due dates
- [ ] Fine calculation for late returns
- [ ] Book reservation system
- [ ] Advanced search filters
- [ ] Export reports (PDF/Excel)
- [ ] Mobile responsive design improvements
- [ ] REST API for mobile app integration
- [ ] Book cover image uploads
- [ ] Reading history analytics

## 👨‍💻 Author

**Arvind Kumar Varma**

- GitHub: [@ArvindKumar24](https://github.com/ArvindKumar24)
Gyan Shala Library
