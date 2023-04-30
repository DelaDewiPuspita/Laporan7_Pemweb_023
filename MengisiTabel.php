<?php
// membuat koneksi ke database
$servername = "localhost";
$username = "root";
$dbname = "my_db";

$conn = mysqli_connect($servername, $username, "", $dbname);

// mengecek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// query SQL untuk mengisi tabel "liga" dengan data
$sql = "INSERT INTO liga (kode, negara, champion)
VALUES ('ENG', 'Inggris', 13),
       ('ESP', 'Spanyol', 8),
       ('ITA', 'Italia', 9),
       ('GER', 'Jerman', 7),
       ('FRA', 'Prancis', 1)";

// mengecek apakah query berhasil dijalankan atau tidak
if (mysqli_query($conn, $sql)) {
    echo "Data berhasil diinput ke tabel liga";
} else {
    echo "Error: " . mysqli_error($conn);
}

// menutup koneksi
mysqli_close($conn);
?>