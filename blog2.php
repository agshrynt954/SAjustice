<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eigen Justisi: Iftitah Tour Travel</title>
    <link rel="stylesheet" href="style/style7.css" />
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
        content: "\2022";
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
          <li><button id="daftar-link">PENDAFTARAN</button></li>
        </ul>
        <div class="logo">
          <img src="gambar/logo.png" width="140px" />
        </div>
      </nav>
    </header>

    <div class="backgr"></div>

    <section class="main-content">
      <div class="left">
        <h2>
          EIGEN JUSTISI: IFTITAH TOUR TRAVEL, mempersiapkan kantor terbarunya di
          Karawang
        </h2>
        <p>March, 2024</p>
        <img src="gambar/ka'bah.png" alt="Kaaba Image" />
        <div class="content-text">
          <p>
            Kantor yang akan dibuka di pusat Kabupaten Karawang ini,
            direncanakan akan dihadiri seluruh manajemen Iftitah Tour Travel
            dan disaksikan oleh beberapa klien dan partner yang sudah
            bekerjasama selama ini.
          </p>
          <p>
            “Melihat besarnya potensi Umroh dan Haji di area Karawang dan
            sekitarnya, maka sejak tahun 2023, Iftitah Tour Travel melakukan
            pencarian alternatif kantor baru,” kata Rasyid Hamidi, S.T,
            Direktur Iftitah Tour Travel.
          </p>
        </div>
      </div>

      <div class="right">
        <div class="promo">
          <img src="gambar/umroh.png" alt="Umroh Promo" />
          <h3>UMROH Syawal</h3>
          <p>Rp. 36.000.000,-</p>
          <ul>
            <li>Include: Tiket Pesawat, Hotel, Visa, dll</li>
            <li>Exclude: Pengeluaran pribadi, dll</li>
          </ul>
          <p>Program 16 Hari</p>
        </div>
      </div>
    </section>

    <section class="contact-form">
      <h3>Tinggalkan Pesan</h3>
      <form id="submission-form" enctype="multipart/form-data">
        <label for="pesan">Pesan:</label>
        <textarea id="pesan" name="pesan" required></textarea>

        <label for="no_telepon">No. Telepon:</label>
        <input type="text" id="no_telepon" name="no_telepon" required />

        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" required />

        <label for="email">E-mail:</label>
        <input type="text" id="email" name="email" required />

        <button type="submit">Submit</button>
      </form>
    </section>

    <script>
      // Event listener untuk form
      document
        .getElementById("submission-form")
        .addEventListener("submit", function (event) {
          event.preventDefault();

          const pesan = document.getElementById("pesan").value;
          const noTelepon = document.getElementById("no_telepon").value;
          const nama = document.getElementById("nama").value;
          const email = document.getElementById("email").value;

          // Validasi hanya untuk A-Z, a-z, 0-9, dan karakter whitespace
          const alphaNumericRegex = /^[a-zA-Z0-9\s]+$/;

          if (
            !alphaNumericRegex.test(pesan) ||
            !alphaNumericRegex.test(nama) ||
            !/^[0-9]+$/.test(noTelepon)
          ) {
            alert("Harap masukkan hanya karakter alfanumerik di kolom Pesan, Nama, dan angka di No. Telepon.");
            return;
          }

          const formData = new FormData(this);

          fetch("upload2.php", {
            method: "POST",
            body: formData,
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.success) {
                alert(
                  "Terimakasih anda telah berkomentar, harap tunggu balasan dari admin."
                );
                window.location.href = "blog2.php";
              } else {
                alert("Terjadi kesalahan: " + data.error);
              }
            })
            .catch((error) => {
              console.error("Error:", error);
              alert("Terjadi kesalahan saat mengirim data.");
            });
        });

      // Event listener untuk navigasi
      document
        .getElementById("prosedur-link")
        .addEventListener("click", function (e) {
          e.preventDefault();
          window.location.href = "prosedur.php";
        });

      document
        .getElementById("berita-link")
        .addEventListener("click", function (e) {
          e.preventDefault();
          window.location.href = "berita.php";
        });

      document
        .getElementById("beranda-link")
        .addEventListener("click", function (e) {
          e.preventDefault();
          window.location.href = "beranda.php";
        });

      // Event listener untuk tombol daftar
      document
        .getElementById("daftar-link")
        .addEventListener("click", function (e) {
          e.preventDefault();
          window.location.href = "tambah.php";
        });
    </script>
  </body>
</html>
