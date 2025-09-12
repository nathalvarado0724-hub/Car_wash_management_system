<?php
class Service {
    private $conn;

    public function __construct($dbConn) {
        $this->conn = $dbConn;
    }

    public function getAllServices() {
        return $this->conn->query("SELECT * FROM services_tb ORDER BY service_id DESC");
    }

    public function updateService($id, $title, $description, $price, $img_url) {
        $stmt = $this->conn->prepare("UPDATE services_tb SET title=?, description=?, price=?, img_url=? WHERE service_id=?");
        $stmt->bind_param("ssdsi", $title, $description, $price, $img_url, $id);
        return $stmt->execute();
    }

    public function addService($title, $description, $price, $img_url) {
        $stmt = $this->conn->prepare("INSERT INTO services_tb (title, description, price, img_url) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssds", $title, $description, $price, $img_url);
        return $stmt->execute();
    }

    public function deleteService($id) {
        $stmt = $this->conn->prepare("DELETE FROM services_tb WHERE service_id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

?>
