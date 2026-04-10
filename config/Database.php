<?php
Class Database {
    private $host = "localhost";
    private $db = "sekolah";
    private $user = "root";
    private $pass = "";

    public $conn;

    public function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        if ($this->conn->connect_error) {
            die("Koneksi Gagal" . $this->conn->connect_error);
        }

        return $this->conn;
    }
}


?>