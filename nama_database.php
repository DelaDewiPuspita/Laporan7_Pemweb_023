<?php
// Membuat koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "nama_database";
$mysqli = new mysqli($host, $user, $pass, $db);

// Mengecek koneksi
if ($mysqli->connect_errno) {
    echo "Gagal terkoneksi ke MySQL: " . $mysqli->connect_error;
    exit();
}

// Memeriksa apakah form telah disubmit
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $isi = $_POST['isi'];

    // Menambahkan data ke tabel buku_tamu
    $sql = "INSERT INTO buku_tamu (nama, email, isi) VALUES ('$nama', '$email', '$isi')";
    if ($mysqli->query($sql) === TRUE) {
        echo "Pesan telah ditambahkan ke buku tamu";
    } else {
        echo "Terjadi kesalahan: " . $sql . "<br>" . $mysqli->error;
    }
}

// Mengambil data dari tabel buku_tamu
$sql = "SELECT * FROM buku_tamu ORDER BY id_bt DESC";
$result = $mysqli->query($sql);
?>

<!-- Menampilkan form untuk menambahkan pesan baru -->
<h2>Tambahkan Pesan Baru</h2>
<form method="post" action="">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="isi">Pesan:</label>
    <textarea id="isi" name="isi" required></textarea>

    <button type="submit" name="submit">Kirim</button>
</form>

<!-- Menampilkan pesan-pesan yang sudah ada di buku tamu -->
<h2>Pesan yang Sudah Masuk</h2>
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h3>" . $row["nama"] . "</h3>";
        echo "<p>" . $row["isi"] . "</p>";
        echo "<p><i>" . $row["email"] . "</i></p>";
    }
} else {
    echo "Belum ada pesan yang masuk";
}

// Menutup koneksi
$mysqli->close();
?>
