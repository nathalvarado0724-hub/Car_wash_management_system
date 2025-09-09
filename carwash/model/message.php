<?php
class Message {
    private $conn;
    private $table_name = "message_tb";

    public $user_id;
    public $contact_number;
    public $email;
    public $subject;
    public $message;
    public $rating;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
            $query = "INSERT INTO " . $this->table_name . "
              SET user_id = :user_id,
                  contact_number = :contact_number,
                  email = :email,
                  subject = :subject,
                  message = :message,
                  rating = :rating";

        $stmt = $this->conn->prepare($query);

        // sanitize input
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->contact_number = htmlspecialchars(strip_tags($this->contact_number));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->subject = htmlspecialchars(strip_tags($this->subject));
        $this->message = htmlspecialchars(strip_tags($this->message));
        $this->rating = htmlspecialchars(strip_tags($this->rating));

        // bind parameters
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':contact_number', $this->contact_number);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':subject', $this->subject);
        $stmt->bindParam(':message', $this->message);
        $stmt->bindParam(':rating', $this->rating);

        return $stmt->execute();
    }
}
?>
