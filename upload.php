<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'sajustice1'); // Sesuaikan dengan konfigurasi database Anda
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $alamat = $_POST['alamat'];
    $masalah = $_POST['masalah'];
    $harapan = $_POST['harapan'];

    // Array untuk menyimpan nama file yang diunggah
    $files = ['ktp', 'kk', 'akta', 'foto', 'surat_kuasa', 'surat_permohonan_gugatan', 'bukti_pendukung'];
    $uploaded_files = [];

    foreach ($files as $file) {
        if (isset($_FILES[$file]) && $_FILES[$file]['error'] === UPLOAD_ERR_OK) {
            $uploaded_files[$file] = file_get_contents($_FILES[$file]['tmp_name']); // Baca file sebagai binary
        } else {
            $uploaded_files[$file] = null; // Jika tidak ada file yang diunggah, set ke null
        }
    }

    // Simpan data ke database
    $stmt = $conn->prepare(
        "INSERT INTO identitas_umum (nama, email, nomor_telepon, alamat, masalah, harapan, ktp, kk, akta, foto, surat_kuasa, surat_permohonan_gugatan, bukti_pendukung) 
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );

    if (!$stmt) {
        die("Kesalahan prepare statement: " . $conn->error);
    }

    // Bind parameter
    $stmt->bind_param(
        'sssssssssssss',
        $nama,
        $email,
        $nomor_telepon,
        $alamat,
        $masalah,
        $harapan,
        $uploaded_files['ktp'],
        $uploaded_files['kk'],
        $uploaded_files['akta'],
        $uploaded_files['foto'],
        $uploaded_files['surat_kuasa'],
        $uploaded_files['surat_permohonan_gugatan'],
        $uploaded_files['bukti_pendukung']
    );

    // Eksekusi query
    if ($stmt->execute()) {
        echo "<script>alert('Pendaftaran berhasil.'); window.location.href = 'dashboard1.php';</script>";
    } else {
        echo "<p>Terjadi kesalahan: " . $stmt->error . "</p>";
    }    

    $stmt->close();
}

$conn->close();
?>



 