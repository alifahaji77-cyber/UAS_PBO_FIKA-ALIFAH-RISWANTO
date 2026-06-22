<?php
// KaryawanTetap.php
require_once 'Karyawan.php';

class KaryawanTetap extends Karyawan {
    // Properti tambahan spesifik
    private $tunjanganKesehatan;
    private $opsiSahamId;

    // Constructor untuk menginisialisasi atribut induk dan anak
    public function __construct($id, $nama, $dept, $hariKerja, $gajiDasar, $tunjangan, $opsiSaham) {
        parent::__construct($id, $nama, $dept, $hariKerja, $gajiDasar);
        $this->tunjanganKesehatan = $tunjangan;
        $this->opsiSahamId = $opsiSaham;
    }

    // Overriding metode abstrak (Gaji Pokok + Tunjangan Kesehatan)
    public function HitungGajiBersih() {
        return ($this->hariKerjaMasuk * $this->gajiDasarPerHari) + $this->tunjanganKesehatan;
    }

    // Overriding metode abstrak untuk menampilkan profil
    public function TampilkanProfilKaryawan() {
        echo "Tetap - ID: {$this->id_karyawan} | Nama: {$this->nama_karyawan} | Opsi Saham ID: {$this->opsiSahamId}\n";
    }

    // Metode khusus untuk mengambil data khusus Karyawan Tetap dari database
    public static function AmbilDataTetap($pdo) {
        $sql = "SELECT id_karyawan, nama_karyawan, departemen, hari_kerja_masuk, gaji_dasar_per_hari, tunjangan_kesehatan, opsi_saham_id 
                FROM tabel_pendaftaran 
                WHERE opsi_saham_id IS NOT NULL";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>