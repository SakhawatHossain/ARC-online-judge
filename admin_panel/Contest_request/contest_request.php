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
                <a href="#" class="logo clr-transition"><img src="../arc-removebg-preview.png" alt="Logo" style="position: absolute; top: 0px; left: 0px; width: 100px; z-index: 10;"></a>
            </div>

            <span class="logo_name">  OJ</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="../index.php"><i class="uil uil-estate"></i><span class="link-name">Dashboard</span></a></li>
                <li><a href="../users/users.php"><i class="uil uil-user"></i><span class="link-name">Users</span></a></li>
                <li><a href="../problems/problems.php"><i class="uil uil-chart"></i><span class="link-name">Problems</span></a></li>
                <li><a href="../Blog/blog.php"><i class="uil uil-file-alt"></i><span class="link-name">Blogs</span></a></li>
                <li><a href="../Contest_request/contest_request.php"><i class="uil uil-comments"></i><span class="link-name">Request Messages</span></a></li>
            </ul>
            <ul class="logout-mode">
                <li><a href="#"><i class="uil uil-signout"></i><span class="link-name">Logout</span></a></li>
                <li class="mode">
                    <a href="#"><i class="uil uil-moon"></i><span class="link-name">Dark Mode</span></a>
                    <div class="mode-toggle"><span class="switch"></span></div>
                </li>
            </ul>
        </div>
       
    </nav>


    <section class="dashboard">
        <div class="top">
            <img src="../images/arc-admin-logo.jpg" alt="">
        </div>

        <div class="dash-content">

            <div class="activity">
                <div class="title">
                    <i class="uil uil-user"></i>
                    <span class="text">Request Messages</span>
                </div>              
            </div>
        </div>

    </section>

             


    <script src="script.js"></script>
</body>
</html>