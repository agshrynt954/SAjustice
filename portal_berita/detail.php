<?php include 'config/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Detail Berita</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-4">
        <?php
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $result = $conn->query("SELECT * FROM berita WHERE id = $id");

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<h1>' . $row['judul'] . '</h1>';
                if ($row['gambar']) {
                    echo '<img src="uploads/' . $row['gambar'] . '" class="img-fluid mb-3" alt="' . $row['judul'] . '">';
                }
                echo '<p>' . $row['konten'] . '</p>';
            } else {
                echo '<p>Berita tidak ditemukan.</p>';
            }
        }
        ?>
        <a href="index.php" class="btn btn-secondary mt-4">Kembali ke Daftar Berita</a>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
