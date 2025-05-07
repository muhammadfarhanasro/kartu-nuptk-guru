<?php
// print_nuptk.php
$id_guru = isset($_GET['id_guru']) ? (int)$_GET['id_guru'] : 0;

if($id_guru <= 0) {
  die("ID Guru tidak valid");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cetak Kartu NUPTK Lengkap</title>
  <style>
    @page {
      size: 18cm 5.4cm; /* Ditambah lebarnya untuk memberi jarak */
      margin: 0;
      orientation: landscape;
    }
    
    @media print {
      body {
        margin: 0;
        padding: 0;
        width: 18cm;
        height: 5.4cm;
      }
      
      .card-wrapper {
        display: flex;
        flex-direction: row;
        width: 18cm;
        height: 5.4cm;
        justify-content: space-between; /* Memberi jarak antara kartu */
        padding: 0 0.5cm; /* Padding kiri kanan */
      }
      
      .card-container {
        width: 8.6cm;
        height: 5.4cm;
        box-shadow: none;
      }
      
      /* Jarak khusus antara kartu */
      .card-container:first-child {
        margin-right: 0.5cm;
      }
      
      .page-break {
        display: none;
      }
    }
    
    @media screen {
      body {
        background-color:rgb(244, 243, 243);
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
      }
      
      .card-wrapper {
        display: flex;
        flex-direction: column;
      }
      
      .card-container {
        width: 8.6cm;
        height: 5.4cm;
        margin: 10px 0;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
      }
      
      .print-button {
        margin: 20px;
        padding: 10px 20px;
        background: #0080e3;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
    }
    
    .no-print {
      display: none;
    }
    
    @media print {
      .no-print {
        display: none !important;
      }
    }
  </style>
</head>
<body>
  <div class="card-wrapper">
    <!-- Front Card -->
    <div class="card-container">
      <?php include 'nuptk_front.php'; ?>
    </div>
    
    <!-- Back Card -->
    <div class="card-container">
      <?php include 'nuptk.php'; ?>
    </div>
  </div>

  <!-- Print button untuk tampilan di browser -->
  <button class="print-button no-print" onclick="window.print()">
    Cetak Kartu
  </button>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Auto print jika ada parameter print=1
      if(window.location.search.includes('print=1')) {
        // Tutup window setelah cetak jika ini popup
        if(window.opener) {
          window.close();
        }
        return;
      }
      
      // Jika auto print diaktifkan
      if(window.location.search.includes('autoprint=1')) {
        // Tunggu semua gambar selesai dimuat
        const images = document.querySelectorAll('img');
        let loadedImages = 0;
        
        function checkAllImagesLoaded() {
          loadedImages++;
          if(loadedImages === images.length) {
            setTimeout(function() {
              window.print();
              // Tambahkan parameter print=1 ke URL
              if(!window.location.search.includes('print=1')) {
                const separator = window.location.search ? '&' : '?';
                window.location.search += separator + 'print=1';
              }
            }, 500);
          }
        }
        
        // Jika tidak ada gambar, langsung print
        if(images.length === 0) {
          setTimeout(function() {
            window.print();
            if(!window.location.search.includes('print=1')) {
              const separator = window.location.search ? '&' : '?';
              window.location.search += separator + 'print=1';
            }
          }, 500);
          return;
        }
        
        // Periksa status setiap gambar
        images.forEach(img => {
          if(img.complete) {
            checkAllImagesLoaded();
          } else {
            img.addEventListener('load', checkAllImagesLoaded);
            img.addEventListener('error', checkAllImagesLoaded);
          }
        });
      }
    });
  </script>
</body>
</html>