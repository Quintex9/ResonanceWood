<?php
class Inquiry
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db->getConnection();
    }

    public function index()
    {
        $stmt = $this->conn->prepare("SELECT * FROM inquiries ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function destroy($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM inquiries WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>
