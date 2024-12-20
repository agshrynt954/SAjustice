<?php include 'config/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Hasil Pencarian</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container mt-4">
        <h1 class="mb-4">Hasil Pencarian</h1>
        <a href="index.php" class="btn btn-secondary mb-4">Kembali</a>
        <div class="row">
            <?php
            $q = $conn->real_escape_string($_GET['q']);
            $result = $conn->query("SELECT * FROM berita WHERE judul LIKE '%$q%' OR konten LIKE '%$q%'");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    if ($row['gambar']) {
                        echo '<img src="uploads/' . $row['gambar'] . '" class="card-img-top" alt="' . $row['judul'] . '">';
                    }
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['judul'] . '</h5>';
                    echo '<p class="card-text">' . substr($row['konten'], 0, 100) . '...</p>';
                    echo '</div></div></div>';
                }
            } else {
                echo '<p class="text-center">Tidak ada hasil ditemukan.</p>';
            }
            ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
