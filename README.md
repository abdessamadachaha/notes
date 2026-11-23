# 📝 Notes Management System

A simple web application built with **PHP, MySQL, and the MVC (Model-View-Controller) architecture**.

This project was developed to practice backend web development, including user authentication, session management, database operations using PDO, and secure access to user-specific data.

## 🚀 Features

### 🔐 User Authentication
- User registration with email and password
- Secure password hashing using `password_hash()`
- Login using `password_verify()`
- Session-based authentication
- Session ID regeneration after successful login
- Protected routes for authenticated users

### 📝 Notes Management
- Create personal notes
- View notes belonging to the logged-in user
- Delete existing notes
- Validate user input
- Prevent users from accessing or deleting other users' notes

### 🛡️ Security
- PDO prepared statements to help prevent SQL injection
- Password hashing
- Session-based access control
- User ownership verification
- HTML output escaping using `htmlspecialchars()`
- Exception handling for database operations

## 🛠️ Technologies Used

| Technology | Purpose |
|---|---|
| PHP | Backend development |
| MySQL | Relational database |
| PDO | Secure database interactions |
| HTML / CSS | User interface |
| MVC | Application architecture |
| Apache / XAMPP | Local development environment |
| Git / GitHub | Version control |

## 📂 Project Structure

```text
notes/
├── config/
├── controllers/
├── models/
├── views/
├── main.php
└── README.md
```

- **Models:** Handle database queries and data operations.
- **Views:** Display HTML pages and application data.
- **Controllers:** Handle requests, validation, and application logic.
- **Config:** Contains database connection configuration.
- **main.php:** Acts as the application's front controller and router.

## 🗄️ Database Structure

The application uses two tables:

### Users
| Column | Description |
|---|---|
| id | Primary key |
| email | User email |
| password | Hashed password |

### Notes
| Column | Description |
|---|---|
| note_id | Primary key |
| body | Note content |
| user_id | Foreign key referencing users |

**Relationship:** One user can have multiple notes, but each note belongs to one user.

## ⚙️ Getting Started

### Prerequisites
- PHP 8.0 or later
- MySQL
- Apache (XAMPP recommended)
- Git

### Installation

**1. Clone the repository**

```bash
git clone <your-repository-url>
```

**2. Move the project into your local web server directory**

For XAMPP on Windows:

```text
C:\xampp\htdocs\notes
```

**3. Create a MySQL database**

```sql
CREATE DATABASE notes;
```

Create the `users` and `notes` tables according to the database structure above.

**4. Configure the database connection**

Update your database configuration with your local MySQL credentials.

**5. Start Apache and MySQL**

Open the XAMPP Control Panel and start both services.

**6. Open the application**

```text
http://localhost/notes/main.php
```

## 🎯 Learning Objectives

This project helped me practice:

- Object-Oriented Programming in PHP
- MVC architecture and separation of concerns
- Dependency Injection
- PDO and prepared statements
- HTTP GET and POST requests
- User authentication and sessions
- CRUD operations
- Input validation and exception handling
- Basic web application security

## 🔮 Future Improvements

- Edit and update existing notes
- Search notes by keyword
- Add timestamps to notes
- Improve the user interface
- Implement the Post/Redirect/Get (PRG) pattern
- Add CSRF protection to forms

## 📄 Project Status

**Learning Project — In Development**

Built as part of my journey to improve my PHP backend development skills.
