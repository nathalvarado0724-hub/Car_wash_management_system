<?php
class Inventory {
    private PDO $conn;
    private string $table = "inventory_tb";

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    /**
     * Fetch all inventory items
     */
    public function getAllItems(): array {
        $sql = "SELECT * FROM {$this->table} ORDER BY inventory_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Add a new inventory item
     */
    public function addItem(string $name, string $desc, int $qty, float $price, string $image): bool {
        $sql = "INSERT INTO {$this->table} (item_name, item_img, description, quantity, unit_price, date_added)
                VALUES (:name, :img, :desc, :qty, :price, NOW())";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':name'  => $name,
            ':img'   => $image,
            ':desc'  => $desc,
            ':qty'   => $qty,
            ':price' => $price
        ]);
    }

    /**
     * Delete an inventory item by ID
     */
    public function deleteItem(int $id): bool {
        $sql = "DELETE FROM {$this->table} WHERE inventory_id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    /**
     * Get single item details (optional but useful)
     */
    public function getItemById(int $id): ?array {
        $sql = "SELECT * FROM {$this->table} WHERE inventory_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
        return $item ?: null;
    }
}
?>
