<?php
class MessageManager {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "cwms_db");

        if ($this->conn->connect_error) {
            die("DB connection failed: " . $this->conn->connect_error);
        }
    }

    public function getMessages() {
        $sql = "SELECT * FROM message_tb ORDER BY submitted_at DESC";
        $result = $this->conn->query($sql);

        $messages = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $messages[] = $row;
            }
        }
        return $messages;
    }

    public function deleteMessage($id) {
        $stmt = $this->conn->prepare("DELETE FROM message_tb WHERE message_id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function __destruct() {
        $this->conn->close();
    }
}
?>
