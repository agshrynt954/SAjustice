<?php
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $conn = new mysqli('localhost', 'root', '', 'sajustice1');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM identitas_umum WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
    } else {
        echo "error";
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard 1</title>
  <link rel="stylesheet" href="style6.css">
  <style>
    .table-box {
      background-color: white;
      margin: 80px auto;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      max-width: 90%;
      overflow: hidden;
      position: relative;
    }

    .scrollable-table {
      overflow-x: auto;
      border: 1px solid #ddd;
      border-radius: 8px;
      position: relative;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      min-width: 1500px;
    }

    table thead {
      position: sticky;
      top: 0;
      background-color: #007bff;
      color: white;
    }

    table th,
    table td {
      padding: 12px;
      text-align: left;
      border: 1px solid #ddd;
      white-space: nowrap;
    }

    table tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .scroll-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 15px;
      cursor: pointer;
      z-index: 100;
    }

    .scroll-btn.left {
      left: -50px;
    }

    .scroll-btn.right {
      right: -50px;
    }

    .delete-icon {
      color: red;
      cursor: pointer;
      font-size: 20px;
      text-decoration: none;
    }

    .delete-icon:hover {
      color: darkred;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="navigation">
      <ul>
        <li>
          <a href="#">
            <span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
            <span class="title"><h3>Eigen Justisi</h3></span>
          </a>
        </li>
        <li><a href="#"><span class="icon"><ion-icon name="people-outline"></ion-icon></span><span class="title">Data Pendaftar</span></a></li>
        <li><a href="tampil2.php"><span class="icon"><ion-icon name="chatbubble-outline"></ion-icon></span><span class="title">Komentar</span></a></li>
        <li><a href="beranda.php"><span class="icon"><ion-icon name="home-outline"></ion-icon></span><span class="title">Beranda</span></a></li>
        <li><a href="prosedur.php"><span class="icon"><ion-icon name="documents-outline"></ion-icon></span><span class="title">Prosedur</span></a></li>
        <li><a href="portal_berita/index.php"><span class="icon"><ion-icon name="megaphone-outline"></ion-icon></span><span class="title">Berita</span></a></li>
        <li><a href="blog2.php"><span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span><span class="title">Blog</span></a></li>
        <li><a href="#"><span class="icon"><ion-icon name="bookmark-outline"></ion-icon></span><span class="title">Tersimpan</span></a></li>
        <li><a onclick="learnMore()" id="logout-link" href="#"><span class="icon"><ion-icon name="log-out-outline"></ion-icon></span><span class="title">Logout</span></a></li>
      </ul>
    </div>
  </div>

  <div class="main">
    <div class="topbar">
      <div class="toggle"><ion-icon name="menu-outline"></ion-icon></div>
      <div class="search">
        <label>
          <input type="text" placeholder="search here">
          <ion-icon name="search-outline"></ion-icon>
        </label>
      </div>
      <div class="user">
        <img src="gambar/logo.png" alt="" width="30px">
      </div>
    </div>

    <div class="table-box">
      <h2>Data Pendaftar</h2>
      <button class="scroll-btn left" onclick="scrollTable('left')">&larr;</button>
      <button class="scroll-btn right" onclick="scrollTable('right')">&rarr;</button>
      <div class="scrollable-table" id="scrollableTable">
        <form action="proses_aksi.php" method="POST">
          <table border="1">
            <thead>
              <tr>
                <th>Pilih</th>
                <th>No</th>
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
                <th>Surat Kuasa</th>
                <th>Surat Permohonan Gugatan</th>
                <th>Bukti Pendukung</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $conn = new mysqli('localhost', 'root', '', 'sajustice1');
              if ($conn->connect_error) {
                  die("Koneksi gagal: " . $conn->connect_error);
              }

              $result = $conn->query("SELECT * FROM identitas_umum");
              while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td><input type='checkbox' name='selected_ids[]' value='" . $row['id'] . "'></td>";
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
                  echo "<td><img src='" . $row['foto'] . "' alt='foto' width='100'></td>";
                  echo "<td><img src='" . $row['surat_kuasa'] . "' alt='surat_kuasa' width='100'></td>";
                  echo "<td><img src='" . $row['surat_permohonan_gugatan'] . "' alt='surat_permohonan_gugatan' width='100'></td>";
                  echo "<td><img src='" . $row['bukti_pendukung'] . "' alt='bukti_pendukung' width='100'></td>";
                  echo "<td><a href='?delete_id=" . $row['id'] . "' class='delete-icon' onclick='return confirmDelete()'><ion-icon name='trash-outline'></ion-icon></a></td>";
                  echo "</tr>";
              }

              $conn->close();
              ?>
            </tbody>
          </table>
          <button type="submit" name="action" value="delete" onclick="return confirm('Hapus data yang dipilih?')">Hapus yang Dipilih</button>
          <button type="submit" name="action" value="move" onclick="return confirm('Pindahkan data yang dipilih?')">Pindahkan yang Dipilih</button>
        </form>
      </div>
    </div>
  </div>

  <script src="main/main4.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script>

document.querySelector('form').addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    const action = formData.get('action');

    if (action === 'delete') {
        if (confirm('Hapus data yang dipilih?')) {
            fetch('proses_aksi.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    location.reload();
                })
                .catch(error => console.error('Error:', error));
        }
    } else if (action === 'move') {
        if (confirm('Pindahkan data yang dipilih?')) {
            fetch('proses_aksi.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    location.reload();
                })
                .catch(error => console.error('Error:', error));
        }
    }
});

    document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.querySelector('.search input');
      const table = document.querySelector('table');
      const rows = table.querySelectorAll('tr');

      searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.toLowerCase();

        rows.forEach(row => {
          const cells = row.getElementsByTagName('td');
          let rowText = '';

          for (let cell of cells) {
            rowText += cell.textContent.toLowerCase();
          }

          if (rowText.includes(searchTerm)) {
            row.style.display = '';
          } else {
            row.style.display = 'none';
          }
        });
      });
    });

    function confirmDelete() {
      return confirm("Apakah Anda ingin menghapus data ini?");
    }

    function learnMore() {
      alert("Apakah Anda ingin keluar dari lokasi Anda saat ini?");
    }

    function scrollTable(direction) {
      const scrollableTable = document.getElementById("scrollableTable");
      const scrollAmount = 200;
      if (direction === "left") {
        scrollableTable.scrollLeft -= scrollAmount;
      } else if (direction === "right") {
        scrollableTable.scrollLeft += scrollAmount;
      }
    }
  </script>
</body>
</html>