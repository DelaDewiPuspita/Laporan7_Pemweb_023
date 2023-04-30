<?php
// konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tamu";

// membuat koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// array nama dan email
$nama = array("John Doe", "Jane Doe", "Bob Smith", "Alice Green", "Mike Brown");
$email = array("johndoe@example.com", "janedoe@example.com", "bobsmith@example.com", "alicegreen@example.com", "mikebrown@example.com");

// loop untuk memasukkan data secara random
for ($i = 1; $i <= 10; $i++) {
    // memilih data secara acak dari array nama dan email
    $random_nama = $nama[array_rand($nama)];
    $random_email = $email[array_rand($email)];
    $random_pesan = "Hari ini aku hadir dalam ulang tahunmu$i";
    
    // query untuk memasukkan data
    $sql = "INSERT INTO buku_tamu (nama, email, pesan) VALUES ('$random_nama', '$random_email', '$random_pesan')";
    
    // mengecek apakah data berhasil dimasukkan
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil dimasukkan<br>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// menutup koneksi
mysqli_close($conn);
?>
