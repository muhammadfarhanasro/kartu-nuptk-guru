<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Kartu NUPTK</title>
  <style>
    * {
      box-sizing: border-box;
    }

    @media print {
      body {
        background-color: transparent;
      }
      .card {
        box-shadow: none;
        margin: 0;
      }
      .photo img {
        display: block !important;
        print-color-adjust: exact;
        color-adjust: exact;
        -webkit-print-color-adjust: exact;
      }
    }

    body {
      margin: 0;
      background-color: #e0e0e0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      font-family: Arial, sans-serif;
    }

    .card {
      position: relative;
      width: 8.6cm;
      height: 5.4cm;
      border-radius: 8px;
      background: #374151;
      box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
      padding: 6px;
      overflow: hidden;
      page-break-inside: avoid;
    }

    .card::before {
      content: '';
      position: absolute;
      inset: 0;
      background-image: url('https://i.pinimg.com/736x/c9/9f/41/c99f41e17e0b976ead62f8ac71d67bd0.jpg');
      background-repeat: no-repeat;
      background-position: center;
      background-size: 3cm;
      opacity: 0.10;
      z-index: 0;
    }

    .card > * {
      position: relative;
      z-index: 1;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
    }

    .logo-kemdikbud {
      display: flex;
      align-items: center;
    }

    .logo-kemdikbud img {
      width: 40px;
      margin-right: 4px;
    }

    .logo-kemdikbud .text {
      font-weight: bold;
      font-size: 6pt;
      line-height: 1.2;
      color: #FFFFFF;
    }

    .title {
      text-align: right;
      font-size: 7pt;
      color: #D1D5DB;
    }

    .title h2 {
      margin: 0;
      font-size: 11pt;
      color: #60A5FA;
    }

    .title p {
      margin: 0;
      color: #D1D5DB;
    }

    .photo-and-data {
      display: flex;
      margin-top: 10px;
    }

    .photo {
      width: 1.5cm;
      margin-top: 6px;
      height: 1.8cm; /* Memastikan kontainer foto memiliki tinggi tetap */
    }

    .photo img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border: 1px solid #aaa;
      border-radius: 3px;
    }

    .data {
      flex: 1;
      padding-left: 6px;
      font-size: 7pt;
      margin-top: 12px;
      color: #FFFFFF;
    }

    .data p {
      margin: 2px 0;
      line-height: 1.3;
    }

    .data strong {
      display: inline-block;
      width: 2cm;
      font-weight: normal;
      color: #D1D5DB;
    }

    .footer {
      position: relative;
      margin-top: 2px;
    }

    .footer-center {
      text-align: center;
    }

    .footer-center img {
      height: 0.9cm;
    }

    .qr {
      position: absolute;
      bottom: -5px;
      right: 10px;
    }

    .qr img {
      height: 0.7cm;
      margin-right: 4px;
      margin-bottom: 2px;
      background: #fff;
      display: block;
      margin: 0;
    }
  </style>
</head>
<body>
  <?php
  include 'koneksi.php';
  
  // Ambil ID guru dari parameter URL
  $id_guru = isset($_GET['id_guru']) && is_numeric($_GET['id_guru']) ? 
            (int)$_GET['id_guru'] : die("ID Guru tidak valid atau tidak ditemukan");
  
  // Query data guru
  $query = "SELECT * FROM guru WHERE id_guru = ?";
  $stmt = mysqli_prepare($link, $query);
  
  if(!$stmt) {
    die("Error dalam persiapan query: " . mysqli_error($link));
  }
  
  mysqli_stmt_bind_param($stmt, "i", $id_guru);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  
  if(mysqli_num_rows($result) > 0) {
    $guru = mysqli_fetch_assoc($result);
    
    // Format tanggal lahir
    $tanggal_lahir = date('d F Y', strtotime($guru['tanggal_lahir']));
    
    // Format nama dengan gelar
    $nama_lengkap = $guru['nama'];
    if(!empty($guru['gelar'])) {
      $nama_lengkap .= ', '.$guru['gelar'];
    }
    
    // Tentukan path foto dari folder img tapi tetap gunakan nama file dari database
    $foto_filename = !empty($guru['foto']) ? $guru['foto'] : 'default.jpg';
    $foto_path = 'img/' . $foto_filename;
    
    // Periksa apakah file foto ada, jika tidak gunakan default
    if(!file_exists($foto_path)) {
      $foto_path = 'img/default.jpg';
    }
  ?>
  
  <div class="card">
    <div class="header">
      <div class="logo-kemdikbud">
        <img src="https://disdikbud.banyuasinkab.go.id/wp-content/uploads/sites/269/2022/11/Logo-Tut-Wuri-Handayani-PNG-Warna.png" alt="Logo Kemdikbud" />
        <div class="text">
          KEMENTERIAN PENDIDIKAN DASAR<br />
          DAN MENENGAH
        </div>
      </div>
      <div class="title">
        <h2>KARTU NUPTK</h2>
        <p>NOMOR UNIK PENDIDIK</p>
      </div>
    </div>

    <div class="photo-and-data">
      <div class="photo">
        <img src="<?php echo $foto_path; ?>" alt="Foto Guru <?php echo htmlspecialchars($nama_lengkap); ?>" style="display: block;" importance="high" />
      </div>
      <div class="data">  
        <p><strong>NUPTK</strong>: <?php echo htmlspecialchars($guru['nuptk']); ?></p>
        <p><strong>Nama</strong>: <?php echo htmlspecialchars($nama_lengkap); ?></p>
        <p><strong>Tempat Lahir</strong>: <?php echo htmlspecialchars($guru['tempat_lahir']); ?></p>
        <p><strong>Tanggal Lahir</strong>: <?php echo htmlspecialchars($tanggal_lahir); ?></p>
        <p><strong>Jenis Kelamin</strong>: <?php echo htmlspecialchars($guru['jenis_kelamin']); ?></p>
      </div>
    </div>

    <div class="footer">
      <div class="footer-center">
        <img src="dapodik-logo.png" alt="Dapodik Logo">
      </div>
      <div class="qr">
         <img src="generate_qr.php?nuptk=<?php echo urlencode($guru['nuptk']); ?>" alt="QR Code">
      </div>
    </div>
  </div>
  
  <?php
  } else {
    echo "<p style='text-align:center;'>Data guru tidak ditemukan</p>";
  }
  
  mysqli_close($link);
  ?>
  
  <script>
    // Pastikan semua gambar dimuat sebelum pencetakan
    window.onload = function() {
      // Tunggu hingga semua gambar dimuat
      const images = document.querySelectorAll('img');
      let loadedImages = 0;
      
      function checkAllImagesLoaded() {
        loadedImages++;
        if (loadedImages === images.length) {
          // Semua gambar sudah dimuat
          if(window.location.search.includes('print=1')) {
            // Tunda sedikit untuk memastikan rendering sempurna
            setTimeout(function() {
              window.print();
            }, 500);
          }
        }
      }
      
      // Jika tidak ada gambar, langsung cetak
      if (images.length === 0) {
        if(window.location.search.includes('print=1')) {
          window.print();
        }
        return;
      }
      
      // Periksa status gambar
      images.forEach(img => {
        if (img.complete) {
          checkAllImagesLoaded();
        } else {
          img.addEventListener('load', checkAllImagesLoaded);
          img.addEventListener('error', checkAllImagesLoaded); // Tangani juga kesalahan
        }
      });
    };
  </script>
</body>
</html>