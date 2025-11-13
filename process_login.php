<?php
session_start();
include "koneksi.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_input = $_POST["email"]; 
    $password = $_POST["password"];

    // Cek email atau username
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
    $stmt->bind_param("ss", $login_input, $login_input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row["password"])) {
            // Jika password benar
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["email"] = $row["email"];

            // Redirect ke halaman utama
            header("Location: index.php?page=dashboard");
            exit;
        } else {
            // Password salah
            $_SESSION['error'] = "Password salah!💔";
            header("Location: index.php?page=login");
            exit;
        }
    } else {
        // Username atau email tidak ditemukan
        $_SESSION['error'] = "Email atau Username tidak ditemukan!😿";
        header("Location: index.php?page=login");
        exit;
    }

    $stmt->close();
}
?>
