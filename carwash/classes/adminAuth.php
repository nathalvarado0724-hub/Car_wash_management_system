<?php
class AdminAuth {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }
public function login($username, $password) {
    $sql = "SELECT * FROM admin_users_tb WHERE name = ?";
    $stmt = $this->conn->prepare($sql);
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $this->conn->errorInfo()[2]);
    }

    $stmt->execute([$username]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) === 1) {
        $user = $result[0];
        if (password_verify($password, $user['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_name'] = $user['name'];
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

}
?>
