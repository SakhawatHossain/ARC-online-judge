<?php
session_start();
require '../db_connect/db_connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the user_id from the form submission
  $user_id = htmlspecialchars($_POST['profile']);

}

else{
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login_signup/index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

}

$sql = "SELECT rating,handle, name, email, university, picture FROM user WHERE user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
    $handle = $row['handle'];
    $name = $row['name'];
    $email = $row['email'];
    $university = $row['university'];
    $picture = $row['picture'];
    $rating = $row['rating'];

} else {
    echo "0 results";
}

$conn->close();
?>












<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARC Oj</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>

  <body>
    <!-- Header and Navigation -->
    <header class="container">
    <img src="../arc-removebg-preview.png" alt="ArcOJ" class="logo clr-transition" style="height:100px; width:150px;">
      <nav class="navbar">
        <ul class="nav-items" style="font-family: 'Roboto', sans-serif; font-size: 24px;">
          <li class="nav-item"><a href="../landing.php" class="nav-link clr-transition">Home</a></li>
          <li class="nav-item"><a href="../contest_page/contest_page.php" class="nav-link clr-transition">Contests</a></li>
          <li class="nav-item"><a href="../problem_list/problem_list.php" class="nav-link clr-transition">Problems</a></li>
          <li class="nav-item"><a href="../blog_page/blog_page.php" class="nav-link">Blogs</a></li>
          <li class="nav-item"><a href="../ranking_page/ranking_page.php" class="nav-link">Ranking</a></li>
          <li class="nav-item"><a href="../landing.php" class="nav-link clr-transition">Contact</a></li>
        </ul>
        <div class="social-links">
          <ul>
            <li class="profile">
              <a href="../profile\profile.html">
                  <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                      <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                  </svg>
                  <span>Profile</span>
              </a>
          </li>
          </ul>
          <span class="line-divider clr-transition"></span>
          <div class="theme-togglers">
            <i class='bx bxs-sun theme-toggler clr-transition'></i>
            <i class='bx bxs-moon theme-toggler clr-transition'></i>
          </div>
        </div>
      </nav>
      <div class="menu-togglers">
        <i class="bx bx-menu menu-toggle clr-transition"></i>
      </div>
    </header>

    <!-- Main Content (Profile Page) -->
    <main id="hero" class="main">
    <div class="profile-container" >
        <div class="profile-header">
            <img src="<?php echo $picture; ?>" alt="Profile Picture" class="profile-picture">
            <div class="user-info">
                <h2 class="username"style="font-family: 'Roboto', sans-serif; font-size: 34px;"><?php echo $handle; ?></h2>
                <p class="rating">Rating: <?php echo $rating; ?></p>
            </div>
        </div>
        <div class="basic-info" style="font-family: 'Roboto', sans-serif;">
    <p>Name: <?php echo !empty($name) ? $name : "Not Available"; ?></p>
    <p>Email: <?php echo !empty($email) ? $email : "Not Available"; ?></p>
    <p>University: <?php echo !empty($university) ? $university : "Not Available"; ?></p>
</div>
        <button id="edit-button">Edit Profile</button>
        <a href="logout.php"><button id="edit-button">Logout</button></a>
        
        <!-- Rating Graph -->
        <div class="rating-graph-container">
            <canvas id="rating-graph"></canvas>
        </div>
    </div>




<!-- Popup Form -->
<div id="popup-form" class="popup-form">






<?php

require '../db_connect/db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login_signup/index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $university = htmlspecialchars($_POST['university']);

    // Handle file upload
    if (!empty($_FILES['image']['name'])) {
        $image_name = basename($_FILES['image']['name']);
        $target_dir = "../uploads/"; // Make sure this directory exists
        $target_file = $target_dir . time() . "_" . $image_name; // Unique file name

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Update with new image
            $sql = "UPDATE user SET picture=?, name=?, email=?, university=? WHERE user_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $target_file, $name, $email, $university, $user_id);
        } else {
            echo "Error uploading image.";
            exit();
        }
    } else {
        // Update without image
        $sql = "UPDATE user SET name=?, email=?, university=? WHERE user_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $name, $email, $university, $user_id);
    }

    if ($stmt->execute()) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>



<form id="edit-form" class="form-container" action="" method="post" enctype="multipart/form-data">
    <h2>Edit Profile</h2>
    <br>
    <label for="image">Upload an Image for Profile:</label>
    <input type="file" id="image" name="image" accept="image/*"><br><br>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="university">University:</label>
    <input type="text" id="university" name="university" required><br><br>

    <button type="submit" name="edit">Save</button>
    <button type="button" id="close-button">Close</button>
</form>

</div>




    </main>

    <!-- Footer -->
    <footer id="contact" class="footer container">

    <div class="other-footer-infos-container">
          <span class="footer-info"><i class="bx bx-map"></i> floor 7, UIU</span>
          <span class="footer-info"><i class="bx bx-phone"></i> +880 1234567890</span>
          <span class="footer-info"><i class="bx bx-mail-send"></i> arcoj@domain.com</span>
          <div class="footer-social-links">
            <ul>
              <li><i class='bx bxl-instagram-alt nav-icon clr-transition'></i></li>
              <li><i class='bx bxl-twitter nav-icon clr-transition'></i></li>
              <li><i class='bx bxl-facebook-square nav-icon clr-transition'></i></li>
            </ul>
          </div>
        </div>
        <div class="lower-footer">
          <span class="lower-footer-elt copy">copyright © 2025 ARC OJ</span>
          <span class="lower-footer-elt developer">Developed by <a href="https://github.com/SakhawatHossain" class="developerportfoliolink" title="developer portfolio link">Team TrioBot</a></span>
          <span class="lower-footer-elt policy"><a href="#" class="policy-link">Privacy • Policy</a></span>
        </div>
      </footer>
      <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
      <script src="script.js"></script>

    <script>
      // Popup form behavior
      document.getElementById('edit-button').addEventListener('click', function() {
        document.getElementById('popup-form').style.display = 'block';
      });

      document.getElementById('close-button').addEventListener('click', function() {
        document.getElementById('popup-form').style.display = 'none';
      });

      document.getElementById('edit-form').addEventListener('submit', function(event) {
        event.preventDefault();
        
        var username = document.getElementById('username').value;
        var rating = document.getElementById('rating').value;
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var university = document.getElementById('university').value;

        document.querySelector('.username').textContent = username;
        document.querySelector('.rating').textContent = 'Rating: ' + rating;
        document.querySelector('.basic-info').innerHTML = `
          <p>Name: ${name}</p>
          <p>Email: ${email}</p>
          <p>University: ${university}</p>
        `;

        document.getElementById('popup-form').style.display = 'none';
      });

      // Rating Graph using Chart.js
      const ratingData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Rating Progression',
          data: [3.0, 3.2, 3.5, 3.7, 3.9, 4.0, 4.2, 4.3, 4.4, 4.5, 4.6, 4.8],
          borderColor: 'rgba(75, 192, 192, 1)',
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          fill: true,
          tension: 0.1
        }]
      };

      const ctx = document.getElementById('rating-graph').getContext('2d');
      const ratingChart = new Chart(ctx, {
        type: 'line',
        data: ratingData,
        options: {
          responsive: true,
          plugins: {
            legend: { display: false }
          },
          scales: {
            x: { title: { display: true, text: 'Month' } },
            y: {
              title: { display: true, text: 'Rating' },
              min: 0,
              max: 5,
              ticks: { stepSize: 0.5 }
            }
          }
        }
      });
    </script>
  </body>
</html>
