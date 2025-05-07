<?php
include_once 'koneksi.php';

$id = $_GET['id_guru'];

// Data dari form
$a = $_POST['nuptk'];
$b = $_POST['nama'];
$c = $_POST['tempat_lahir'];
$d = $_POST['tanggal_lahir'];
$e = $_POST['jenis_kelamin'];

// Folder penyimpanan foto
$folder = 'img/profil/';

// Buat folder jika belum ada
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

// Cek file foto baru
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
$ekstensi = array('png', 'jpg', 'jpeg', 'gif');

// Ambil data lama
$cek = mysqli_query($link, "SELECT * FROM guru WHERE id_guru='$id'");
$data_lama = mysqli_fetch_assoc($cek);

if (!empty($filename)) { // Jika ada file foto baru yang diupload
    if (in_array($ext, $ekstensi)) {
        if ($ukuran < 256000) {
             // Bersihkan nama file dan buat nama baru pakai nama guru dan NUPTK
             $nama_bersih = preg_replace('/\s+/', '_', $b);
             $filename_baru = $nama_bersih . '_' . $a . '.' . $ext;

              // Pindahkan file
            move_uploaded_file($_FILES['foto']['tmp_name'], $folder . $filename_baru);

             // Hapus foto lama jika ada
             if (!empty($data_lama['foto']) && file_exists($folder . $data_lama['foto'])) {
                unlink($folder . $data_lama['foto']);
            }


            // Update data beserta foto baru
            mysqli_query($link, "UPDATE guru SET 
                nuptk='$a', 
                nama='$b', 
                tempat_lahir='$c', 
                tanggal_lahir='$d', 
                jenis_kelamin='$e', 
                foto='$filename_baru' 
                WHERE id_guru='$id'");
        } else {
            echo "Ukuran file terlalu besar. Maksimal 250KB.";
            exit;
        }
    } else {
        echo "Ekstensi file tidak valid. Harus jpg, jpeg, png, atau gif.";
        exit;
    }
} else {
    // Tidak upload foto baru → update data tanpa mengubah kolom foto
    mysqli_query($link, "UPDATE guru SET 
        nuptk='$a', 
        nama='$b', 
        tempat_lahir='$c', 
        tanggal_lahir='$d', 
        jenis_kelamin='$e' 
        WHERE id_guru='$id'");
}

header("location:guru.php");
exit;
?>
