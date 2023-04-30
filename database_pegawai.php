<?php
$servername = "localhost";
$username = "root";
$dbname = "database_pegawai";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, "", $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Menjalankan perintah SQL untuk membuat tabel dan relasinya
$sql = "CREATE TABLE departemen (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama_departemen VARCHAR(50) NOT NULL
);

CREATE TABLE pegawai (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    alamat VARCHAR(100) NOT NULL,
    jabatan VARCHAR(50) NOT NULL,
    departemen_id INT(11) UNSIGNED NOT NULL,
    FOREIGN KEY (departemen_id) REFERENCES departemen(id)
)";

if (mysqli_multi_query($conn, $sql)) {
    echo "Tabel dan relasi berhasil dibuat";
} else {
    echo "Terjadi kesalahan saat membuat tabel dan relasi: " . mysqli_error($conn);
}

mysqli_close($conn);
?>