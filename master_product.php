<?php
include "db_user.php";

// Tambah produk baru
if (isset($_POST['tambah'])) {
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $barcode = $_POST['barcode'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = "INSERT INTO produk (id_produk, nama_produk, barcode, harga, stok)
              VALUES ('$id_produk', '$nama_produk', '$barcode', '$harga', '$stok')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Produk berhasil ditambahkan!'); window.location='index.php?page=masterProduct';</script>";
    } else {
        echo "<p style='color:red;'>Gagal menambah produk: " . mysqli_error($conn) . "</p>";
    }
}

// Update data produk
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_produk = $_POST['nama_produk'];
    $barcode = $_POST['barcode'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = "UPDATE produk 
              SET nama_produk='$nama_produk', barcode='$barcode', harga='$harga', stok='$stok'
              WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php?page=masterProduct';</script>";
    } else {
        echo "<p style='color:red;'>Gagal memperbarui data: " . mysqli_error($conn) . "</p>";
    }
}

// Hapus data produk
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM produk WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Produk berhasil dihapus!'); window.location='index.php?page=masterProduct';</script>";
    } else {
        echo "<p style='color:red;'>Gagal menghapus produk: " . mysqli_error($conn) . "</p>";
    }
}

// Ambil semua produk
$result = mysqli_query($conn, "SELECT * FROM produk ORDER BY id ASC");
?>

<div class="container" style="width:80%; margin:50px auto; text-align:center;">
    <h2>Daftar Produk Alfamart</h2>

    <!-- Tabel Produk -->
    <table border="1" cellpadding="10" cellspacing="0" 
           style="width:100%; border-collapse:collapse; margin-top:20px; background:#fff;">
        <thead style="background:#9d0008; color:white;">
            <tr>
                <th>No</th>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Barcode</th>
                <th>Harga (Rp)</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <form method="POST">
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['id_produk']); ?></td>
                    <td><input type="text" name="nama_produk" value="<?= htmlspecialchars($row['nama_produk']); ?>"></td>
                    <td><input type="text" name="barcode" value="<?= htmlspecialchars($row['barcode']); ?>"></td>
                    <td><input type="number" name="harga" value="<?= htmlspecialchars($row['harga']); ?>" style="width:90px;"></td>
                    <td><input type="number" name="stok" value="<?= htmlspecialchars($row['stok']); ?>" style="width:70px;"></td>
                    <td>
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        
                        <button type="submit" name="update" style="background:#28a745; color:white; border:none; padding:5px 10px; border-radius:5px;">Simpan</button>
                        
                        <button type="submit" name="delete" style="background:#dc3545; color:white; border:none; padding:5px 10px; border-radius:5px; margin-left:5px;" 
                                onclick="return confirm('Yakin ingin menghapus produk ini?');">
                            Hapus
                        </button>
                    </td>
                </form>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Form tambah produk baru -->
    <form method="POST" style="margin-top:25px; background:#f8f9fa; padding:15px; border-radius:10px; display:inline-block;">
        <h3 style="margin-bottom:10px;">Tambah Produk Baru</h3>
        <input type="text" name="id_produk" placeholder="ID Produk (misal: PRD006)" required style="padding:5px; margin:5px;">
        <input type="text" name="nama_produk" placeholder="Nama Produk" required style="padding:5px; margin:5px;">
        <input type="text" name="barcode" placeholder="Barcode" required style="padding:5px; margin:5px;">
        <input type="number" name="harga" placeholder="Harga (Rp)" required style="padding:5px; margin:5px; width:110px;">
        <input type="number" name="stok" placeholder="Stok" required style="padding:5px; margin:5px; width:70px;">
        <button type="submit" name="tambah" style="background:#28a745; color:white; border:none; padding:6px 12px; border-radius:5px;">Tambah</button>
    </form>
</div>
