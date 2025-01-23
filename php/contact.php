<?php
// Konfigurasi koneksi database
$host = "localhost";
$username = "root";
$password = "mii123";
$database = "kopi_web"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = mysqli_connect($host, $username, $password, $database);

// Proses data dari formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $conn->real_escape_string($_POST["nama"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $no_hp = $conn->real_escape_string($_POST["no_hp"]);

    // Query untuk memasukkan data ke tabel
    $sql = "INSERT INTO contact (nama, email, no_hp) VALUES ('$nama', '$email', '$no_hp')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data Anda Berhasil Terkirim!!'); window.location.href = '../index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
