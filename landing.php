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
        <!-- <a href="#hero" class="logo clr-transition">ArcOJ</a> -->
        <img src="arc-removebg-preview.png" alt="ArcOJ" class="logo clr-transition" style="height:100px; width:150px;">

        <nav class="navbar">
          <ul class="nav-items" style="font-family: 'Roboto', sans-serif; font-size: 24px;">
            <li class="nav-item"><a href="#hero" class="nav-link clr-transition">Home</a></li>
            <li class="nav-item"><a href="./contest_page/contest_page.php" class="nav-link clr-transition">Contests</a></li>
            <li class="nav-item"><a href="./problem_list/problem_list.php" class="nav-link clr-transition">Problems</a></li>
            <li class="nav-item"><a href="./blog_page/blog_page.php" class="nav-link">Blogs</a></li>
            <li class="nav-item"><a href="ranking_page/ranking_page.php" class="nav-link">Ranking</a></li>
            <li class="nav-item"><a href="#contact" class="nav-link clr-transition">Contact</a></li>
          </ul>
          <div class="social-links">
            <ul>
              <li class="profile">
                <a href="profile\profile.php">
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
        <section class="section section-one">
          <div class="container hook-container">
            <h1 class="hook-title clr-transition" style="font-family: 'Roboto', sans-serif; font-size: 64px;">Welcome To ARC OJ</h1>
            <h2 class="hook-sub_title clr-transition">A Kick start of your problem solving</h2>
            <!-- <div class="hero-btns-container">
              <a href="./contest_page/contest_page.html"><button class="button btn-hero btn-primary buy-hero-btn">More Contests</button></a>
      <!--        <button class="button btn-hero btn-second-alt"><i class="bx bx-map in-btn-icon"></i> FIND IN STORE</button>   -->
            <!-- </div> -->
          <!-- </div>
       
          <img src="" alt="woman licking ice cream and smiling" class="hero-lady-img" loading="lazy"> -->
             
        </section>



        
        <!-- --- section two --- -->
        <section id="products" class="section section-two container">
          <div class="s-two-upper-info">
            
          </div>
          
          </div>
          
<h1 style="font-family: 'Roboto', sans-serif; font-size: 24px; color:rgb(255, 141, 1);">Welcome! @admin</h1>
<h1 style="font-family: 'Roboto', sans-serif; font-size: 20px;" id="current-date"></h1>
<script>
  document.getElementById('current-date').textContent = new Date().toLocaleDateString();
</script>
<br>
<h1 style="font-family: 'Roboto', sans-serif; font-size: 24px; color: #3498db;">
  Welcome to the new ArcOJ website. This new version contains a new faster judge and modern UI.
  
  As this time we have completely written the site from scratch, there can be a few bugs. Also, it is a great opportunity to add new features. Feel free to raise issues on our Github tracking repository if you see any bug or if you want to have some feature on this new ArcOJ.
  
  Some features - (Ranking, Problem Locking, Learning Section, Tutorial, etc) are still in development and will be coming soon...
</h1>

<div>
<div class="s-two-products">
            <div class="product product-one">
              <h3 class="price pos-abs-center">Time Left: <span id="time-left-1">--:--:--</span></h3>
              <img src="contest1.jpeg" alt="ice cream with honey" loading="lazy">
              <h3 class="buy-btn pos-abs-center">Registration</h3>
              <h3 class="name pos-abs-center">ARC Round 4 <b>Lev.3</b></h3>
            </div>
            <div class="product product-two">
              <h3 class="price pos-abs-center">Time Left: <span id="time-left-2">--:--:--</span></h3>
              <img src="contest2.jpg" alt="ice cream with honey" loading="lazy">
              <h3 class="buy-btn pos-abs-center">Registration</h3>
              <h3 class="name pos-abs-center">ARC Round 3  <b>Lev.2</b></h3>
            </div>
            <div class="product product-three">
              <h3 class="price pos-abs-center">Time Left: <span id="time-left-3">--:--:--</span></h3>
              <img src="contest3.jpg" alt="ice cream with honey" loading="lazy">
              <h3 class="buy-btn pos-abs-center">Registration</h3>
              <h3 class="name pos-abs-center">ARC Round 2  <b>Lev.2</b></h3>
            </div>

 </div>
        </section>




        



        
        <!-- section three -->
        <section class="section section-three container">
          <div class="s-three-upper-img-container">
            <img src="Shayan.webp" alt="" loading="lazy">
          </div>
          <div class="s-three-lower-container">
            <h3 class="s-three-title" style="font-family: 'Roboto', sans-serif; font-size: 44px;">Daily Dose by Shayan</h3>
            <p class="s-three-desc s-definition">Problem solving Discussion</p>
    <!--    <span class="s-three-price">12$</span>  -->
    <button class="button ad-buy-btn" onclick="window.open('https://youtu.be/s1OW3FK57os?si=FVdNjeXYa_SobQn8', '_blank');">Watch It Out!</button>


          </div>
        </section>

        <!-- section four -->
        <section id="about" class="section section-four container">
          <div class="oath-container">
            <h3 class="s-three-title s-four-title">Hall of Fame</h3>
            <p class="s-three-desc s-definition">        </p>

            <div class="employer-info">
              <div class="employer">
                <h4 class="name">Peking University</h4>
                <h5 class="title">The 2024 World Champions</h5>
              </div>
              <div class="rate">
        <!--        <img src="https://raw.githubusercontent.com/r-e-d-ant/eCream/10f900e25c09257926b5c2a00a5d22262723bc5b/assets/images/rate.svg" alt="">  -->

              </div>
            </div>
          </div>
          <div class="waiter-img-container">
            <img src="peaking uni.jpg" alt="">
          </div>
        </section>

        <!-- section five -->
        <section class="section-five container">
          <div class="promo-card">
            <div class="promo-info-container">
              <h2 class="promo-title s-three-title">Flat 70% OFF, Hurry up before the time ends</h2>
              <p class="promo-description s-definition">MASTER BLASTERS ARE IN CPS ACADEMY</p>
              <button class="button ad-buy-btn promo-btn">Enroll Now</button>
            </div>
            <img src="cps.jpg" alt="woman licking eating cream">
          </div>
        </section>
      </main>





<?php
    $db_file = './db_connect/db_connection.php';
    if (file_exists($db_file)) {
        require $db_file;
    } else {
        die('Database connection file not found.');
    }
$message = $name = $email = '';

if (isset($_POST['msg'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $user_id = 6; // Define $user_id (replace with appropriate value)   $_SESSION['user_id']

    $sql = "INSERT INTO message(name, email, message, from_id) VALUES('$name', '$email', '$message', '$user_id')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Message sent successfully!");</script>';
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
}
?>







<footer id="contact" class="footer container">
    <h2 class="footer-title">Contact us to set a Contest</h2>
    <form class="contact-form" action="" method="post">
        <div class="name-email-inputs-container">
            <div class="form-control">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" class="normal-input all-input" name="name">
            </div>
            <div class="form-control">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" class="normal-input all-input" name="email">
            </div>
        </div>
        <div class="form-control">
            <label for="message" class="form-label">Message</label>
            <textarea id="message" class="textarea-input all-input" name="message"></textarea>
        </div>
        <button type="submit" class="send-msg-btn button ad-buy-btn" name="msg">SEND</button>
    </form>








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