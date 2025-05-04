<?php

$servername = "localhost"; 
$username = "root";    
$password = "";    
$dbname = "arcoj";    

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT COUNT(*) AS total_users FROM user";
$result = $conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    $totalUsers = $row['total_users'];
} else {
    $totalUsers = 0;
}

$query = "SELECT COUNT(*) AS total_problems FROM problem";
$result = $conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    $totalProblems = $row['total_problems'];
} else {
    $totalProblems = 0;
}

$query = "SELECT COUNT(*) AS total_blogs FROM blog";
$result = $conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    $totalBlogs = $row['total_blogs'];
} else {
    $totalBlogs = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">
     
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <a href="index.php" class="logo clr-transition"><img src="../arc-removebg-preview.png" alt="Logo" style="position: absolute; top: 0px; left: 0px; width: 100px; z-index: 10;"></a>
            </div>
            <span class="logo_name"> OJ</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="index.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="users/users.php">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Users</span>
                </a></li>
                <li><a href="problems/problems.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Problems</span>
                </a></li>
                <li><a href="Blog/blog.php">
                    <i class="uil uil-file-alt"></i>
                    <span class="link-name">Blogs</span>
                </a></li>
                <li><a href="Contest_request/contest_request.php">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Message Requests</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="../index.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>
                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <img src="images/arc-admin-logo.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-user"></i>
                        <span class="text">Total Users</span>
                        <span class="number"><?php echo $totalUsers; ?></span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-exclamation-triangle"></i>
                        <span class="text">Total Problems</span>
                        <span class="number"><?php echo $totalProblems; ?></span>
                    </div>
                    <br>
                    <div class="box box4">
                        <i class="uil uil-user"></i>
                        <span class="text">Total Blogs</span>
                        <span class="number"><?php echo $totalBlogs; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>
