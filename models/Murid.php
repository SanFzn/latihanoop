<?php
class Murid {
    private $conn;
    private $table = "murid";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //READ
    public function getAll() {
        $query = "SELECT m.*, j.nama AS nama_jurusan, k.nama AS nama_kelas 
        FROM $this->table m
        LEFT JOIN jurusan j ON m.id_jurusan = j.id
        LEFT JOIN kelas k ON m.id_kelas = k.id";
        return $this->conn->query($query);
    }

    //CREATE
    public function create($nama, $id_jurusan, $id_kelas) {
        $query = "INSERT INTO $this->table (nama, id_jurusan, id_kelas) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sii", $nama, $id_jurusan, $id_kelas);
        return $stmt->execute();
    }

    //GET BY ID
    public function getById($id) {
        $query = "SELECT m.*, j.nama AS nama_jurusan, k.nama AS nama_kelas
        FROM $this->table m
        LEFT JOIN jurusan j ON m.id_jurusan = j.id
        LEFT JOIN kelas k ON m.id_kelas = k.id
        WHERE m.id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    //UPDATE
    public function update($id, $nama, $id_jurusan, $id_kelas) {
        $query = "UPDATE $this->table SET nama=?, id_jurusan=?, id_kelas=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("siii", $nama, $id_jurusan, $id_kelas, $id);
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
            $query = "SELECT COUNT(*) as total FROM $this->table
                    WHERE nama LIKE ? OR jurusan LIKE ?";
            $stmt = $this->conn->prepare($query);
            $like = "%$keyword%";
            $stmt->bind_param("ss", $like, $like);
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
                    WHERE nama LIKE ? OR jurusan LIKE ?
                    LIMIT ?, ?";
            $stmt = $this->conn->prepare($query);
            $like = "%$keyword%";
            $stmt->bind_param("ssii", $like, $like, $start, $limit);
        } else {
            $query = "SELECT * FROM $this->table LIMIT ?, ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ii", $start, $limit);
        }

        $stmt->execute();
        return $stmt->get_result();
    }
}
?>