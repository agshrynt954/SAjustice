
<?php include 'config/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Portal Berita</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-4">
    <!-- Tampilkan pesan konfirmasi jika ada -->
    <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-info" role="alert">
            <?php echo htmlspecialchars($_GET['msg']); ?>
        </div>
    <?php endif; ?>

    <h1 class="mb-4">Portal Berita</h1>
    <form action="search.php" method="GET" class="mb-4">
        <input type="text" name="q" class="form-control" placeholder="Cari berita...">
    </form>
    <a href="upload.php" class="btn btn-primary mb-4">Upload Berita</a>
    <div class="row">
        <?php
        $result = $conn->query("SELECT * FROM berita ORDER BY tanggal DESC");
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card">';
            if ($row['gambar']) {
                echo '<img src="uploads/' . $row['gambar'] . '" class="card-img-top" alt="' . $row['judul'] . '">';
            }
            echo '<div class="card-body">';
            echo '<h5 class="card-title"><a href="detail.php?id=' . $row['id'] . '">' . $row['judul'] . '</a></h5>';
            echo '<p class="card-text">' . substr($row['konten'], 0, 100) . '...</p>';
            echo '<a href="hapus.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin ingin menghapus berita ini?\');">Hapus</a>';
            echo '</div></div></div>';
        }
        ?>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
