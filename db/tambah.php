<?php
include "../db/database.php";

// Ambil data dari form
$nama        = $_POST['Nama'] ?? '';
$jk          = $_POST['JenisKelamin'] ?? '';
$nohp        = $_POST['Nohp'] ?? '';
$email       = $_POST['Email'] ?? '';
$ttl         = $_POST['tanggallahir'] ?? '';
$nik         = $_POST['NIK'] ?? '';
$alamat      = $_POST['alamat'] ?? '';
$kelurahan   = $_POST['kelurahan'] ?? '';
$kecamatan   = $_POST['kecamatan'] ?? '';
$kota        = $_POST['kota'] ?? '';
$provinsi    = $_POST['provinsi'] ?? '';
$tr          = $_POST['tanggalregist'] ?? '';
$site        = $_POST['site'] ?? '';
$SN          = $_POST['SN'] ?? '';
$paket       = $_POST['paket'] ?? '';

// 1️⃣ Insert ke tabel datapelanggan
// 1️⃣ Insert ke tabel crm dulu
$insertCRM = "INSERT INTO crm (SN, Paket) VALUES ('$SN', '$paket')";

if ($db->query($insertCRM)) {
    $IDpelanggan = $db->insert_id; // ambil IDpelanggan baru

    // 2️⃣ Insert ke datapelanggan
    $insertData = "INSERT INTO datapelanggan
        (IDpelanggan, nama, JenisKelamin, Nohp, Email, tanggallahir, NIK, alamat, kelurahan, kecamatan, kota, provinsi, tanggalregist, site)
        VALUES
        ('$IDpelanggan', '$nama', '$jk', '$nohp', '$email', '$ttl', '$nik', '$alamat', '$kelurahan', '$kecamatan', '$kota', '$provinsi', '$tr', '$site')";

    if ($db->query($insertData)) {
        header("Location: ../CRM.php?add=success");
        exit;
    } else {
        echo "Gagal insert datapelanggan: " . $db->error;
    }

} else {
    echo "Gagal insert CRM: " . $db->error;
}

