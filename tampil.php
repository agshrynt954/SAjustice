<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'sajustice1'); // Ganti sesuai konfigurasi database Anda
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Dashboard</h2>
    <table border="1">
        <tr>
        <th>No: </th>
            <th>Nama</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Alamat</th>
            <th>Masalah</th>
            <th>Harapan</th>
            <th>KTP</th>
            <th>Kartu Keluarga</th>
            <th>AKTA</th>
            <th>Foto</th>
            <th>Surat kuasa</th>
            <th>Surat Permohonan Gugatan</th>
            <th>Bukti Pendukung</th>

        </tr>
        <?php
        $result = $conn->query("SELECT * FROM identitas_umum");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['nomor_telepon'] . "</td>";
            echo "<td>" . $row['alamat'] . "</td>";
            echo "<td>" . $row['masalah'] . "</td>";
            echo "<td>" . $row['harapan'] . "</td>";
            echo "<td><img src='" . $row['ktp'] . "' alt='ktp' width='100'></td>";
            echo "<td><img src='" . $row['kk'] . "' alt='kk' width='100'></td>";
            echo "<td><img src='" . $row['akta'] . "' alt='akta' width='100'></td>";
            echo "<td><img src='" . $row['foto'] . "' alt='Foto' width='100'></td>";
            echo "<td><img src='" . $row['surat_kuasa'] . "' alt='surat_kuasa' width='100'></td>";
            echo "<td><img src='" . $row['surat_permohonan_gugatan'] . "' alt='surat_permohonan_gugatan' width='100'></td>";
            echo "<td><img src='" . $row['bukti_pendukung'] . "' alt='bukti_pendukung' width='100'></td>";
            echo "</tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
