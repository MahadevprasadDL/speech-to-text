<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $lastname = $_POST['lastname'];
    $contact = $_POST['contact'];

    echo "Registration successful!";
}
?>
