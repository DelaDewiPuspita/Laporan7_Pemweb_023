<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "pegawai_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Fungsi untuk menyimpan data pegawai
function simpanPegawai($nama, $alamat, $jabatan) {
    global $conn;

    $sql = "INSERT INTO pegawai (nama, alamat, jabatan) VALUES ('$nama', '$alamat', '$jabatan')";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Fungsi untuk menghapus data pegawai berdasarkan ID
function hapusPegawai($id) {
    global $conn;

    $sql = "DELETE FROM pegawai WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Fungsi untuk mengubah data pegawai berdasarkan ID
function ubahPegawai($id, $nama, $alamat, $jabatan) {
    global $conn;

    $sql = "UPDATE pegawai SET nama='$nama', alamat='$alamat', jabatan='$jabatan' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil diubah";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Memanggil fungsi untuk menyimpan data pegawai
simpanPegawai("Andi", "Jakarta", "Manager");

// Memanggil fungsi untuk menghapus data pegawai dengan ID 1
hapusPegawai(1);

// Memanggil fungsi untuk mengubah data pegawai dengan ID 2
ubahPegawai(2, "Budi", "Bandung", "Supervisor");

// Menutup koneksi
mysqli_close($conn);
?>
