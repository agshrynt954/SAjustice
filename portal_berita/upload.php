<?php include 'config/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Upload Berita</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Upload Berita</h1>
        <a href="index.php" class="btn btn-secondary mb-4">Kembali</a>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $judul = $conn->real_escape_string($_POST['judul']);
            $konten = $conn->real_escape_string($_POST['konten']);
            $gambar = '';

            if (!empty($_FILES['gambar']['name'])) {
                $gambar = basename($_FILES['gambar']['name']);
                move_uploaded_file($_FILES['gambar']['tmp_name'], "uploads/$gambar");
            }

            $sql = "INSERT INTO berita (judul, konten, gambar) VALUES ('$judul', '$konten', '$gambar')";
            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success">Berita berhasil diunggah!</div>';
            } else {
                echo '<div class="alert alert-danger">Terjadi kesalahan: ' . $conn->error . '</div>';
            }
        }
        ?>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="konten">Konten</label>
                <textarea name="konten" class="form-control" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
