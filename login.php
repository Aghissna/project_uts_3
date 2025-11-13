<?php
// Jalankan session hanya jika belum aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ambil pesan error dari session jika ada
$error = '';
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']); // hapus setelah ditampilkan agar tidak muncul lagi
}
?>

<div class="container">
    <h2>Login</h2>

    <?php if ($error): ?>
            <p style="color: red; text-align: center; margin-top: -10px; font-size: 14px;">
                <?= $error; ?>
            </p>
        <?php endif; ?>

    <form action="process_login.php" method="POST">
        <label for="email">Email atau Username</label>
        <input type="text" id="email" name="email" placeholder="Masukkan Email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan Password" required>

        <button type="submit">Login</button>
    </form>

    <p>Belum punya akun? 
        <a href="index.php?page=register">Register di sini</a>
    </p>
</div>
