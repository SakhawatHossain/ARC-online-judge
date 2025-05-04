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



        <h1>Problem Sections</h1>

        <div class="section" id="section1"  style="font-family: 'Roboto', sans-serif;">
            <h2>Problem Title</h2>

<?php


session_start();
require '../db_connect/db_connection.php'; 

$sql="SELECT * FROM `problem`";

$count=1;
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
  $problem_id=$row['problem_id']; 


  $s="SELECT 
    SUM(CASE WHEN verdict = 'Accepted' THEN 1 ELSE 0 END) AS accepted_count,
    SUM(CASE WHEN verdict = 'Wrong Answer' OR verdict = 'Accepted' THEN 1 ELSE 0 END) AS wrong_answer_count
FROM 
    problem_status
WHERE 
    problem_id = $problem_id";


$res = $conn->query($s);
if ($res->num_rows > 0) {
  $r = $res->fetch_assoc();


?>



<form action="./problem/problem.php"  method="POST"> 


            <div class="problem-row">
                <span class="problem-title"><?php echo htmlspecialchars($row['title'])?></span>
                <span class="problem-rating">Difficulty: <?php echo htmlspecialchars($row['difficulty'])?></span>
                <span class="problem-solves">Solves: <?php echo htmlspecialchars($r['accepted_count'])?> / <?php echo htmlspecialchars($r['wrong_answer_count'])?></span>
                <button class="solve-button" name="problem_id" value="<?php echo htmlspecialchars($problem_id)?>">Solve</button></a>
            </div>
           
<form>

<?php
    }
}
?>








            <!-- Add more problem rows here -->
        </div>
 
            <!-- Add more problem rows here -->
        </div>






        

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