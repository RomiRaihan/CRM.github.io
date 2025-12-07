<?php
include "../db/database.php";

$IDpelanggan = $_POST['IDpelanggan'];

// Array field yang boleh di-update
$fields = [
    "nama"          => $_POST['Nama'],
    "JenisKelamin"  => $_POST['JenisKelamin'],
    "Nohp"          => $_POST['Nohp'],
    "Email"         => $_POST['Email'],
    "tanggallahir"  => $_POST['tanggallahir'],
    "NIK"           => $_POST['NIK'],
    "alamat"        => $_POST['alamat'],
    "kelurahan"     => $_POST['kelurahan'],
    "kecamatan"     => $_POST['kecamatan'],
    "kota"          => $_POST['kota'],
    "provinsi"      => $_POST['provinsi'],
    "site"          => $_POST['site']
    
];

$updateParts = [];

// HANYA masukkan field yang tidak kosong
foreach ($fields as $column => $value) {
    if (isset($value) && $value !== "") {
        $updateParts[] = "$column = '$value'";
    }
}

// Jika tidak ada field yang diisi
if (empty($updateParts)) {
    header("Location: ../customer.php?id=$IDpelanggan&update=none");
    exit;
}

// Gabungkan field yang di-update
$updateQuery = implode(", ", $updateParts);

$sql = "UPDATE datapelanggan SET $updateQuery WHERE IDpelanggan = '$IDpelanggan'";

if ($db->query($sql)) {
    header("Location: ../customer.php?id=$IDpelanggan&update=success");
    exit;
} else {
    echo "Gagal update: " . $db->error;
}
