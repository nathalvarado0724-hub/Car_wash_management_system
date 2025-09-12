<?php
session_start();
require_once '../model/admin_db.php';
require_once '../classes/adminAuth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Change here if your form uses 'name' and 'pass'
    $username = $_POST['name'] ?? '';
    $password = $_POST['pass'] ?? '';

    $db = new Database();
    $conn = $db->connect();

    $auth = new AdminAuth($conn);

    try {
        if ($auth->login($username, $password)) {
            header("Location: ../views/admin/dashboard.php");
            exit();
        } else {
            echo "<script>alert('❌ Invalid username or password'); window.location.href='../views/admin/admin_login.php';</script>";
            exit();
        }
    } catch (Exception $e) {
        echo "<script>alert('Error: " . addslashes($e->getMessage()) . "'); window.location.href='../views/admin/admin_login.php';</script>";
        exit();
    }
}
