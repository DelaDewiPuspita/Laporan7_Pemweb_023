<?php
$servername = "localhost";
$username = "root";
$dbname = "my_db";

// Create connection
$conn = mysqli_connect($servername, $username, "", $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to retrieve all data from the table
$sql = "SELECT * FROM liga";
$result = mysqli_query($conn, $sql);

// Check if there are any data in the table
if (mysqli_num_rows($result) > 0) {
    // Display data in a table format
    echo "<table><tr><th>ID</th><th>Kode</th><th>Negara</th><th>Champion</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["kode"]."</td><td>".$row["negara"]."</td><td>".$row["champion"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "No data found";
}

mysqli_close($conn);
?>