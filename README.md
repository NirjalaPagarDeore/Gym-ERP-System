# Gym ERP System

## Project Overview

Gym ERP System is a dynamic web-based application developed to manage and automate daily gym operations. It provides an organized platform for managing gym members, memberships, payments, attendance, and other gym-related activities.

The system is developed using PHP and MySQL for backend development, with HTML, CSS, and JavaScript for the frontend.

## Technologies Used

- **Frontend:** HTML5, CSS3, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Local Server:** XAMPP
- **Database Management:** phpMyAdmin

## Key Features

- Admin Login and Authentication
- Dashboard Management
- Member Management
- Membership Management
- Payment Management
- Attendance Management
- Dynamic Data Management
- MySQL Database Integration

*Note: Update this feature list according to the modules actually implemented in your project.*

## Project Structure

```text
gym_erp/
│
├── panel/
├── assets/
├── config/
├── database/
│   └── gym_erp.sql
├── index.php
├── login.php
├── README.md
└── .gitignore
```

## Installation and Setup

### 1. Install XAMPP

Download and install XAMPP.

### 2. Clone the Repository

Open your terminal and execute:

```bash
git clone https://github.com/NirjalaPagarDeore/Gym-ERP-System.git
```

### 3. Move Project to htdocs

Copy the project folder into:

```text
C:\xampp\htdocs\
```

### 4. Start XAMPP

Open XAMPP Control Panel and start:

- Apache
- MySQL

### 5. Create Database

1. Open `http://localhost/phpmyadmin/`.
2. Create a new database named `gym_erp`.
3. Select the newly created database.
4. Click the Import tab.
5. Choose `database/gym_erp.sql`.
6. Click Import.

### 6. Configure Database Connection

Open your database connection PHP file and configure the database details:

```php
$host = "localhost";
$user = "root";
$password = "";
$database = "gym_erp";

$conn = mysqli_connect($host, $user, $password, $database);
```

Update these values according to your local MySQL configuration. Do not commit private credentials.

### 7. Run the Project

Open your browser and visit:

```text
http://localhost/gym_erp/
```

## Database

The project includes a MySQL database export in the `database` folder.

Import the SQL file into phpMyAdmin before running the application.

## Developer

**Developed by:** Nirjala Pagar Deore

## GitHub Repository

[Gym ERP System – GitHub](https://github.com/NirjalaPagarDeore/Gym-ERP-System)

---

Thank you for visiting the Gym ERP System project!
