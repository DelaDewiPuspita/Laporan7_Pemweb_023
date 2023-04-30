// Koneksi ke server MySQL
$servername = "localhost";
$username = "root";
$password = "password";
$conn = mysqli_connect($servername, $username, $password);

// Mengecek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Membuat database pegawai
$sql = "CREATE DATABASE pegawai";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

// Menghubungkan ke database pegawai
mysqli_select_db($conn, "pegawai");

// Membuat tabel pegawai
$sql = "CREATE TABLE pegawai (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    alamat VARCHAR(100) NOT NULL,
    no_telp VARCHAR(20) NOT NULL
)";
if (mysqli_query($conn, $sql)) {
    echo "Table pegawai created successfully\n";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Membuat tabel departemen
$sql = "CREATE TABLE departemen (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50) NOT NULL
)";
if (mysqli_query($conn, $sql)) {
    echo "Table departemen created successfully\n";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Membuat tabel jabatan
$sql = "CREATE TABLE jabatan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50) NOT NULL
)";
if (mysqli_query($conn, $sql)) {
    echo "Table jabatan created successfully\n";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Membuat tabel pegawai_departemen
$sql = "CREATE TABLE pegawai_departemen (
    pegawai_id INT(6) UNSIGNED,
    departemen_id INT(6) UNSIGNED,
    FOREIGN KEY (pegawai_id) REFERENCES pegawai(id),
    FOREIGN KEY (departemen_id) REFERENCES departemen(id)
)";
if (mysqli_query($conn, $sql)) {
    echo "Table pegawai_departemen created successfully\n";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Membuat tabel pegawai_jabatan
$sql = "CREATE TABLE pegawai_jabatan (
    pegawai_id INT(6) UNSIGNED,
    jabatan_id INT(6) UNSIGNED,
    FOREIGN KEY (pegawai_id) REFERENCES pegawai(id),
    FOREIGN KEY (jabatan_id) REFERENCES jabatan(id)
)";
if (mysqli_query($conn, $sql)) {
    echo "Table pegawai_jabatan created successfully\n";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Menutup koneksi ke server MySQL
mysqli_close($conn);
