<?php
// membuat koneksi ke database
$servername = "localhost";
$username = "root";
$password = ""; // password database
$dbname = "my_db";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// query SQL untuk mengambil data dari tabel "pegawai"
$sql = "SELECT * FROM pegawai";

// mengeksekusi query dan menyimpan hasilnya dalam variabel $result
$result = mysqli_query($conn, $sql);

// mengecek apakah query berhasil dijalankan atau tidak
if ($result) {
    // mengecek apakah terdapat data pada tabel atau tidak
    if (mysqli_num_rows($result) > 0) {
        // membuat tabel HTML
        echo "<table>";
        echo "<tr><th>ID</th><th>Nama</th><th>Jabatan</th></tr>";

        // menampilkan data menggunakan mysqli_fetch_assoc()
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nama"]. "</td><td>" . $row["jabatan"]. "</td></tr>";
        }

        // menutup tabel HTML
        echo "</table>";
    } else {
        echo "Tidak ada data yang ditemukan";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

// menutup koneksi
mysqli_close($conn);
?>
