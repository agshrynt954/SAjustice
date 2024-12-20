<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Card Berita</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }

    .news-card {
      width: 300px;
      border: 1px solid #ddd;
      border-radius: 8px;
      overflow: hidden;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .news-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .news-content {
      padding: 16px;
    }

    .news-title {
      font-size: 1.25em;
      font-weight: bold;
      margin: 0;
    }

    .news-date {
      font-size: 0.9em;
      color: #777;
      margin: 8px 0;
    }

    .separator {
      width: 100%;
      height: 2px;
      background-color: red;
      margin: 8px 0;
    }

    .news-description {
      font-size: 0.95em;
      color: #333;
    }
  </style>
</head>
<body>

  <div class="news-card">
    <img src="gambar/berita1.png" alt="Gambar Berita">
    <div class="news-content">
      <h3 class="news-title">Judul Berita</h3>
      <div class="news-date">06 November 2024</div>
      <div class="separator"></div>
      <p class="news-description">
        Ini adalah deskripsi berita yang sangat menarik dan informatif. Berita ini berisi informasi terbaru yang sangat bermanfaat.
      </p>
    </div>
  </div>

</body>
</html>
