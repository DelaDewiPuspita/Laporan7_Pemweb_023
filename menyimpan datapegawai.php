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
// Menyimpan data pegawai
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jabatan = $_POST['jabatan'];
    
    $sql = "INSERT INTO pegawai (nama, alamat, jabatan) VALUES ('$nama', '$alamat', '$jabatan')";
    if ($mysqli->query($sql) === TRUE) {
        echo "Data pegawai telah disimpan";
    } else {
        echo "Terjadi kesalahan: " . $sql . "<br>" . $mysqli->error;
    }
}
// Menutup koneksi
$mysqli->close();
?>
<!-- Form input data pegawai -->
<h2>Tambah Data Pegawai</h2>
<form method="post" action="">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" required>

    <label for="alamat">Alamat:</label>
    <textarea id="alamat" name="alamat" required></textarea>

    <label for="jabatan">Jabatan:</label>
    <input type="text" id="jabatan" name="jabatan" required>

    <button type="submit" name="submit">Simpan</button>
</form>