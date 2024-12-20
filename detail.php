<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'sajustice');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Pastikan ID diterima dan valid
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID tidak valid.");
}

$id = $_GET['id'];

// Query untuk mengambil detail data
$stmt = $conn->prepare("SELECT * FROM identitas_umum WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    echo "<h2>Detail Data</h2>";
    echo "Nama: {$row['nama']}<br>";
    echo "Email: {$row['email']}<br>";
    echo "Nomor Telepon: {$row['nomor_telephone']}<br>";
    echo "Alamat: {$row['alamat']}<br>";
    echo "Masalah: {$row['masalah']}<br>";
    echo "Harapan: {$row['harapan']}<br>";

    echo "<h3>File</h3>";
    echo "KTP: " . (!empty($row['ktp']) ? "<a href='download.php?id={$row['id']}&type=ktp'>Download</a>" : "Tidak ada") . "<br>";
    echo "KK: " . (!empty($row['kk']) ? "<a href='download.php?id={$row['id']}&type=kk'>Download</a>" : "Tidak ada") . "<br>";
    echo "AKTA: " . (!empty($row['akta']) ? "<a href='download.php?id={$row['id']}&type=akta'>Download</a>" : "Tidak ada") . "<br>";
    echo "Foto: " . (!empty($row['foto']) ? "<a href='download.php?id={$row['id']}&type=foto'>Download</a>" : "Tidak ada") . "<br>";
    echo "Surat Kuasa: " . (!empty($row['surat_kuasa']) ? "<a href='download.php?id={$row['id']}&type=surat_kuasa'>Download</a>" : "Tidak ada") . "<br>";
    echo "Surat Permohonan Gugatan: " . (!empty($row['surat_permohonan_gugatan']) ? "<a href='download.php?id={$row['id']}&type=surat_permohonan_gugatan'>Download</a>" : "Tidak ada") . "<br>";
    echo "Bukti Pendukung: " . (!empty($row['bukti_pendukung']) ? "<a href='download.php?id={$row['id']}&type=bukti_pendukung'>Download</a>" : "Tidak ada") . "<br>";

    // Tambahkan file lainnya sesuai kebutuhan
} else {
    echo "Data tidak ditemukan.";
}

$stmt->close();
$conn->close();
?>
