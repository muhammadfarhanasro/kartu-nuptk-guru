<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kartu NUPTK - Sisi Belakang</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    @media print {
      body {
        background: none;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
      }
      .card-back {
        box-shadow: none;
        margin: 0;
      }
    }

    body {
      background-color: #f0f0f0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      font-family: 'Arial', sans-serif;
    }

    .card-back {
      width: 8.6cm;
      height: 5.4cm;
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 8px;
      position: relative;
      overflow: hidden;
    }

    .card-back::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-image: url('https://i.pinimg.com/736x/c9/9f/41/c99f41e17e0b976ead62f8ac71d67bd0.jpg');
      background-size: 3cm;
      background-position: center;
      background-repeat: no-repeat;
      opacity: 0.08;
      z-index: 0;
    }

    .card-content {
      position: relative;
      z-index: 1;
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .header {
      text-align: center;
      margin-bottom: 6px;
      border-bottom: 1px solid #0080e3;
      padding-bottom: 4px;
    }

    .header h2 {
      color: #0080e3;
      font-size: 12pt;
      margin-bottom: 2px;
    }

    .header p {
      font-size: 7pt;
      color: #555;
    }

    .main-content {
      flex-grow: 1;
      font-size: 6.5pt;
      line-height: 1.4;
      text-align: justify;
    }

    .main-content p {
      margin-bottom: 5px;
    }

    .main-content ol {
      padding-left: 15px;
      margin-bottom: 5px;
    }

    .main-content li {
      margin-bottom: 3px;
    }

    .footer {
      text-align: center;
      font-size: 6pt;
      color: #666;
      margin-top: auto;
      padding-top: 3px;
      border-top: 1px dashed #ccc;
    }

    .watermark {
      position: absolute;
      bottom: 15px;
      right: 10px;
      font-size: 14pt;
      color: rgba(0, 128, 227, 0.1);
      transform: rotate(-15deg);
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="card-back">
    <div class="card-content">
      <div class="header">
        <h2>INFORMASI NUPTK</h2>
        <p>Nomor Unik Pendidik dan Tenaga Kependidikan</p>
      </div>

      <div class="main-content">
        <p><strong>NUPTK</strong> adalah nomor identifikasi resmi dari Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi Republik Indonesia yang diberikan kepada seluruh Pendidik dan Tenaga Kependidikan (PTK) yang terdaftar di Data Pokok Pendidikan (Dapodik).</p>
        
        <p><strong>Fungsi NUPTK:</strong></p>
        <ol>
          <li>Sebagai identifikasi resmi PTK dalam berbagai program Kemendikbudristek</li>
          <li>Verifikasi data untuk tunjangan profesi guru dan tunjangan khusus</li>
          <li>Syarat administrasi dalam proses sertifikasi guru</li>
          <li>Integrasi data dalam sistem pendidikan nasional</li>
        </ol>

        <p><strong>Kartu ini berlaku selama yang bersangkutan masih aktif sebagai Pendidik/Tenaga Kependidikan di satuan pendidikan yang terdaftar di Dapodik.</strong></p>
      </div>

      <div class="footer">
        <p>Dicetak otomatis melalui Sistem Dapodik | &copy; Kemendikbudristek</p>
      </div>

      <div class="watermark">NUPTK</div>
    </div>
  </div>

  <script>
    // Auto print jika ada parameter print=1
    document.addEventListener('DOMContentLoaded', function() {
      const urlParams = new URLSearchParams(window.location.search);
      if(urlParams.has('print')) {
        setTimeout(function() {
          window.print();
          // Tutup window setelah cetak jika ini adalah popup
          if(window.opener) {
            window.close();
          }
        }, 500);
      }
    });
  </script>
</body>
</html>