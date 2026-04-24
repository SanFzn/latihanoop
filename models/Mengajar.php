<?php
class Mengajar {
    private $conn;
    private $table = 'mengajar';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT m.id,
                        g.nama AS guru,
                        mp.nama AS mapel,
                        k.nama AS kelas,
                        j.nama AS jurusan
                FROM $this->table m
                JOIN guru g ON m.guru_id = g.id
                JOIN mapel mp ON m.mapel_id = mp.id
                JOIN kelas k ON m.kelas_id = k.id
                JOIN jurusan j ON m.jurusan_id = j.id
                ORDER BY m.id DESC";
        return $this->conn->query($query);
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //CREATE
    public function create($guru_id, $mapel_id, $kelas_id, $jurusan_id) {
        $query = "INSERT INTO $this->table
                (guru_id, mapel_id, kelas_id, jurusan_id)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iiii", $guru_id, $mapel_id, $kelas_id, $jurusan_id);
        return $stmt->execute();
    }

    // GET BY ID
    public function getById($id) {
        $query = "SELECT * FROM $this->table WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // UPDATE
    public function update($id, $guru_id, $mapel_id, $kelas_id, $jurusan_id) {
        $query = "UPDATE $this->table SET
                guru_id=?, mapel_id=?, kelas_id=?, jurusan_id=?
                WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iiiii", $guru_id, $mapel_id, $kelas_id, $jurusan_id, $id);
        return $stmt->execute();
    }

    // DELETE
    public function delete($id) {
        $query = "DELETE FROM $this->table WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    //HITUNG TOTAL DATA
    public function countAll($keyword = null) {
        $query = "SELECT COUNT(*) as total FROM $this->table";
        return $this->conn->query($query)->fetch_assoc()['total'];
    }

    //GET DATA + LIMIT
    public function getAllWithLimit($limit, $offset) {
        $query = "SELECT m.id,
                        g.nama AS guru,
                        mp.nama AS mapel,
                        k.nama AS kelas,
                        j.nama AS jurusan
                FROM $this->table m
                JOIN guru g ON m.guru_id = g.id
                JOIN mapel mp ON m.mapel_id = mp.id
                JOIN kelas k ON m.kelas_id = k.id
                JOIN jurusan j ON m.jurusan_id = j.id
                ORDER BY m.id DESC
                LIMIT ?, ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();

        return $stmt->get_result();
    }
}
?>