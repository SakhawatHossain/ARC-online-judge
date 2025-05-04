<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Video Management Panel</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <a href="#" class="logo clr-transition"><img src="../arc-removebg-preview.png" alt="Logo" style="position: absolute; top: 0px; left: 0px; width: 100px; z-index: 10;"></a>
            </div>
            <span class="logo_name">OJ</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="../index.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="../users/users.php">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Users</span>
                </a></li>
                <li><a href="../Blog/blog.php">
                    <i class="uil uil-file-alt"></i>
                    <span class="link-name">Blogs</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="#">
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
            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            <img src="../images/arc-admin-logo.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="activity">
                <div class="title">
                    <i class="uil uil-video"></i>
                    <span class="text">All Videos</span>
                </div>

                <div class="container">
                    <button id="addVideoButton" class="btn">Add Video</button>
                    <table id="videoTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Link</th>
                                <th>Live At</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Video rows will be added dynamically -->
                        </tbody>
                    </table>
                </div>

                <!-- Add Video Popup -->
               <!-- Add Video Popup -->
<div id="addVideoPopup" class="popup">
    <div class="popup-content">
        <span class="close">&times;</span>
        <h2>Add/Edit Video</h2>
        <form id="addVideoForm">
            <label for="videoId">ID:</label>
            <input type="text" id="videoId" name="videoId" required>
            
            <label for="videoTitle">Title:</label>
            <input type="text" id="videoTitle" name="videoTitle" required>
            
            <label for="videoDescription">Description:</label>
            <textarea id="videoDescription" name="videoDescription" required></textarea>
            
            <label for="videoLink">Link:</label>
            <input type="url" id="videoLink" name="videoLink" required>
            
            <label for="videoLiveAt">Live At:</label>
            <input type="datetime-local" id="videoLiveAt" name="videoLiveAt" required>
            
            <label for="videoImage">Image:</label>
            <input type="file" id="videoImage" name="videoImage" accept="image/*" required>
            
            <button type="button" id="saveVideoButton" class="btn">Save Video</button>
            <button type="button" id="updateVideoButton" class="btn" style="display: none;">Update Video</button> <!-- Initially hidden -->
        </form>
    </div>
</div>

                </div>

                <!-- Edit Video Popup -->
                <div id="editVideoPopup" class="popup">
                    <div class="popup-content">
                        <span class="close">&times;</span>
                        <h2>Edit Video</h2>
                        <form id="editVideoForm">
                            <label for="editVideoId">ID:</label>
                            <input type="text" id="editVideoId" name="editVideoId" disabled>
                            
                            <label for="editVideoTitle">Title:</label>
                            <input type="text" id="editVideoTitle" name="editVideoTitle" required>
                            
                            <label for="editVideoDescription">Description:</label>
                            <textarea id="editVideoDescription" name="editVideoDescription" required></textarea>
                            
                            <label for="editVideoLink">Link:</label>
                            <input type="url" id="editVideoLink" name="editVideoLink" required>
                            
                            <label for="editVideoLiveAt">Live At:</label>
                            <input type="datetime-local" id="editVideoLiveAt" name="editVideoLiveAt" required>
                            
                            <label for="editVideoImage">Image:</label>
                            <input type="file" id="editVideoImage" name="editVideoImage" accept="image/*">
                            
                            <button type="button" id="updateVideoButton" class="btn">Update</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script src="video.js"></script>
</body>
</html>
