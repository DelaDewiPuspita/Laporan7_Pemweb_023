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

// Mendefinisikan variabel-variabel yang akan digunakan
$id = "";
$nama = "";
$alamat = "";
$jabatan = "";
$departemen_id = "";
$update = false;

// Memeriksa apakah tombol "Simpan" telah ditekan
if (isset($_POST['simpan'])) {
    // Menyimpan data yang dimasukkan oleh pengguna
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jabatan = $_POST['jabatan'];
    $departemen_id = $_POST['departemen_id'];

    // Menjalankan perintah SQL untuk menyimpan data pegawai ke database
    $sql = "INSERT INTO pegawai (nama, alamat, jabatan, departemen_id) VALUES ('$nama', '$alamat', '$jabatan', '$departemen_id')";
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil disimpan";
    } else {
        echo "Terjadi kesalahan saat menyimpan data: " . mysqli_error($conn);
    }
}

// Memeriksa apakah tombol "Hapus" telah ditekan
if (isset($_GET['hapus'])) {
    // Menghapus data pegawai berdasarkan ID
    $id = $_GET['hapus'];
    $sql = "DELETE FROM pegawai WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil dihapus";
    } else {
        echo "Terjadi kesalahan saat menghapus data: " . mysqli_error($conn);
    }
}

// Memeriksa apakah tombol "Ubah" telah ditekan
if (isset($_GET['ubah'])) {
    // Mengambil data pegawai berdasarkan ID
    $id = $_GET['ubah'];
    $sql = "SELECT * FROM pegawai WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        // Menyimpan data pegawai ke dalam variabel-variabel
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $jabatan = $row['jabatan'];
        $departemen_id = $row['departemen_id'];
        $update = true;
    } else {
        echo "Data tidak ditemukan";
    }
}

// Memeriksa apakah tombol "Update" telah ditekan
if (isset($_POST['update'])) {
    // Menyimpan data yang dimasukkan oleh pengguna
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jabatan = $_POST['jabatan'];
    $departemen_id = $_POST['departemen_id'];

// Menjalankan perintah SQL untuk mengubah data pegawai di database
    $sql = "UPDATE pegawai SET nama='$nama', alamat='$alamat', jabatan='$jabatan', departemen_id='$departemen_id' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil diupdate";
    } else {
        echo "Terjadi kesalahan saat mengupdate data: " . mysqli_error($conn);
    }
}
