<?php
header('Content-Type: application/json'); // Pastikan respons berupa JSON

// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'sajustice1');
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Koneksi database gagal: ' . $conn->connect_error]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $alamat = $_POST['alamat'];
    $masalah = $_POST['masalah'];
    $harapan = $_POST['harapan'];

    $files = ['ktp', 'kk', 'akta', 'foto', 'surat_kuasa', 'surat_permohonan_gugatan', 'bukti_pendukung'];
    $uploaded_files = [];
    $target_dir = "uploads/";

    foreach ($files as $file) {
        if (isset($_FILES[$file]) && $_FILES[$file]['error'] === UPLOAD_ERR_OK) {
            $target_file = $target_dir . basename($_FILES[$file]['name']);
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0755, true);
            }
            if (move_uploaded_file($_FILES[$file]['tmp_name'], $target_file)) {
                $uploaded_files[$file] = $target_file;
            } else {
                echo json_encode(['success' => false, 'error' => "Gagal mengunggah file $file"]);
                exit();
            }
        }
    }

    $query = "INSERT INTO identitas_umum 
        (nama, email, nomor_telepon, alamat, masalah, harapan, ktp, kk, akta, foto, surat_kuasa, surat_permohonan_gugatan, bukti_pendukung) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    if (!$stmt) {
        echo json_encode(['success' => false, 'error' => 'Kesalahan prepare statement: ' . $conn->error]);
        exit();
    }

    $params = [
        $nama, $email, $nomor_telepon, $alamat, $masalah, $harapan,
        $uploaded_files['ktp'], $uploaded_files['kk'], $uploaded_files['akta'],
        $uploaded_files['foto'], $uploaded_files['surat_kuasa'], 
        $uploaded_files['surat_permohonan_gugatan'], $uploaded_files['bukti_pendukung']
    ];

    $types = str_repeat('s', count($params));
    $stmt->bind_param($types, ...$params);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    $stmt->close();
}

$conn->close();
?>
