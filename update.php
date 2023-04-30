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

// Mengubah data pegawai
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jabatan = $_POST['jabatan'];
    
    $sql = "UPDATE pegawai SET nama = '$nama', alamat = '$alamat', jabatan = '$jabatan' WHERE id = $id";
    if ($mysqli->
