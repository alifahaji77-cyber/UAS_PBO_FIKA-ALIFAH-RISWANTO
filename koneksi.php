<?php
// koneksi.php

// TODO: Sesuaikan KELAS dan NamaLengkap sesuai dengan database Anda
$host     = "localhost";
$username = "root";
$password = "";
$database = "db_uas_pbo_ti1c_fikaalifahriswanto"; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
    // Mengatur error mode ke Exception untuk kemudahan debugging
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

$koneksibaru = new Koneksi();
?>