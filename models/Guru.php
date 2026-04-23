<?php
class Guru {
    private $conn;
    private $table = "guru";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //READ
    public function getAll() {
        $query = "SELECT g.*, m.nama AS nama_mapel 
        FROM $this->table g
        LEFT JOIN mapel m ON g.id_mapel = m.id";
        return $this->conn->query($query);
    }

    //CREATE
    public function create($nama, $jeniskelamin, $nip, $id_mapel, $jabatan) {
        if (!in_array($jeniskelamin, ['L', 'P'])) {
            return false;
        }
        if (!preg_match('/^[0-9]+$/', $nip)) {
            return false;
        }
        $query = "INSERT INTO $this->table (nama, jenis_kelamin, nip, id_mapel, jabatan) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssiss", $nama, $jeniskelamin, $nip, $id_mapel, $jabatan);
        return $stmt->execute();
    }

    //GET BY ID
    public function getById($id) {
        $query = "SELECT g.*, m.nama AS nama_mapel
        FROM $this->table g
        LEFT JOIN mapel m ON g.id_mapel = m.id
        WHERE g.id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    //UPDATE
    public function update($id, $nama, $jeniskelamin, $nip, $id_mapel, $jabatan) {
        if (!in_array($jeniskelamin, ['L', 'P'])) {
            return false;
        }
        if (!preg_match('/^[0-9]+$/', $nip)) {
            return false;
        }
        $query = "UPDATE $this->table SET nama=?, jenis_kelamin=?, nip=?, id_mapel=?, jabatan=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssissi", $nama, $jeniskelamin, $nip, $id_mapel, $jabatan, $id);
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
                    WHERE nama LIKE ? OR mapel LIKE ?";
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
                    WHERE nama LIKE ? OR mapel LIKE ?
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