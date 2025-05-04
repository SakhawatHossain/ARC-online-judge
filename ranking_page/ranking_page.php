<!DOCTYPE html>
<html lang="en">
  <head>
    <head>
<title>ARC Oj</title>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style.css">
    </head>

    <body>
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
                  <a href="../profile\profile.php">
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
      <main id="hero" class="main">




        
<section class="ranking-section">
  <h2 class="section-title"  style="font-family: 'Roboto', sans-serif; font-size: 24px;">    Ranking</h2>
  <table>
    <tr style="font-family: 'Roboto', sans-serif; font-size: 24px; color:yellow;">
      <th>User</th>
      <th>User ID</th>
      <th>Handle</th>
      <th>Rating</th>
      <th>Solved</th>
      <th></th>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <?php
    session_start();
    require '../db_connect/db_connection.php'; 

    $sql = "SELECT u.user_id, u.handle, u.rating, COUNT(ps.problem_id) as accepted_problems_count
            FROM user u
            JOIN problem_status ps ON u.user_id = ps.user_id
            WHERE ps.verdict = 'accepted'
            GROUP BY u.user_id, u.rating
            ORDER BY u.rating DESC;";

    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
    ?>
<form action="../profile/profile.php"  method="POST">    
    <tr style="font-family: 'Roboto', sans-serif;">
    <td style="text-align: center; vertical-align: middle;"><img src="profile.avif" alt="Profile Picture" class="profile-picture"></td>
<td style="text-align: center; vertical-align: middle;"><?php echo htmlspecialchars($row['user_id']); ?></td>
<td style="text-align: center; vertical-align: middle;"><?php echo htmlspecialchars($row['handle']); ?></td>
<td style="text-align: center; vertical-align: middle;"><?php echo htmlspecialchars($row['rating']); ?></td>
<td style="text-align: center; vertical-align: middle;"><?php echo htmlspecialchars($row['accepted_problems_count']); ?></td>
<td style="text-align: center; vertical-align: middle;"><button class="register-button" name="profile" value="<?php echo htmlspecialchars($row['user_id']); ?>">Profile</button></td>

    </tr>

    <?php
    }
    ?>

<form>
  </table>
</section>



      </main>
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
    </body>
</html>