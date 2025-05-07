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
      background-color: #1f2937;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      font-family: 'Arial', sans-serif;
    }

    .card-back {
      width: 8.6cm;
      height: 5.4cm;
      background: #374151;
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
      opacity: 0.10;
      z-index: 0;
    }

    .kemdikbud-logo {
      width: 30px;
      margin: 0 auto 5px;
    }

    .pusdatin {
      font-size: 10pt;
      font-weight: bold;
      margin-bottom: 2px;
      margin-left: 125px;
      color: #333;
      color: #60A5FA;
    }

    .pusdatin-sub {
      font-size: 8pt;
      margin-bottom: 5px;
      margin-left: 75px;
      color: #D1D5DB;
    }

    .nuptk-title {
      font-size: 16pt;
      font-weight: bold;
      margin: 8px 0 5px 0;
      margin-left: 75px;
      color: #60A5FA;
    }

    .nuptk-subtitle {
      font-size: 9pt;
      margin-bottom: 10px;
      margin-left: 30px;
      color: #D1D5DB;
    }   

    .logodapodik {
      position: absolute;
      top: 10px;
      right: 150px;
    }
    .dapodik-logo {
      width: 30px;
      margin: 0 auto 5px;
      margin-top: 150px;
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
      padding-bottom: 4px;
    }

    .header h2 {
      color: #60A5FA;
      font-size: 12pt;
      margin-bottom: 2px;
    }

    .header p {
      font-size: 7pt;
      color: #D1D5DB;
    }

    .main-content {
      flex-grow: 1;
      font-size: 6.5pt;
      line-height: 1.4;
      text-align: justify;
      color: #D1D5DB;
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
      color: #9CA3AF;
      margin-top: auto;
      padding-top: 3px;
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
      <img src="https://disdikbud.banyuasinkab.go.id/wp-content/uploads/sites/269/2022/11/Logo-Tut-Wuri-Handayani-PNG-Warna.png" 
           alt="Logo Kemdikbud" 
           class="kemdikbud-logo">

      <div class="pusdatin">PUSDATIN</div>
      <div class="pusdatin-sub">Pusat Data dan Teknologi Informasi</div>

      <div class="nuptk-title">KARTU NUPTK</div>
      <div class="nuptk-subtitle">Nomor Unik Pendidik dan Tenaga Kependidikan</div>
    </div>
    <div class="logodapodik">
      <img src="dapodik-logo.png" 
           alt="Logo Dapodik" 
           class="dapodik-logo">
    </div>

    <div class="watermark">NUPTK</div>
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