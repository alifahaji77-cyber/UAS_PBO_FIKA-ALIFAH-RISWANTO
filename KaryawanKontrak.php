<?php
// KaryawanKontrak.php
require_once 'Karyawan.php'; // Atau Pendaftaran.php sesuai penamaan file induk Anda

class KaryawanKontrak extends Karyawan {
    // Properti tambahan spesifik
    private $durasiKontrakBulan;
    private $agensiPenyalur;

    // Constructor untuk menginisialisasi atribut induk dan anak
    public function __construct($id, $nama, $dept, $hariKerja, $gajiDasar, $durasiKontrak, $agensi) {
        parent::__construct($id, $nama, $dept, $hariKerja, $gajiDasar);
        $this->durasiKontrakBulan = $durasiKontrak;
        $this->agensiPenyalur = $agensi;
    }

    // Overriding metode abstrak untuk menghitung gaji bersih
    public function HitungGajiBersih() {
    // Gaji Bersih = hariKerjaMasuk * gajiDasarPerHari
    return $this->hariKerjaMasuk * $this->gajiDasarPerHari;
    }

    // Overriding metode abstrak untuk menampilkan profil
    public function TampilkanProfilKaryawan() {
        echo "Kontrak - ID: {$this->id_karyawan} | Nama: {$this->nama_karyawan} | Agensi: {$this->agensiPenyalur}\n";
    }

    // Metode khusus untuk mengambil data khusus Karyawan Kontrak dari database
    public static function AmbilDataKontrak($pdo) {
        $sql = "SELECT id_karyawan, nama_karyawan, departemen, hari_kerja_masuk, gaji_dasar_per_hari, durasi_kontrak_bulan, agensi_penyalur 
                FROM tabel_karyawan 
                WHERE agensi_penyalur IS NOT NULL";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>