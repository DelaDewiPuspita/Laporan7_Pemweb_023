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
// Menghapus data pegawai
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    
    $sql = "DELETE FROM pegawai WHERE id='$id'";
    if ($mysqli->query($sql) === TRUE) {
        echo "Data pegawai telah dihapus";
    } else {
        echo "Terjadi kesalahan: " . $sql . "<br>" . $mysqli->error;
    }
}
// Mengubah data pegawai
if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jabatan = $_POST['jabatan'];
    
    $sql = "UPDATE pegawai SET nama='$nama', alamat='$alamat', jabatan='$jabatan' WHERE id='$id'";
    if ($mysqli->query($sql) === TRUE) {
        echo "Data pegawai telah diubah";
    } else {
        echo "Terjadi kesalahan: " . $sql . "<br>" . $mysqli->error;
    }
}

// Menampilkan data pegawai
$sql = "SELECT * FROM pegawai";
$result = $mysqli->query($sql);

echo "<h2>Data Pegawai</h2>";
echo "<table>";
echo "<tr><th>ID</th><th>Nama</th><th>Alamat</th><th>Jabatan</th><th>Aksi</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['nama'] . "</td>";
    echo "<td>" . $row['alamat'] . "</td>";
    echo "<td>" . $row['jabatan'] . "</td>";
    echo "<td>";
    echo "<form method='post'>";
    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
    echo "<button type='submit' name='hapus'>Hapus</button>";
    echo "<button type='submit' name='ubah'>Ubah</button>";
    echo "</form>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

$mysqli->close();
?>
