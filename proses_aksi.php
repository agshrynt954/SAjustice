<?php
$conn = new mysqli('localhost', 'root', '', 'sajustice1');
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['selected_ids']) && is_array($_POST['selected_ids'])) {
        $ids = implode(',', array_map('intval', $_POST['selected_ids']));
        $action = $_POST['action'];

        if ($action === 'delete') {
            $sql = "DELETE FROM identitas_umum WHERE id IN ($ids)";
            if ($conn->query($sql)) {
                echo "Data berhasil dihapus.";
            } else {
                echo "Gagal menghapus data.";
            }
        } elseif ($action === 'move') {
            // Contoh memindahkan data ke tabel lain
            $sql = "INSERT INTO tabel_baru (id, nama, email) SELECT id, nama, email FROM identitas_umum WHERE id IN ($ids)";
            if ($conn->query($sql)) {
                $delete_sql = "DELETE FROM identitas_umum WHERE id IN ($ids)";
                $conn->query($delete_sql);
                echo "Data berhasil dipindahkan.";
            } else {
                echo "Gagal memindahkan data.";
            }
        }
    } else {
        echo "Tidak ada data yang dipilih.";
    }
}
$conn->close();
?>
