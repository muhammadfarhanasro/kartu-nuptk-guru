<?php
// Sertakan library PHP QR Code
include 'phpqrcode/qrlib.php';

// Ambil NUPTK dari parameter GET
$nuptk = isset($_GET['nuptk']) ? $_GET['nuptk'] : 'NUPTK-TIDAK-DIKETAHUI';

// Set header agar browser mengenali sebagai gambar PNG
header('Content-Type: image/png');

// Generate QR Code dari NUPTK
QRcode::png($nuptk, null, QR_ECLEVEL_L, 4, 2);
?>
