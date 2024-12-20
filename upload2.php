<?php
header('Content-Type: application/json');
$conn = new mysqli('localhost', 'root', '', 'sajustice1');

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Koneksi database gagal: ' . $conn->connect_error]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pesan = $_POST['pesan'];
    $no_telepon = $_POST['no_telepon'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO komentar (pesan, no_telepon, nama, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $pesan, $no_telepon, $nama, $email);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Data berhasil disimpan']);
    } else {
        echo json_encode(['success' => false, 'error' => 'Gagal menyimpan data: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Metode HTTP tidak valid']);
}

$conn->close();
