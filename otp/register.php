<?php
session_start();
//database
$db = mysqli_connect("localhost", "root", "", "mysite");
if (isset($_POST['register_btn'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($db, $query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo '<script language="javascript">';
            echo 'alert("Username already exists")';
            echo '</script>';
        } else {
            if ($password == $password2) {
                $password = md5($password);
                $sql = "INSERT INTO users(username, email, password) VALUES('$username','$email','$password')";
                mysqli_query($db, $sql);
                $_SESSION['message'] = "You are now logged in";
                $_SESSION['username'] = $username;
                header("location:home.php");
            } else {
                $_SESSION['message'] = "The two passwords do not match";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>OTP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-image: url('image/back.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }
        .form-register {
            background-color: rgba(220, 220, 220, 10);
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <hgroup>
        <h1 class="site-title" style="text-align: center; color: white;">Voice-Based OTP Verification System</h1><br>
    </hgroup>

    <br>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav center">
                    <li><a href="index.html">Log In</a></li>
                    <li><a href="register2.php">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <form class="form-register" action="register.php" method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp"
                   placeholder="Username" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="Email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" id="Password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label>Re-enter Password</label>
            <input type="password" class="form-control" name="password2" id="RePassword" placeholder="Re-enter Password"
                   required>
        </div>

        <button type="submit" class="btn btn-primary btn-lg" name="register_btn">Register</button>
    </form>
    
    <script>
        $("#login-button").click(function () {
            window.location.replace("index.php");
        });
    </script>
</div>

</body>
</html>
