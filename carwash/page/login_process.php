<?php

require_once '../model/db_connection.php';
require_once '../model/user.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
    $name = trim($_POST['name']);
    $pass = $_POST['pass'];

    $db = (new Database())->connect();
    $user = new User($db);

    $result = $user->login($name, $pass);

    if ($result === true) {
        header("Location: ../views/home.php");
        exit;
    } else {
        echo "<script>alert('$result'); window.history.back();</script>";
    }
}
?>
