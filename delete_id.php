<?php
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    
    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'sajustice1');
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query untuk menghapus data berdasarkan ID
    $sql = "DELETE FROM identitas_umum WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $delete_id);

    // Menjalankan query
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menghapus data');</script>";
    }

    // Menutup koneksi
    $stmt->close();
    $conn->close();
}
?>
