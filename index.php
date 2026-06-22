<?php

// 1. Memuat seluruh dependensi file yang dibutuhkan
require_once 'koneksi.php';
require_once 'Karyawan.php';
require_once 'KaryawanKontrak.php';
require_once 'KaryawanTetap.php';
require_once 'KaryawanMagang.php';

// 2. Mengambil data dari database melalui metode statis masing-masing kelas
try {
    $dataKontrak = KaryawanKontrak::AmbilDataKontrak($pdo);
    $dataTetap   = KaryawanTetap::AmbilDataTetap($pdo);
    $dataMagang  = KaryawanMagang::AmbilDataMagang($pdo);
} catch (PDOException $e) {
    die("Gagal memuat data antarmuka: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Slip Gaji Karyawan - PBO</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f6f9; color: #333; }
        h1 { text-align: center; color: #2c3e50; margin-bottom: 30px; }
        h2 { color: #2980b9; border-bottom: 2px solid #2980b9; padding-bottom: 8px; margin-top: 40px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { padding: 12px 15px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #34495e; color: #fff; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .gaji-bersih { font-weight: bold; color: #27ae60; }
    </style>
</head>
<body>

    <h1>SISTEM MANAJEMEN GAJI KARYAWAN</h1>

    <h2>Daftar Slip Gaji: Karyawan Kontrak</h2>
    <table>
        <thead>
            <tr>
                <th>ID Karyawan</th>
                <th>Nama Karyawan</th>
                <th>Departemen</th>
                <th>Hari Kerja</th>
                <th>Gaji / Hari</th>
                <th>Durasi Kontrak</th>
                <th>Agensi Penyalur</th>
                <th>Gaji Bersih</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataKontrak as $row): 
                // Instansiasi objek secara dinamis untuk memicu Polimorfisme Overriding
                $karyawan = new KaryawanKontrak(
                    $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], 
                    $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
                    $row['durasi_kontrak_bulan'], $row['agensi_penyalur']
                );
            ?>
                <tr>
                    <td><?= htmlspecialchars($row['id_karyawan']) ?></td>
                    <td><?= htmlspecialchars($row['nama_karyawan']) ?></td>
                    <td><?= htmlspecialchars($row['departemen']) ?></td>
                    <td><?= $row['hari_kerja_masuk'] ?> Hari</td>
                    <td>Rp <?= number_format($row['gaji_dasar_per_hari'], 2, ',', '.') ?></td>
                    <td><?= $row['durasi_kontrak_bulan'] ?> Bulan</td>
                    <td><?= htmlspecialchars($row['agensi_penyalur']) ?></td>
                    <td class="gaji-bersih">Rp <?= number_format($karyawan->HitungGajiBersih(), 2, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Daftar Slip Gaji: Karyawan Tetap</h2>
    <table>
        <thead>
            <tr>
                <th>ID Karyawan</th>
                <th>Nama Karyawan</th>
                <th>Departemen</th>
                <th>Hari Kerja</th>
                <th>Gaji / Hari</th>
                <th>Tunjangan Kesehatan</th>
                <th>Opsi Saham ID</th>
                <th>Gaji Bersih</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataTetap as $row): 
                $karyawan = new KaryawanTetap(
                    $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], 
                    $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
                    $row['tunjangan_kesehatan'], $row['opsi_saham_id']
                );
            ?>
                <tr>
                    <td><?= htmlspecialchars($row['id_karyawan']) ?></td>
                    <td><?= htmlspecialchars($row['nama_karyawan']) ?></td>
                    <td><?= htmlspecialchars($row['departemen']) ?></td>
                    <td><?= $row['hari_kerja_masuk'] ?> Hari</td>
                    <td>Rp <?= number_format($row['gaji_dasar_per_hari'], 2, ',', '.') ?></td>
                    <td>Rp <?= number_format($row['tunjangan_kesehatan'], 2, ',', '.') ?></td>
                    <td><?= htmlspecialchars($row['opsi_saham_id']) ?></td>
                    <td class="gaji-bersih">Rp <?= number_format($karyawan->HitungGajiBersih(), 2, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Daftar Slip Gaji: Karyawan Magang (Kampus Merdeka)</h2>
    <table>
        <thead>
            <tr>
                <th>ID Karyawan</th>
                <th>Nama Karyawan</th>
                <th>Departemen</th>
                <th>Hari Kerja</th>
                <th>Gaji / Hari</th>
                <th>Uang Saku Bulanan</th>
                <th>Sertifikat Program</th>
                <th>Gaji Bersih (Potongan 20%)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataMagang as $row): 
                $karyawan = new KaryawanMagang(
                    $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], 
                    $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
                    $row['uang_saku_bulanan'], $row['sertifikat_kampus_merdeka']
                );
            ?>
                <tr>
                    <td><?= htmlspecialchars($row['id_karyawan']) ?></td>
                    <td><?= htmlspecialchars($row['nama_karyawan']) ?></td>
                    <td><?= htmlspecialchars($row['departemen']) ?></td>
                    <td><?= $row['hari_kerja_masuk'] ?> Hari</td>
                    <td>Rp <?= number_format($row['gaji_dasar_per_hari'], 2, ',', '.') ?></td>
                    <td>Rp <?= number_format($row['uang_saku_bulanan'], 2, ',', '.') ?></td>
                    <td><?= htmlspecialchars($row['sertifikat_kampus_merdeka']) ?></td>
                    <td class="gaji-bersih">Rp <?= number_format($karyawan->HitungGajiBersih(), 2, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>