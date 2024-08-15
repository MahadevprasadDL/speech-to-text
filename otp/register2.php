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
                // Create User
                $password = md5($password); 
                $sql = "INSERT INTO users(username, email, password) VALUES('$username','$email','$password')";
                mysqli_query($db, $sql);
                $_SESSION['message'] = "You are now registered";
                $_SESSION['username'] = $username;
                header("location: register3.php"); 
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
    <title>Register</title>
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
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-register {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .form-register h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .navbar {
            margin-bottom: 0;
        }
        .site-title {
            margin-bottom: 20px;
        }
    </style>
    <script>
        function validatePasswords(event) {
            var password = document.getElementById('password').value;
            var password2 = document.getElementById('password2').value;
            if (password !== password2) {
                document.getElementById('password2').setCustomValidity('Re-enter password is incorrect');
                event.preventDefault(); // Prevent form submission
            } else {
                document.getElementById('password2').setCustomValidity('');
            }
        }

        function validateUsername(event) {
            var username = document.getElementById('username').value;
            var regex = /^[a-zA-Z]+$/;
            if (!regex.test(username)) {
                document.getElementById('username').setCustomValidity('Please enter alphabets only');
                event.preventDefault(); // Prevent form submission
            } else {
                document.getElementById('username').setCustomValidity('');
            }
        }
    </script>
</head>
<body>

<div class="container">
    <div class="form-register">
        <h2>Register</h2>
        <form action="register.php" method="POST" onsubmit="validatePasswords(event); validateUsername(event);">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required oninput="validateUsername(event)">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required oninput="validatePasswords(event)">
            </div>
            <div class="form-group">
                <label>Re-enter Password</label>
                <input type="password" class="form-control" id="password2" name="password2" placeholder="Re-enter Password" required oninput="validatePasswords(event)">
            </div>

            <button type="submit" class="btn btn-primary btn-lg" name="register_btn">Register</button>
        </form>
    </div>
</div>

</body>
</html>
