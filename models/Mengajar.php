<?php
class Mengajar {
    private $conn;
    private $table = "mengajar";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //READ
    public function getAll() {
        $query = "SELECT m.id,
                        g.nama AS guru,
                        m.nama AS mapel,
                        k.nama AS kelas,
                        j.nama AS jurusan
                    FROM $this->table m
                    LEFT JOIN guru g ON m.guru_id = g.id
                    LEFT JOIN mapel mp ON m.mapel_id = mp.id
                    LEFT JOIN kelas k ON m.kelas_id = k.id
                    LEFT JOIN jurusan j ON m.jurusan_id = j.id
                    ORDER BY g.nama, k.nama";
        return $this->conn->query($query);
    }

    //CREATE
    public function create($guru_id, $mapel_id, $kelas_id, $jurusan_id) {
        $query = "INSERT INTO $this->table (guru_id, mapel_id, kelas_id, jurusan_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iiii", $guru_id, $mapel_id, $kelas_id, $jurusan_id);
        return $stmt->execute();
    }

    //DELETE
    public function delete($id) {
        $query = "DELETE FROM $this->table WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // HITUNG TOTAL DATA
    public function countAll($keyword) {
        if ($keyword) {
            $query = "SELECT COUNT(*) AS total
                    FROM $this->table
                    JOIN guru g ON $this->table.guru_id = g.id
                    JOIN mapel mp ON $this->table.mapel_id = mp.id
                    JOIN kelas k ON $this->table.kelas_id = k.id
                    JOIN jurusan j ON $this->table.jurusan_id = j.id
                    WHERE g.nama LIKE ?
                        OR j.nama LIKE ?
                        OR mp.nama LIKE ?
                        OR k.nama LIKE ?
                    ";
            $stmt = $this->conn->prepare($query);
            $keyword = "%$keyword%";
            $stmt->bind_param("ssss", $keyword, $keyword, $keyword, $keyword);
            $stmt->execute();

            return $stmt->get_result()->fetch_assoc()['total'];
            } else {
                $query = "SELECT COUNT(*) AS total FROM $this->table";
                return $this->conn->query($query)->fetch_assoc()['total'];
            }
    }

    // GET DATA + LIMIT
    public function getData($limit, $offset, $keyword) {
        if ($keyword) {
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
                        WHERE g.nama LIKE ?
                            OR j.nama LIKE ?
                            OR mp.nama LIKE ?
                            OR k.nama LIKE ?
                        ORDER BY g.nama, k.nama
                        LIMIT ? OFFSET ?";

            $stmt = $this->conn->prepare($query);
            $keyword = "%$keyword%";
            $stmt->bind_param("ssssii", $keyword, $keyword, $keyword, $keyword, $limit, $offset);

        } else {
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
                    ORDER BY g.nama, k.nama
                    LIMIT ? OFFSET ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ii", $limit, $offset);
        }

        $stmt->execute();
        return $stmt->get_result();
    }
}
?>