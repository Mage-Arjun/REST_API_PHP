# PHP REST API (CRUD)

A lightweight, native **RESTful API** built with **PHP** and **MySQL**. This project demonstrates the implementation of full CRUD (Create, Read, Update, Delete) operations using the **PDO** (PHP Data Objects) extension for secure database interaction.

## 🚀 Features
* **Full CRUD Functionality**: Create, Read, Update, and Delete blog posts.
* **PDO Integration**: Uses prepared statements to prevent SQL injection.
* **JSON Response**: All data is returned in standard JSON format.
* **Clean Architecture**: Separation of concerns between the database config, models, and API endpoints.
* **Cross-Origin Resource Sharing (CORS)**: Configured with headers to allow external client access.

## 🛠️ Tech Stack
* **Language**: PHP 7.4+ / 8.x
* **Database**: MySQL
* **Server**: Apache (XAMPP/WAMP/MAMP)
* **Testing**: Postman

## 📂 Project Structure
```text
├── api/                # API Endpoints
│   ├── post/           # CRUD operations for Posts
│   │   ├── create.php
│   │   ├── delete.php
│   │   ├── read.php
│   │   ├── read_single.php
│   │   └── update.php
├── config/             # Database connection settings
│   └── Database.php
├── models/             # Database logic (Classes)
│   └── Post.php
└── README.md
