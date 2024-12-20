<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #ffd700; /* Warna kuning */
            text-align: center;
            margin-top: 20px;
            font-size: 2rem;
        }

        .description {
            text-align: center;
            color: #fff;
            margin: 20px auto;
            max-width: 600px;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        form {
            background-color: #1a1a1a;
            padding: 40px;
            border-radius: 10px;
            max-width: 800px;
            margin: 30px auto;
            box-shadow: 0 4px 12px rgba(255, 208, 0, 0.82);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #fff; /* Mengubah warna label menjadi putih */
        }

        input, textarea, button {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #333;
            border-radius: 5px;
            font-size: 1rem;
            background-color: #333;
            color: #fff;
            outline: none;
            transition: border-color 0.3s;
        }

        input:focus, textarea:focus {
            border-color: rgba(255, 208, 0, 0.82);
        }

        input[type="file"] {
            padding: 5px;
        }

        textarea {
            height: 120px;
        }

        button {
            background-color: #ff0000;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s, color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #ffd700;
            color: #000;
            transform: scale(1.05);
        }

        button:active {
            transform: scale(1);
        }

        form > * {
            margin-bottom: 25px;
        }

        @media (max-width: 600px) {
            form {
                padding: 20px;
            }

            button {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <h2>Daftar Kasus</h2>
    <p class="description">Silakan isi form di bawah ini dengan data lengkap Anda dengan benar. Pastikan semua data yang diunggah sesuai dan valid untuk mempermudah proses pengajuan Anda.</p>
    <form id="submission-form" enctype="multipart/form-data">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="text" id="nomor_telepon" name="nomor_telepon" required>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" required>

        <label for="masalah">Masalah:</label>
        <textarea id="masalah" name="masalah" required></textarea>

        <label for="harapan">Harapan:</label>
        <textarea id="harapan" name="harapan" required></textarea>

        <label for="ktp">Unggah Foto KTP:</label>
        <input type="file" id="ktp" name="ktp" accept="image/*" required>

        <label for="kk">Unggah Foto KK:</label>
        <input type="file" id="kk" name="kk" accept="image/*" required>

        <label for="akta">Unggah Foto Akta:</label>
        <input type="file" id="akta" name="akta" accept="image/*" required>

        <label for="foto">Unggah Foto Diri:</label>
        <input type="file" id="foto" name="foto" accept="image/*" required>

        <label for="surat_kuasa">Unggah Surat Kuasa:</label>
        <input type="file" id="surat_kuasa" name="surat_kuasa" accept="image/*" required>

        <label for="surat_permohonan_gugatan">Unggah Surat Permohonan Gugatan:</label>
        <input type="file" id="surat_permohonan_gugatan" name="surat_permohonan_gugatan" accept="image/*" required>

        <label for="bukti_pendukung">Unggah Bukti Pendukung:</label>
        <input type="file" id="bukti_pendukung" name="bukti_pendukung" accept="image/*" required>

        <button type="submit">Daftar</button>
    </form>

    <script>
        document.getElementById("submission-form").addEventListener("submit", function(event) {
            event.preventDefault();

            // Ambil form data
            const formData = new FormData(this);

            // Kirim data menggunakan fetch API
            fetch("upload3.php", {
                method: "POST",
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Terimakasih anda telah mendaftar, harap tunggu pendaftaran kasus anda diproses dan kembali keberanda");
                    window.location.href = "beranda.php"; // Pindah ke beranda jika berhasil
                } else {
                    alert("Terjadi kesalahan: " + data.error);
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Terjadi kesalahan saat mengirim data.");
            });
        });
    </script>
</body>
</html>
