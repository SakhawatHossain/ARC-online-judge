# ARC OJ - An Online Judge for Problem Solving and Competitive Programming

**ARC OJ** is an online judge system designed for coding enthusiasts, students, and institutions. It provides C/C++ code evaluation, real-time verdicts, user and admin management, contests, blogs, and much more — all through a modern and responsive interface.

## Features

### 👤 User Authentication
- Login / Sign-up system  
- Admin login with dedicated dashboard  

### 🧪 Online Compiler
- Auto-detects C and C++ code  
- Real-time verdict system: Accepted, Wrong Answer, Syntax Error  

### 📚 Problem Archive
- Problems categorized by difficulty  
- Solve status and submission tracking  

### 🏆 Contests (coming soon!!)
- Host Running, Upcoming, and Past contests  
- Contest registration and upsolving system

### 📊 Ranking System
- Global leaderboard  
- User rating and solved problem count  

### ✍️ Blog Section
- Read and write community tutorials  
- Share programming tips and updates  

### ⚙️ Admin Panel
- Manage users, problems, blogs, and contest entries  
- View system stats (total users, problems, blogs)  
- Edit or delete content with one click  

### 💬 Contact/Feedback
- Request message section for user queries or feature requests

---

## 🖥️ Tech Stack

- **Frontend**: HTML, CSS, JavaScript  
- **Backend**: PHP  
- **Database**: MySQL  
- **Compiler Integration**: Bash (C/C++ code execution)

---

## ARC OJ - SETUP INSTRUCTIONS

Follow the steps below to set up ARC OJ on your local machine using XAMPP.

1. Download or Clone the Project
- If downloading as ZIP, extract it.
- If using Git:
  git clone https://github.com/SakhawatHossain/ARC-online-judge.git

2. Move Project to XAMPP's htdocs Directory
- Copy the entire project folder (e.g., arc-oj)
- Paste it into: xampp/htdocs/

3. Start XAMPP Services
- Open the XAMPP Control Panel
- Start both **Apache** and **MySQL**

4. Create the Database in phpMyAdmin
- Visit: http://localhost/phpmyadmin/
- Click **Databases**
- Create a new database with the name:
  arcoj

5. Import the SQL File
- With the `arcoj` database selected:
  - Click the **Import** tab
  - Choose the SQL file located at:
    db_connect/arcoj.sql
  - Click **Go** to import the tables and data

6. Configure the Database Connection
- Open the file:
  db_connect/db_connection.php
- Make sure it contains the following (update if needed):
  $conn = mysqli_connect("localhost", "root", "", "arcoj");

7. Run the Project in Browser
- Open your browser
- Go to:
  http://localhost/arc-oj/index.php

If everything is set correctly, the homepage of ARC OJ will load, and you'll be able to:
- Log in as a user
- Submit C/C++ code
- Get real-time verdicts
- Use the admin panel

---

## 🔑 DEMO CREDENTIALS

### 👤 User Login
- **Email**: `tourist@gmail.com`  
- **Password**: `tourist007`  

### 🛡️ Admin Login
- **Email**: `admin@arcoj.com`  
- **Password**: `Admin123`

---

## 📌 NOTE ON USAGE

You are welcome to use, modify, or extend this project for educational, personal, or development purposes.

However, if you intend to deploy this project publicly or incorporate it into any hosted platform, application, or service, we kindly ask that you provide clear and visible credit to the original creators — Team TrioBot — in recognition of their work and contribution.

## 👨‍💻 Developers

- **Muhammad Ziaur Rahman**  
- **Md. Mustafizur Rahman Emon**  
- **Md. Mosaddik Mashrafi Mousum**  
- **Md. Sakhawat Hossain**

---

## 📫 CONTACT

**Md. Sakhawat Hossain**  
📧 Email: [mdsakhawathossain17@gmail.com](mailto:mdsakhawathossain17@gmail.com)


Happy Coding!
