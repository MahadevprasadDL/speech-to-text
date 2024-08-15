<?php
session_start();

if (isset($_POST['submit_otp'])) {
    $otp = $_POST['otp'];
    if ($otp == $_SESSION['otp']) {
        echo '<div class="alert alert-success" role="alert">OTP Verified Successfully!</div>';
        unset($_SESSION['otp']);
        header("location: success.php");
        exit();
    } else {
        echo '<div class="alert alert-danger" role="alert">Invalid OTP!</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Voice Based OTP Verification System
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    body {
        background-color: #f8f9fa;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .otp-container {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
        margin-bottom: 15px;
    }
    .btn {
        width: 100%;
    }
  </style>
  <script>
    function startDictation() {
        if (window.hasOwnProperty('webkitSpeechRecognition')) {
            var recognition = new webkitSpeechRecognition();
            recognition.continuous = false;
            recognition.interimResults = false;
            recognition.lang = "en-US";
            recognition.start();
            
            recognition.onresult = function(e) {
                document.getElementById('otp').value = e.results[0][0].transcript;
                recognition.stop();
            };
            
            recognition.onerror = function(e) {
                recognition.stop();
            }
        }
    }
  </script>
</head>
<body>
<div class="otp-container">
    <h2 class="text-center">Voice Based OTP Verification System
</h2>
    <form action="otp.php" method="POST">
        <div class="form-group">
            <label for="otp">Enter OTP</label>
            <input type="text" id="otp" name="otp" class="form-control" required>
        </div>
        <button type="button" class="btn btn-info" onclick="startDictation()">Speak OTP</button>
        <button type="submit" class="btn btn-primary" name="submit_otp">Submit</button>
    </form>
</div>
</body>
</html>
