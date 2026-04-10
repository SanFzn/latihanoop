<?php

class Murid {
    private $conn;
    private $table = "murid";

    public function __construct($db) {
        $this->conn = $db;
    }

    // READ
    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        return $this->conn->query($query);
    }

    // CREATE
    public function create($nama, $jurusan) {
        $query = "INSERT INTO " . $this->table . " (nama, jurusan) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $nama, $jurusan);
        return $stmt->execute();
    }

    // GET BY ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // UPDATE
    public function update($id, $nama, $jurusan) {
        $query = "UPDATE " . $this->table . " SET nama = ?, jurusan = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $nama, $jurusan, $id);
        return $stmt->execute();
    }

    // DELETE
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>