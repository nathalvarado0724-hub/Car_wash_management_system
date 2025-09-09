<?php
session_start();


require_once '../model/db_msg_connect.php';
require_once '../model/message.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $database = new Database();
    $db = $database->getConnection();

    $message = new Message($db);

    $message->user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    $message->contact_number = $_POST['contact_number'] ?? null;
    $message->email = $_POST['email'] ?? null;
    $message->subject = $_POST['subject'] ?? null;
    $message->message = $_POST['message'] ?? null;
    $message->rating = $_POST['rating'] ?? null;

    if (!$message->contact_number || !$message->email || !$message->message || !$message->rating) {
        echo "<script>alert('Please fill in all required fields.'); window.history.back();</script>";
        exit;
    }

    if (!filter_var($message->email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.'); window.history.back();</script>";
        exit;
    }

    if ($message->create()) {
        echo "<script>alert('Thank you for your feedback!'); window.location.href='../views/contact.php';</script>";
    } else {
        echo "<script>alert('Failed to send feedback. Please try again.'); window.history.back();</script>";
    }
} else {
    header("Location: ../views/contact.php");
    exit;
}
?>
