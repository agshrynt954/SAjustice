<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>News Website</title>
  <link rel="stylesheet" href="style5.css">
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

    <div class="tabs">
        <a href="#" class="tab active">Trending</a>
        <a href="#" class="tab">Pidana</a>
        <a href="#" class="tab">Perdata</a>
        <a href="#" class="tab">Hutang Piutang</a>
        <a href="#" class="tab">Perceraian</a>
    </div>

    <div class="bb"><h2>Berita Terpopuler</h2></div>

    <main>
        <section class="trending-news">
            <div class="news-grid" id="scrollableTimeline">
                <div class="news-item">
                    <img src="gambar/berita1.png" alt="News Image">
                    <div class="DD"><a href="#" style="text-decoration: none;">
                        <h3>Pelaku Union Busting Bisa Kena Pidana hingga Denda, Berikut Aturan dan Hak Mendirikan Serikat Pekerja?</h3>
                    </a></div>
                    <p>Kamis, 07 Maret 2024 - 13:37 WIB</p>
                </div>
                <div class="news-item">
                    <img src="gambar/berita2.png" alt="News Image">
                    <div class="AA"><a href="#" style="text-decoration: none;">
                        <h3>Pansus Haji Belum Bisa Pastikan Adanya Unsur Pidana soal Pembagian Kuota Haji</h3>
                    </a></div>
                    <p>Selasa, 14 Maret 2024 - 14:21 WIB</p>
                </div>
                <div class="news-item">
                    <img src="gambar/berita3.png" alt="News Image">
                    <div class="BB"><a href="#" style="text-decoration: none;">
                        <h3>Alasan Sri Mulyani Sindir Orang RI yang Histeris Lihat Jumlah Utang Pemerintah</h3>
                    </a></div>
                    <p>Jum'at, 11 Juni 2024 - 02:05 WIB</p>
                </div>
                <div class="news-item">
                    <img src="gambar/berita4.png" alt="News Image">
                    <div class="CC"><a href="#" style="text-decoration: none;">
                        <h3>Terjerat Kasus Mafia Tanah, Terduga Pengemplang Utang Santoso Halim Divonis MA Pidana Penjara</h3>
                    </a>
                    <p>Minggu, 06 Juni 2024 - 12:00 WIB</p>
                </div>
            </div>
        </section>
    </main>

    <div class="THI"><h2>Topik Hari Ini</h2></div>

    <div class="Bleft">
        <div><img src="gambar/Srii1.png" width="150px"></div>
        <div class="BeritaL1"><a href="#" style="text-decoration: none;"><h4>Alasan Sri Mulyani Sindir Orang RI yang Histeris Lihat Jumlah Utang Pemerintah</h4></a></div>

        <div ><img src="gambar/srii2.png" width="150px"></div>
        <div class="BeritaL2"><a href="#" style="text-decoration: none;"><h4>Terjerat Kasus Mafia Tanah, Terduga Pengemplang Utang Santoso Halim Divonis MA Pidana Penjara</h4></a></div>

        <div><img src="gambar/srii3.png" width="150px"></div>
        <div class="BeritaL3"><a href="#" style="text-decoration: none;"><h4>3 Petinggi Smelter Swasta dan Pengepul Didakwa Terlibat Korupsi Timah Rp 300T</h4></a></div>
    </div>

    <div class="Bright">
        <div><img src="gambar/srii4.png" width="150px"></div>
        <div class="BeritaL4"><a href="#" style="text-decoration: none;"><h4>Sarwendah Dianggap Setuju Pisah dari Ruben Onsu</h4></a></div>

        <div class="ggg"><img src="gambar/srii5.png" width="150px"></div>
        <div class="BeritaL5"><a href="#" style="text-decoration: none;"><h4>Nominal Pelunasan Utang yang Diterima Wulan Guritno dari Sabda Ahessa Tak Sesuai Gugatan Perdata</h4></a></div>

        <div class="gggg"><img src="gambar/srii6.png" width="150px"></div>
        <div class="BeritaL6"><a href="#" style="text-decoration: none;"><h4>6 Tahun Cerai, Justin Theroux Mengaku Masih Peduli dengan JenniferAniston</h4></a></div>
    </div>

    <a href="#"></a>

    <section class="trending-news">
        <div class="news-grid" id="scrollableTimeline">
            <div class="news-item">
                <img src="gambar/berita1.png" alt="News Image">
                <div class="DD"><a href="#" style="text-decoration: none;">
                    <h3>Pelaku Union Busting Bisa Kena Pidana hingga Denda, Berikut Aturan dan Hak Mendirikan Serikat Pekerja?</h3>
                </a></div>
                <p>Kamis, 07 Maret 2024 - 13:37 WIB</p>
            </div>
            <div class="news-item">
                <img src="gambar/berita2.png" alt="News Image">
                <div class="AA"><a href="#" style="text-decoration: none;">
                    <h3>Pansus Haji Belum Bisa Pastikan Adanya Unsur Pidana soal Pembagian Kuota Haji</h3>
                </a></div>
                <p>Selasa, 14 Maret 2024 - 14:21 WIB</p>
            </div>
            <div class="news-item">
                <img src="gambar/berita3.png" alt="News Image">
                <div class="BB"><a href="#" style="text-decoration: none;">
                    <h3>Alasan Sri Mulyani Sindir Orang RI yang Histeris Lihat Jumlah Utang Pemerintah</h3>
                </a></div>
                <p>Jum'at, 11 Juni 2024 - 02:05 WIB</p>
            </div>
            <div class="news-item">
                <img src="gambar/berita4.png" alt="News Image">
                <div class="CC"><a href="#" style="text-decoration: none;">
                    <h3>Terjerat Kasus Mafia Tanah, Terduga Pengemplang Utang Santoso Halim Divonis MA Pidana Penjara</h3>
                </a>
                <p>Minggu, 06 Juni 2024 - 12:00 WIB</p>
            </div>
        </div>
    </section>

</body>

<script src="script.js"></script>
<script src="main5.js"></script>

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
    document.getElementById("prosedur-link").addEventListener("click", function (e) {
        e.preventDefault();
        window.location.href = "prosedur.php";
    });
</script>

<script>
    document.getElementById("blog-link").addEventListener("click", function (e) {
        e.preventDefault();
        window.location.href = "blog2.php";
    });
</script>

</html>
