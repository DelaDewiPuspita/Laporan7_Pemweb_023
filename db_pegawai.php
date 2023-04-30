<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$dbname = "db_pegawai";
$conn = mysqli_connect($host, $user, "", $dbname);

// Mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Menambah data pegawai baru
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $departemen = $_POST['departemen'];
    $gaji = $_POST['gaji'];

    $sql = "INSERT INTO pegawai (nama_pegawai, id_departemen, gaji) VALUES ('$nama', '$departemen', '$gaji')";
    if (mysqli_query($conn, $sql)) {
        echo "Data pegawai berhasil ditambahkan";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

// Menghapus data pegawai
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM pegawai WHERE id_pegawai='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "Data pegawai berhasil dihapus";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

// Mengambil data pegawai dan departemen
$sql = "SELECT * FROM pegawai LEFT JOIN departemen ON pegawai.id_departemen=departemen.id_departemen";
$result = mysqli_query($conn, $sql);

// Mengubah data pegawai
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $departemen = $_POST['departemen'];
    $gaji = $_POST['gaji'];

    $sql = "UPDATE pegawai SET nama_pegawai='$nama', id_departemen='$departemen', gaji='$gaji' WHERE id_pegawai='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "Data pegawai berhasil diubah";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

// Menutup koneksi
mysqli_close($conn);
?>

<!-- Menampilkan form untuk menambahkan data pegawai baru -->
<h2>Tambah Data Pegawai Baru</h2>
<form method="post" action="">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" required>

    <label for="departemen">Departemen:</label>
    <select id="departemen" name="departemen
