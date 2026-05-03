<?php
class Jurusan {
    private $conn;
    private $table = "jurusan";

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

    //HITUNG TOTAL DATA
    public function countAll($keyword = null) {
        if ($keyword) {
            $query = "SELECT COUNT(*) as total
                FROM $this->table
                WHERE nama LIKE ?
                OR nip LIKE ?
                OR jenis_kelamin LIKE ?
                OR jabatan LIKE ?";
            $stmt = $this->conn->prepare($query);
            $like = "%$keyword%";
            $stmt->bind_param("ssss", $like, $like, $like, $like);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc()['total'];
        } else {
            $query = "SELECT COUNT(*) as total FROM $this->table";
            return $this->conn->query($query)->fetch_assoc()['total'];
        }
    }

    //GET DATA + SEARCH + LIMIT
    public function getData($start, $limit, $keyword = null) {
        if ($keyword) {
            $query = "SELECT * FROM $this->table
                WHERE nama LIKE ?
                OR nip LIKE ?
                OR jenis_kelamin LIKE ?
                OR jabatan LIKE ?
                LIMIT ?, ?";
            $stmt = $this->conn->prepare($query);
            $like = "%$keyword%";
            $stmt->bind_param("sssii", $like, $like, $like, $like, $start, $limit);
        } else {
            $query = "SELECT * FROM $this->table
                    LIMIT ?, ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ii", $start, $limit);
        }

        $stmt->execute();
        return $stmt->get_result();
    }
}
?>