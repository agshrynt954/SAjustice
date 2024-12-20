<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iftitah Tour Travel</title>
    <link rel="stylesheet" href="style3.css" />
    <style>
      nav ul {
  list-style: none;
  padding: 0;
}

nav ul li {
  display: inline;
  margin-right: 20px;
}

nav ul li a {
  color: white;
  text-decoration: none;
  position: relative;
  transition: color 0.3s ease, border-bottom 0.3s ease, background-color 0.3s ease;
}

nav ul li a:hover {
  color: #f0bc2b;
}

nav ul li a.active {
  color: #f0bc2b;
  background-color: #d3d3d3;
  border-bottom: 2px solid #f0bc2b;
}

nav ul li a.active::after {
  content: "•";
  font-size: 20px;
  color: #333;
  position: absolute;
  right: -15px;
  top: 50%;
  transform: translateY(-50%);
}

nav ul li a.active {
  color: #ff5f3e;
  background-color: #d3d3d3;
  border-bottom: 2px solid #ff5f3e;
}

nav ul li a.active::after {
  content: "•";
  font-size: 20px;
  color: #333;
  position: absolute;
  right: -15px;
  top: 50%;
  transform: translateY(-50%);
}

main {
  padding: 20px;
  text-align: center;
}

.intro {
  margin-bottom: 30px;
}

button {
  font-size: 15px;
  font-weight: bold;
  padding: 10px 20px;
  background-color: #bababa;
  box-shadow: #ff5f3e;
  border-radius: 5px;
  color: rgb(0, 0, 0);
  border: none;
  cursor: pointer;
}

button:hover {
  background-color: #ff5f3e;
}

/* Style for Lanjut Daftar button */
#lanjut-daftar-button {
  font-size: 15px;
  font-weight: bold;
  padding: 10px 20px;
  background-color: #ff5f3e;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

#lanjut-daftar-button:hover {
  background-color: #ff773b;
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
}
    </style>
  </head>

  <body>
    <header>
      <nav>
        <ul>
          <li><a id="beranda-link" href="#">BERANDA</a></li>
          <li><a id="prosedur-link" href="#">PROSEDUR</a></li>
          <li><a id="berita-link" href="#">BERITA</a></li>
          <li><a id="blog-link" href="#">BLOG</a></li>
          <li><button onclick="learnMore()" id="daftar-link">PENDAFTARAN</button></li>
        </ul>
        <div class="logo"><img src="gambar/logo.png" width="140px" /></div>
      </nav>
    </header>

    <div class="backgr"></div>

    <div class="container">
      <div class="section" id="persyaratan">
        <h2 class="section-title"><ion-icon name="library-outline"></ion-icon>BERKAS PERSYARATAN</h2>
        <ul>
          <li>Kartu Tanda Penduduk</li>
          <li>Kartu Keluarga</li>
          <li>AKTA</li>
          <li>Pas Foto 3x4</li>
          <li>Surat Permohonan Gugatan</li>
          <li>Surat Kuasa</li>
          <li>Bukti Pendukung</li>
        </ul>
      </div>

      <div class="section" id="persiapan-berkas">
        <h2 class="section-title">PERSIAPAN BERKAS</h2>
        <ul>
          <li>Scan semua berkas tersebut berbentuk foto</li>
          <li>Jangan satukan foto tersebut dalam 1 folder</li>
        </ul>
      </div>

      <div class="section" id="penginputan-data">
        <h2 class="section-title">PENGINPUTAN DATA</h2>
        <ul>
          <li>Setelah berkas siap, buka form Pendaftaran Administrasi Gugatan Kasus Hukum (SAJustice)</li>
          <li>Jika tidak dapat menggunakan web, pengguna wajib membuka kembali prosedur dan panduan pendaftaran</li>
          <li>Masukkan data umum pengguna seperti nama, email, nomor HP, dll.</li>
          <li>Tekan tombol Next</li>
        </ul>
      </div>

      <div class="section" id="penginputan-cerita">
        <h2 class="section-title">PENGINPUTAN CERITA KLIEN</h2>
        <ul>
          <li>Ceritakan masalah yang telah terjadi secara terperinci di form yang tersedia sehingga staff dapat memverifikasi masalah tersebut masuk ke dalam kasus seperti apa</li>
          <li>Staff akan membaca cerita yang diisikan untuk membantu mengatasi masalah yang ada</li>
          <li>Jika mengalami kesulitan atau kesalahan, Anda bisa mengajukan pertanyaan untuk bantuan</li>
          <li>Tekan tombol Next</li>
        </ul>
      </div>

      <div class="section" id="penginputan-berkas">
        <h2 class="section-title">PENGINPUTAN BERKAS</h2>
        <ul>
          <li>Masukkan semua berkas yang telah di-scan ke dalam form sesuai dengan kategori yang dibutuhkan</li>
          <li>Tekan tombol Submit</li>
          <li>Berkas akan diproses</li>
        </ul>
      </div>

      <div class="section" id="remainder">
        <h2 class="section-title">REMAINDER</h2>
        <ul>
          <li>Jika pengajuan mendapatkan persetujuan, lanjutkan proses lebih lanjut</li>
          <li>Jika pengajuan ditolak, ajukan perbaikan atau konsultasikan ulang</li>
        </ul>
      </div>
      
      <!-- Lanjut Daftar button -->
      <div class="section" id="lanjut-daftar">
        <button id="lanjut-daftar-button" onclick="learnMore()">Lanjut Daftar?</button>
      </div>
      
    </div>
  </body>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      function learnMore(){
        document.getElementById("daftar-link").addEventListener("click", function (e) {
          e.preventDefault(); 
          window.location.href = "tambah.php";
        });
      }
      
      learnMore(); 
    });
  </script>

  <script>
    document.getElementById("beranda-link").addEventListener("click", function (e) {
      e.preventDefault();
      window.location.href = "beranda.php";
    });
  </script>

  <script>
    document.getElementById("berita-link").addEventListener("click", function (e) {
      e.preventDefault();
      window.location.href = "berita.php";
    });
  </script>

  <script>
    document.getElementById("blog-link").addEventListener("click", function (e) {
      e.preventDefault();
      window.location.href = "blog2.php";
    });
  </script>
</html>
