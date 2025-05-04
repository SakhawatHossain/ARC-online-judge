<?php
    require '../db_connect/db_connection.php';
    $handle = $email = $password ='';

    // Start the session
session_start();

//login......
if (isset($_POST['Login'])) {

    $email = $_POST['l_email'];
    $password = $_POST['l_password'];

     // Check if admin
     if ($email === 'admin@arcoj.com' && $password === 'Admin123') {
        $_SESSION['admin'] = true;
        header("Location: ../admin_panel/index.php");
        exit();
    }

    // user
    $result = mysqli_query($conn, "SELECT * FROM user WHERE email ='$email'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row['password']) {
            // Set session variables
            $_SESSION['user_id'] = $row['user_id'];
            header("Location: ../landing.php");
            exit();
        } else {
            echo "<script> alert('Wrong Password'); </script>";
        }
    } else {
        echo "<script> alert('User Not Registered'); </script>";
    }
}

// if (file_exists('../landing.php')) {
//     echo "File exists.";
// } else {
//     echo "File does not exist.";
// }



//signup.....
    $errors = array('handle' => '', 'email' => '', 'password' => '');

    if(isset($_POST['Signup'])){


        // check handle
        if(empty($_POST['handle'])){
            $errors['handle'] = 'A User handle is required';
            echo "<script> alert('A User handle is required') </script>";
        } else{
            $handle = $_POST['handle'];
            // if(!preg_match('/^[a-zA-Z\s]+$/', $handle)){
            //     $errors['handle'] = 'handle must be letters and spaces only';
            //     echo "<script> alert('Name must be letters and spaces only') </script>";
            // }
        }

        // check email
        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required';
            echo "<script> alert('An email is required') </script>";
        } else{
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email must be a valid email address';
                echo "<script> alert('Email must be a valid email address') </script>";
            }
        }




       //Validates password
        // if(!empty($_POST["password"])) {
        //    $password = $_POST["password"];
        //    if (strlen($_POST["password"]) <= '6') {
        //        $errors['password'] = "Your Password Must Contain At Least 6 Characters!";
        //        echo "<script> alert('Your Password Must Contain At Least 6 Characters!') </script>";
        //    }
        //    elseif(!preg_match("#[0-9]+#",$password)) {
        //        $errors['password'] = "Your Password Must Contain At Least 1 Number!";
        //        echo "<script> alert('Your Password Must Contain At Least 1 Number!') </script>";
        //    }
        //    elseif(!preg_match("#[A-Z]+#",$password)) {
        //        $errors['password'] = "Your Password Must Contain At Least 1 Capital Letter!";
        //        echo "<script> alert('Your Password Must Contain At Least 1 Capital Letter!') </script>";
        //    }
        //    elseif(!preg_match("#[a-z]+#",$password)) {
        //        $errors['password'] = "Your Password Must Contain At Least 1 Lowercase Letter!";
        //        echo "<script> alert('Your Password Must Contain At Least 1 Lowercase Letter!') </script>";
        //    } 
        // }



        if(array_filter($errors)){
            //echo 'errors in form';
        } 
        else {
            // escape sql chars
            $handle = mysqli_real_escape_string($conn, $_POST['handle']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            //check information repeat
            $duplicate= mysqli_query($conn,"SELECT * FROM user WHERE email='$email'");
            if(mysqli_num_rows($duplicate)>0){
                echo "<script> alert('Email Has ALready Taken') </script>";
            }

            else{
                // create sql
                $sql="INSERT INTO user(handle,email,password) VALUES('$handle' ,'$email' ,'$password')";

                 // save to db and check
                if(mysqli_query($conn, $sql)){
                    echo "<script>
                    alert('New User Added Successfully!');
                    window.location.href = 'index.php';
                </script>";
                }
                else {
                   echo 'query error: '. mysqli_error($conn);
                }
            }
            
        }

    } // end POST check    

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles_index.css">
    <title>Login-signup</title>
</head>
<body>
    <div class="container">
        <div class="signin-signup">
            <form action="" method="post" class="sign-in-form">
                <h2 class="title">Log in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="E-mail" name="l_email" value="<?php echo htmlspecialchars($email) ?>">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password"  name="l_password" value="<?php echo htmlspecialchars($password) ?>">
                </div>
                <input type="submit" name= "Login" value="Login" class="btn">
                <p class="social-text">Or Sign with Google</p>
                <div class="social-media">
                    <!-- <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a> -->
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <!-- <a href="" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a> -->
                </div>
                <p class="account-text">Don't have an account? <a href="#" id="sign-up-btn2">Sign up</a></p>
            </form>
            <form action=""  method="post" class="sign-up-form">
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="handle" name="handle" value="<?php echo htmlspecialchars($handle) ?>">
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Email" name="email" value="<?php echo htmlspecialchars($email) ?>">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password"  value="<?php echo htmlspecialchars($password) ?>">
                </div>
                <input type="submit" name ="Signup" value="Sign up" class="btn">
                <p class="social-text">Or Sign in with social platform</p>
                <div class="social-media">
                    <!-- <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a> -->
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <!-- <a href="" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a> -->
                </div>
                <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Sign in</a></p>
            </form>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <img src="arc-removebg-preview.png" alt="" class="image">
                <div class="content">
                    <h3>Already have account?</h3>
                    <p>Let's Start your journey again</p>
                    <button class="btn" id="sign-in-btn">Log in</button>
                </div>
                <!-- <img src="arc-removebg-preview.png" alt="" class="image"> -->
            </div>
            <div class="panel right-panel">
                <img src="arc-removebg-preview.png" alt="" class="image">
                <div class="content">
                    <h3>New to Coding?</h3>
                    <p>Start Your Problem solving with Arch OJ today.</p>
                    <button class="btn" id="sign-up-btn">Sign up</button>
                </div>
                <!-- <img src="arc-removebg-preview.png" alt="" class="image"> -->
            </div>
        </div>
    </div>
    <script src="app.js"></script>
</body>
</html>