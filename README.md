Here’s your project structure and key files summarized in Markdown format for your `README.md`:

```markdown
# Library Management System - Gyan Shala

A simple PHP and MySQL-based Library Management System for managing books, users, and borrow/return operations.

---

## Project Structure

```

├── README.md
├── add\_book.php
├── admin\_dashboard.php
├── borrow\_book.php
├── borrowed\_books.php
├── db.php
├── home.png
├── index.php
├── login.php
├── logo.png
├── logout.php
├── register.php
├── remove\_book.php
├── return\_book.php
├── search\_books.php
├── style.css
├── styles1.css
├── user\_dashboard.php
├── view\_book.php
├── view\_books.php
└── view\_users.php

````

---

## Key Features

- User registration and login (admin/user roles)
- Admin Dashboard: Add, remove, and view books and users
- User Dashboard: View books, search books, borrow and return books
- Book status management (available/borrowed)
- Borrowed books tracking
- Responsive and simple UI

---

## Screenshots

![Home](home.png)  
![Logo](logo.png)

---

## File Highlights

- **db.php**: Handles database connection using PDO.
- **add_book.php / remove_book.php**: Admin can add or remove books.
- **borrow_book.php / return_book.php**: Users can borrow and return books.
- **search_books.php**: Search available books by title or author.
- **login.php / register.php**: Authentication system with role-based access.
- **admin_dashboard.php / user_dashboard.php**: Dashboard pages based on role.
- **view_books.php / view_users.php**: Admin can view all books and users.

---

## Technologies Used

- PHP 8+
- MySQL / MariaDB
- HTML5, CSS3
- Vanilla JavaScript (optional for UI enhancements)

---

## How to Run

1. Clone the repository:
   ```bash
   git clone <repository-url>
````

2. Create a MySQL database named `library_management`.
3. Import the database schema (create tables `users`, `books`, `borrowed_books`).
4. Update database credentials in `db.php`.
5. Run the project on a local server (e.g., XAMPP / WAMP / LAMP).
6. Access `index.php` from your browser.

---

## Author

Arvind Kumar Varma

---

```

I can also generate a **full enhanced `README.md`** with database schema, table structures, and more detailed instructions if you want. Do you want me to do that?
```
