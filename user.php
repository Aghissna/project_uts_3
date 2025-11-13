<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "koneksi.php";

// Pastikan user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: index.php?page=login");
    exit();
}

// === Hapus User ===
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM users WHERE id=$id");
    echo "<script>alert('User berhasil dihapus!');window.location='index.php?page=masterUser';</script>";
    exit();
}

// === Edit User ===
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "<p style='color:red;'>User tidak ditemukan!</p>";
        echo "<a href='index.php?page=masterUser'>Kembali</a>";
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $update = mysqli_query($conn, "UPDATE users SET username='$username', email='$email' WHERE id=$id");
        if ($update) {
            echo "<script>alert('User berhasil diperbarui!');window.location='index.php?page=masterUser';</script>";
        } else {
            echo "<p style='color:red;'>Gagal mengupdate user.</p>";
        }
        exit();
    }

    ?>
    <div style="width:400px;margin:50px auto;background:white;padding:25px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);">
        <h2>Edit User</h2>
        <form method="post">
            <label>Username:</label><br>
            <input type="text" name="username" value="<?= htmlspecialchars($row['username']) ?>" required style="width:100%;padding:8px;margin-bottom:10px;"><br>
            <label>Email:</label><br>
            <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required style="width:100%;padding:8px;margin-bottom:10px;"><br>
            <button type="submit" style="background:#9d0008;;color:white;padding:8px 16px;border:none;border-radius:5px;cursor:pointer;">Simpan</button>
            <a href="index.php?page=masterUser" style="margin-left:10px;text-decoration:none;color:#555;">Batal</a>
        </form>
    </div>
    <?php
    exit();
}

// === Tampilkan Data User ===
$result = mysqli_query($conn, "SELECT * FROM users");
?>
<h2 style="text-align:center;">Master User</h2>

<table border="1" cellspacing="0" cellpadding="8" style="border-collapse:collapse;width:80%;margin:auto;background:white;">
    <tr style="background:#a30000;color:white;">
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['username']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td>
            <a href="index.php?page=masterUser&edit=<?= $row['id'] ?>">Edit</a> |
            <a href="index.php?page=masterUser&delete=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f5f6fa;
        color: #333;
    }
    table tr:hover {
        background: #fff2f2;
    }
</style>
