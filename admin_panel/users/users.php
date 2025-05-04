<?php
// Database connection
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "arcoj"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch users data from the 'users' table
$sql = "SELECT user_id, handle, email, password, rating, university, picture, date FROM user";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap">


    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Admin Panel</title> 
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
            <i class="uil uil-bars sidebar-toggle"></i>
            <img src="../images/arc-admin-logo.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="activity">
                <div class="title">
                    <i class="uil uil-user"></i>
                    <span class="text">All Users</span>
                </div>

                <div class="container">
                    <table id="userTable">
                        <thead>
                            <tr>
                                <th>User id</th>
                                <th>Image</th>
                                <th>Handle</th>
                                <th>Email</th>
                                <th>Rating</th>
                                <th>University</th>
                                <th>Registration Date & Time</th>
                                <!-- <th>Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                // Output data for each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>" . $row["user_id"] . "</td>
                                            <td><img src='" . $row["picture"] . "' alt='User Photo' class='user-photo'></td>
                                            <td>" . $row["handle"] . "</td>
                                            <td>" . $row["email"] . "</td>
                                            <td>" . $row["rating"] . "</td>
                                            <td>" . $row["university"] . "</td>
                                            <td>" . $row["date"] . "</td>
                                            
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No users found</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>

                <div id="editFormPopup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closeEditForm()">&times;</span>
        <h2>Edit User Information</h2>
        <form id="editForm">
            <label for="user_id">User id:</label>
            <input type="number" id="user_id" name="user_id">
            <label for="photo">Photo URL:</label>
            <input type="text" id="photo" name="photo">
            <label for="name">Handle:</label>
            <input type="text" id="name" handle="name">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <label for="university">University:</label>
            <input type="text" id="university" name="university">
            <label for="rating">Rating:</label>
            <input type="number" id="rating" name="rating" step="0.1" min="0" max="5">
            <button class="save-btn" type="button" onclick="saveEdit()">Save</button>
        </form>
    </div>
</div>

            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>


<!-- <td>
                                                <button class='edit-btn' onclick='openEditForm(this)'>Edit</button>
                                                <button class='delete-btn' onclick='deleteUser(this)'>Delete</button>                               
                                            </td> -->