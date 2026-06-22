<?php
// KaryawanMagang.php
require_once 'Karyawan.php';

class KaryawanMagang extends Karyawan {
    // Properti tambahan spesifik
    private $uangSakuBulanan;
    private $sertifikatKampusMerdeka;

    // Constructor untuk menginisialisasi atribut induk dan anak
    public function __construct($id, $nama, $dept, $hariKerja, $gajiDasar, $uangSaku, $sertifikat) {
        parent::__construct($id, $nama, $dept, $hariKerja, $gajiDasar);
        $this->uangSakuBulanan = $uangSaku;
        $this->sertifikatKampusMerdeka = $sertifikat;
    }

    // Overriding metode abstrak (Uang Saku Bulanan Tetap + Akumulasi Gaji Harian)
    public function HitungGajiBersih() {
    // Gaji Bersih = (hariKerjaMasuk * gajiDasarPerHari) * 80%
    return ($this->hariKerjaMasuk * $this->gajiDasarPerHari) * 0.80;
}

    // Overriding metode abstrak untuk menampilkan profil
    public function TampilkanProfilKaryawan() {
        echo "Magang - ID: {$this->id_karyawan} | Nama: {$this->nama_karyawan} | Program: {$this->sertifikatKampusMerdeka}\n";
    }

    // Metode khusus untuk mengambil data khusus Karyawan Magang dari database
    public static function AmbilDataMagang($pdo) {
        $sql = "SELECT id_karyawan, nama_karyawan, departemen, hari_kerja_masuk, gaji_dasar_per_hari, uang_saku_bulanan, sertifikat_kampus_merdeka 
                FROM tabel_pendaftaran 
                WHERE sertifikat_kampus_merdeka IS NOT NULL";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>