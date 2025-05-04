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
        <img src="../../arc-removebg-preview.png" alt="ArcOJ" class="logo clr-transition" style="height:100px; width:150px;">
          <nav class="navbar">
            <ul class="nav-items" style="font-family: 'Roboto', sans-serif; font-size: 24px;">
              <li class="nav-item"><a href="../../landing.php" class="nav-link clr-transition">Home</a></li>
              <!-- <li class="nav-item"><a href="../../contest_page/contest_page.php" class="nav-link clr-transition">Contests</a></li> -->
              <li class="nav-item"><a href="../../problem_list/problem_list.php" class="nav-link clr-transition">Problems</a></li>
              <li class="nav-item"><a href="../../blog_page/blog_page.php" class="nav-link">Blogs</a></li>
              <li class="nav-item"><a href="../../ranking_page/ranking_page.php" class="nav-link">Ranking</a></li>
              <li class="nav-item"><a href="../../landing.php" class="nav-link clr-transition">Contact</a></li>
            </ul>
            <div class="social-links">
              <ul>
                <li class="profile">
                  <a href="../../profile\profile.html">
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
      <main id="hero" class="main" style="font-family: 'Roboto', sans-serif;">


<?php


session_start();

require '../../db_connect/db_connection.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the user_id from the form submission
  $problem_id = htmlspecialchars($_POST['problem_id']);

}



$sql="SELECT * FROM `problem` WHERE problem_id=$problem_id  ";


$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
  $problem_id=$row['problem_id']; 
?>







        <div class="header">
            <h1><?php echo htmlspecialchars($row['title'])?></h1>
            <div class="user-info">
                <span>time limit per test: <strong>1 seconds</strong></span>
                <span>memory limit per test: <strong>256 megabytes</strong></span>
            </div>
        </div>
    
        <div class="main-container">
            <div class="problem">
                <h2>Problem Statement</h2>
                <p><?php echo htmlspecialchars($row['description'])?></p><br>
    
                <h3>Input</h3>
                <p><?php echo htmlspecialchars($row['input'])?></p><br>
    
                <h3>Output</h3>
                <p><?php echo htmlspecialchars($row['output'])?></p><br>
    
                <h3>Example</h3>
                <p><?php echo htmlspecialchars($row['example'])?></p>

    

                
            </div>
    
<div class="code-submission">
  <h2>Submit Your Code</h2>
  <form action="./judge.php"  id="codeForm" method="POST">
    <textarea id="code" name="code" placeholder="Write your code here" required></textarea><br>
    <input type="hidden" name="problem_id" value="<?php echo htmlspecialchars($row['problem_id']); ?>">
    <button type="submit" name="problem_id" value="<?php echo htmlspecialchars($row['problem_id']); ?>">Submit</button>
  </form>
  <div class="result">
    <h3>Result</h3>
    <pre id="output">Status..</pre>
  </div>
  <!-- <button class="edt-btn" role="button">Editorial</button> -->
</div>

</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
    
<?php

}
?>        







      </main>
      <footer id="contact" class="footer container">

        <div class="other-footer-infos-container">
          <span class="footer-info"><i class="bx bx-map"></i> Address, floor 23, Jupiter</span>
          <span class="footer-info"><i class="bx bx-phone"></i> 22 (923) 3424 4156</span>
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
          <span class="lower-footer-elt copy">copyright © 2024 ARC OJ</span>
          <span class="lower-footer-elt developer">Developed by <a href=" " class="developerportfoliolink" title="developer portfolio link">Team TrioBot</a></span>
          <span class="lower-footer-elt policy"><a href="#" class="policy-link">Privacy • Policy</a></span>
        </div>
      </footer>
      <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
      <script src="script.js"></script>
      <script>
$(document).ready(function(){
    $('#codeForm').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: 'judge.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response){
                $('#output').html(response);
            },
            error: function(){
                $('#output').html('An error occurred. Please try again.');
            }
        });
    });
});


</script>
    </body>
</html>