<?php
$host = "localhost";
$user = "root";
$pass = ""; // biarkan kosong kalau default XAMPP
$db   = "db_users"; // <-- ubah ke db_users, sesuai yang kamu punya

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
