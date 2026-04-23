<?php
class Kelas {
    private $conn;
    private $table = "kelas";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //READ
    public function getAll() {
        $query = "SELECT * FROM $this->table";
        return $this->conn->query($query);
    }

    //CREATE
    public function create($nama) {
        $query = "INSERT INTO $this->table (nama) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $nama);
        return $stmt->execute();
    }

    //GET BY ID
    public function getById($id) {
        $query = "SELECT * FROM $this->table WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    //UPDATE
    public function update($id, $nama) {
        $query = "UPDATE $this->table SET nama=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $nama, $id);
        return $stmt->execute();
    }

    //DELETE
    public function delete($id) {
        $query = "DELETE FROM $this->table WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>