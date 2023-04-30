<!DOCTYPE html>
<html>
  <body>

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

    // query SQL untuk mengambil data dari tabel "liga"
    $sql = "SELECT * FROM liga";

    // mengeksekusi query dan menyimpan hasilnya dalam variabel $result
    $result = mysqli_query($conn, $sql);

    // mengecek apakah query berhasil dijalankan atau tidak
    if (mysqli_num_rows($result) > 0) {
        // membuat tabel HTML
        echo "<table>";
        echo "<tr><th>Kode</th><th>Negara</th><th>Juara</th></tr>";

        // menampilkan data menggunakan mysqli_fetch_assoc()
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["kode"]. "</td><td>" . $row["negara"]. "</td><td>" . $row["champion"]. "</td></tr>";
        }

        // menutup tabel HTML
        echo "</table>";
    } else {
        echo "Tidak ada data yang ditemukan";
    }

    // menutup koneksi
    mysqli_close($conn);
  ?>

  </body>
</html>
