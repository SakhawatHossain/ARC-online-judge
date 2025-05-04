<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arcoj";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT blog_id, title, description, image FROM blog";
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    error_log(print_r($_POST, true)); // Log the POST data for debugging

    if (isset($_POST['blogTitle'])) {
        // Add a new blog
        $title = $_POST['blogTitle'];
        $description = $_POST['blogContent']; // This needs to match your form field name
        $image = $_POST['blogPicture']; // This needs to match your form field name

        $sql = "INSERT INTO blog (title, description, image) VALUES ('$title', '$description', '$image')";

        if ($conn->query($sql) === TRUE) {
            echo "New blog added successfully";
        } else {
            echo "Error adding new blog: " . $conn->error;
        }
    } elseif (isset($_POST['blog_id'])) { // Updated this check for blog updates
        $blog_id = $_POST['blog_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        
        $sql = "UPDATE blog SET title='$title', description='$description', image='$image' WHERE blog_id='$blog_id'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
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
        
        </div>
    </nav>


    <section class="dashboard">
        <div class="top">
            <img src="../images/arc-admin-logo.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="activity">
                <div class="title">
                    <i class="uil uil-chart"></i>
                    <span class="text">All Blogs</span>
                </div>

                <div class="container">
                    <div class="header">
                        <button class="add-blog-btn" onclick="showAddBlogForm()">Add Blog</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Blog ID</th>
                                <th>Blog Picture</th>
                                <th>Blog Title</th>
                                <th>Blog Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="blogsTableBody">
                        <?php
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>" . $row["blog_id"] . "</td>     
                                             <td><img src='" . $row["image"] . "' alt='Blog Photo' class='user-photo'></td>                     
                                            <td>" . $row["title"] . "</td>
                                            <td>" . $row["description"] . "</td>
                                           
                                            <td>
                                            <button class='edit-btn' onclick='openEditForm(this)'>Edit</button>
                              
                                            </td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No problems found</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
<div class="modal" id="addBlogModal">
    <div class="modal-content">
        <span class="close" onclick="hideAddBlogForm()">&times;</span>
        <h2>Add Blog</h2>
        <form id="addBlogForm" onsubmit="addBlog(event)">
            <label for="blogPicture">Blog Picture URL:</label>
            <input type="text" id="blogPicture" name="blogPicture" required>
            
            <label for="blogTitle">Blog Title:</label>
            <input type="text" id="blogTitle" name="blogTitle" required>
            
            <label for="blogContent">Blog Description:</label>
            <textarea id="blogContent" name="blogContent" required></textarea>
            
            <button type="submit">Add Blog</button>
        </form>
    </div>
</div>


<div class="modal" id="viewBlogModal">
    <div class="modal-content">
        <span class="close" onclick="hideViewBlogModal()">&times;</span>
        <h2>Blog Details</h2>
        <p id="viewBlogContent"></p>
    </div>
                


            



                
            </div>
        </div>

    </section>

             


    <script src="blogscript.js"></script>
</body>
</html>