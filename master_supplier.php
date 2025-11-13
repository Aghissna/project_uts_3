<?php
include "db_user.php";

// Tambah supplier baru
if (isset($_POST['tambah'])) {
    $id_supplier = $_POST['id_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO supplier (id_supplier, nama_supplier, telepon, alamat)
              VALUES ('$id_supplier', '$nama_supplier', '$telepon', '$alamat')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Supplier berhasil ditambahkan!'); window.location='index.php?page=masterSupplier';</script>";
        exit;
    } else {
        echo "<p style='color:red;'>Gagal menambah supplier: " . mysqli_error($conn) . "</p>";
    }
}

// Update data supplier
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_supplier = $_POST['nama_supplier'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE supplier 
              SET nama_supplier='$nama_supplier', telepon='$telepon', alamat='$alamat'
              WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php?page=masterSupplier';</script>";
        exit;
    } else {
        echo "<p style='color:red;'>Gagal memperbarui data: " . mysqli_error($conn) . "</p>";
    }
}

// Hapus data supplier
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM supplier WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Supplier berhasil dihapus!'); window.location='index.php?page=masterSupplier';</script>";
        exit;
    } else {
        echo "<p style='color:red;'>Gagal menghapus supplier: " . mysqli_error($conn) . "</p>";
    }
}

// Ambil semua supplier
$result = mysqli_query($conn, "SELECT * FROM supplier ORDER BY id ASC");
?>

<div class="container" style="width:80%; margin:50px auto; text-align:center;">
    <h2>Daftar Supplier Alfamart</h2>

    <!-- Tabel Supplier -->
    <table border="1" cellpadding="10" cellspacing="0" 
           style="width:100%; border-collapse:collapse; margin-top:20px; background:#fff;">
        <thead style="background:#9d0008; color:white;">
            <tr>
                <th style="width:40px;">No</th>
                <th style="width:120px;">ID Supplier</th>
                <th>Nama Supplier</th>
                <th style="width:150px;">Telepon</th>
                <th style="width:200px;">Alamat</th>
                <th style="width:130px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <form method="POST" style="margin:0;">
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['id_supplier']); ?></td>
                    <td><input type="text" name="nama_supplier" value="<?= htmlspecialchars($row['nama_supplier']); ?>" style="border-radius:5px; padding:5px; border:1px solid #ccc;"></td>
                    <td><input type="text" name="telepon" value="<?= htmlspecialchars($row['telepon']); ?>" style="border-radius:5px; padding:5px; border:1px solid #ccc;"></td>
                    <td><input type="text" name="alamat" value="<?= htmlspecialchars($row['alamat']); ?>" style="border-radius:5px; padding:5px; border:1px solid #ccc;"></td>
                    <td>
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">

                        <button type="submit" name="update" style="background:#28a745; color:white; border:none; padding:6px 12px; border-radius:5px; margin-bottom:5px; width:70px;">Simpan</button>

                        <button type="submit" name="delete" style="background:#dc3545; color:white; border:none; padding:6px 12px; border-radius:5px; width:70px;" 
                                onclick="return confirm('Yakin ingin menghapus supplier ini?');">
                                Hapus
                        </button>
                    </td>
                </form>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Form tambah supplier baru -->
    <form method="POST" style="margin-top:25px; background:#f8f9fa; padding:15px; border-radius:10px; display:inline-block;">
        <h3 style="margin-bottom:10px;">Tambah Supplier Baru</h3>
        <input type="text" name="id_supplier" placeholder="ID Supplier" required style="padding:5px; margin:5px;">
        <input type="text" name="nama_supplier" placeholder="Nama Supplier" required style="padding:5px; margin:5px;">
        <input type="text" name="telepon" placeholder="Telepon" required style="padding:5px; margin:5px;">
        <input type="text" name="alamat" placeholder="Alamat" required style="padding:5px; margin:5px; width:110px;">
        <button type="submit" name="tambah" style="background:#28a745; color:white; border:none; padding:6px 12px; border-radius:5px;">Tambah</button>
    </form>
</div>
