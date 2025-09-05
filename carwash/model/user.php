<?php
class User {
    private $conn;
    private $table = "user_tb";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($name, $email, $contact, $password) {
        if (empty($name) || empty($email) || empty($contact) || empty($password)) {
            return "All fields are required.";
        }

        // Check for existing email
        $check = $this->conn->prepare("SELECT * FROM {$this->table} WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $result = $check->get_result();
        if ($result->num_rows > 0) {
            return "Email already registered.";
        }

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (username, email, contact, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $contact, $hashedPassword);

        if ($stmt->execute()) {
            return true;
        } else {
            return "Error: " . $stmt->error;
        }
    }

public function login($name, $password) {
    if (empty($name) || empty($password)) {
        return "Username and password are required.";
    }

    $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE username = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            return true;
        } else {
            return "Invalid password.";
        }
    } else {
        return "User not found.";
    }
}

}
?>
