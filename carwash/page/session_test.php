<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 123;
    echo "Session started and user_id set.";
} else {
    echo "Welcome back! Your user_id is " . $_SESSION['user_id'];
}