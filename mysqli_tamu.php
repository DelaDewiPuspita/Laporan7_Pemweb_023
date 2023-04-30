<?php
// membuat koneksi ke MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tamu";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// mengambil data dari tabel buku_tamu
$sql = "SELECT * FROM buku_tamu";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data dari setiap baris
    echo "<table>";
    echo "<tr><th>ID</th><th>Nama</th><th>Email</th><th>Pesan</th><th>Waktu</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["nama"]."</td><td>".$row["email"]."</td><td>".$row["pesan"]."</td><td>".$row["waktu"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data.";
}

// menutup koneksi
mysqli_close($conn);
?>
