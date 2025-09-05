<?php

require_once '../model/db_connection.php';
require_once '../model/user.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $contact = trim($_POST['contact']);
    $pass = $_POST['pass'];

    // Connect DB
    $database = new Database();
    $db = $database->connect();

    // Create user model
    $user = new User($db);

    // Register user
    $result = $user->register($name, $email, $contact, $pass);

    // Response
    if ($result === true) {
        echo "<script>alert('Registration successful!'); window.location.href='../views/login.php';</script>";
    } else {
        echo "<script>alert('$result'); window.history.back();</script>";
    }
}
?>
