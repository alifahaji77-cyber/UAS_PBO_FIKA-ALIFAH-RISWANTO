<?php
// Karyawan.php

abstract class Karyawan {
    // 3. Properti Terenkapsulasi (protected)
    protected $id_karyawan;
    protected $nama_karyawan;
    protected $departemen;
    protected $hariKerjaMasuk;
    protected $gajiDasarPerHari;

    // Constructor untuk menginisialisasi atribut global (induk)
    public function __construct($id, $nama, $dept, $hariKerja, $gajiDasar) {
        $this->id_karyawan = $id;
        $this->nama_karyawan = $nama;
        $this->departemen = $dept;
        $this->hariKerjaMasuk = $hariKerja;
        $this->gajiDasarPerHari = $gajiDasar;
    }

    // 4. Metode Abstrak (Wajib diimplementasikan oleh kelas anak)
    abstract public function HitungGajiBersih();
    abstract public function TampilkanProfilKaryawan();
}
?>