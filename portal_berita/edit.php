<?php
include 'config/db.php';

// Ambil ID berita dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ambil data berita berdasarkan ID
$result = $conn->query("SELECT * FROM berita WHERE id = $id");
$berita = $result->fetch_assoc();

if (!$berita) {
    die("Berita tidak ditemukan!");
}

// Proses update berita
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $conn->real_escape_string($_POST['judul']);
    $konten = $conn->real_escape_string($_POST['konten']);
    $kategori = $conn->real_escape_string($_POST['kategori']);
    $tanggal = date('Y-m-d H:i:s');
    $gambar = $berita['gambar'];

    // Periksa jika ada gambar baru yang diunggah
    if (!empty($_FILES['gambar']['name'])) {
        $targetDir = "uploads/";
        $gambar = basename($_FILES['gambar']['name']);
        $targetFile = $targetDir . $gambar;

        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
            // Hapus gambar lama jika ada
            if (file_exists("uploads/" . $berita['gambar'])) {
                unlink("uploads/" . $berita['gambar']);
            }
        }
    }

    // Update berita
    $query = "UPDATE berita SET judul='$judul', konten='$konten', kategori='$kategori', tanggal='$tanggal', gambar='$gambar' WHERE id=$id";
    if ($conn->query($query)) {
        header("Location: index.php?msg=Berita berhasil diperbarui");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Berita</title>
</head>
<body>
<div class="container mt-5">
    <h1>Edit Berita</h1>
    <form action="edit.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="judul">Judul Berita</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo htmlspecialchars($berita['judul']); ?>" required>
        </div>
        <div class="form-group">
            <label for="konten">Konten Berita</label>
            <textarea class="form-control" id="konten" name="konten" rows="5" required><?php echo htmlspecialchars($berita['konten']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" value="<?php echo htmlspecialchars($berita['kategori']); ?>" required>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
            <?php if ($berita['gambar']): ?>
                <small>Gambar saat ini: <img src="uploads/<?php echo $berita['gambar']; ?>" alt="Gambar Berita" width="100"></small>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
