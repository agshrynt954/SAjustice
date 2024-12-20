<?php
include 'config/db.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Cek apakah berita ada
    $result = $conn->query("SELECT * FROM berita WHERE id = $id");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Hapus file gambar jika ada
        if (!empty($row['gambar']) && file_exists('uploads/' . $row['gambar'])) {
            unlink('uploads/' . $row['gambar']);
        }

        // Hapus berita dari database
        $conn->query("DELETE FROM berita WHERE id = $id");
        header("Location: index.php?msg=Berita berhasil dihapus");
        exit;
    } else {
        header("Location: index.php?msg=Berita tidak ditemukan");
        exit;
    }
} else {
    header("Location: index.php?msg=ID berita tidak valid");
    exit;
}
?>
