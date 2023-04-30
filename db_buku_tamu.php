<DOCTYPE html>
    <html>
        <body>

        <?php
// membuat koneksi ke MySQL
$servername = "localhost";
$username = "root";
$password = ""; // password database, jika ada

$conn = mysqli_connect($servername, $username, $password);

// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// membuat database
$sql = "CREATE DATABASE buku_tamu";

if (mysqli_query($conn, $sql)) {
    echo "Database berhasil dibuat";
} else {
    echo "Error: " . mysqli_error($conn);
}

// menutup koneksi
mysqli_close($conn);
?>

</body>
</html>
