<?php
// koneksi.php

class Koneksi {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "db_uas_pbo_ti1c_fikaalifahriswanto";
    public $pdo;

    // Constructor otomatis berjalan saat 'new Koneksi()' dipanggil
    public function __construct() {
        try {
            $this->pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->database};charset=utf8", 
                $this->username, 
                $this->password
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Koneksi database gagal: " . $e->getMessage());
        }
    }
}

// Sekarang baris ini tidak akan error karena 'class Koneksi' sudah terdefinisi di atas
$koneksibaru = new Koneksi();

// Variabel tunggal $pdo yang digunakan di index.php diambil dari properti milik objek ini
$pdo = $koneksibaru->pdo;
?>