<?php
class Contact{
    private $db;

    public function __construct(Database $database){
        $this->db = $database->getConnection();
    }

    public function index(){
        $stmt = $this->db->prepare("SELECT * FROM contact");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // získam asociativne pole

    }
    public function destroy($id) {
        $stmt = $this->db->prepare("DELETE FROM contact WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function create($name, $phone,$email, $message){
        $stmt = $this->db->prepare("INSERT INTO contact (name, phone,email, message) VALUES (:name, :phone,:email, :message)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        return $stmt->execute();

    }
    public function show($id){
        $stmt = $this->db->prepare("SELECT * FROM contact WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function edit($id, $name, $phone, $email, $message) {
        $stmt = $this->db->prepare("UPDATE contact SET name = :name, phone = :phone,email = :email, 
            message = :message WHERE id = :id");

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        return $stmt->execute();
    }

}