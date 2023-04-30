<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$db = "database_pegawai";
$mysqli = new mysqli($host, $user, '', $db);

// Mengecek koneksi
if ($mysqli->connect_errno) {
    echo "Gagal terkoneksi ke MySQL: " . $mysqli->connect_error;
    exit();
}

// Menghapus data pegawai
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $sql = "DELETE FROM pegawai WHERE id = $id";
    if ($mysqli->query($sql) === TRUE) {
        echo "Data pegawai telah dihapus";
    } else {
        echo "Terjadi kesalahan: " . $sql . "<br>" . $mysqli->error;
    }
}

// Menutup koneksi
$mysqli->close();
