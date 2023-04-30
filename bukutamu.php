<!DOCTYPE html>
<html>
<body>

<?php
// membuat koneksi ke MySQL
$servername = "localhost";
$username = "root";
$password = ""; // password database, jika ada
$dbname = "db_tamu";

$conn = mysqli_connect($servername, $username, $password);

// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// membuat database
$sql = "CREATE DATABASE $dbname";

if (mysqli_query($conn, $sql)) {
    echo "Database berhasil dibuat";
} else {
    echo "Error: " . mysqli_error($conn);
}

// menutup koneksi
mysqli_close($conn);

// membuat koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// membuat tabel buku_tamu
$sql = "CREATE TABLE buku_tamu (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pesan TEXT NOT NULL,
    waktu TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Tabel buku_tamu berhasil dibuat";
} else {
    echo "Error: " . mysqli_error($conn);
}

// menutup koneksi
mysqli_close($conn);
?>

</body>
</html>
