<?php
include_once 'koneksi.php';

// menangkap data yang di kirim dari form 

$a = $_POST['nuptk'];
$b = $_POST['nama'];
$c = $_POST['tempat_lahir'];
$d = $_POST['tanggal_lahir'];
$e = $_POST['jenis_kelamin'];
 

$folder = 'img/profil/';
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

//script menangkap data file foto 

$ekstensi =  array('png','jpg','jpeg','gif'); // ekstensi file yang diizinkan
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);




// Validasi ekstensi file
if(in_array($ext,$ekstensi)) {// jika file yang diupload sesuai dengan ekstensi yang diizinkan;
if($ukuran < 256000){ // ukuran file max 250kb
    $nama_bersih = preg_replace('/\s+/', '_', $b);
    $filename = $nama_bersih . '_' . $a . '.' . $ext;
    $xx = $filename;
     // Pindahkan file yang di-upload ke folder 'img/'
     move_uploaded_file($_FILES['foto']['tmp_name'],'img/profil/' . $xx);
     mysqli_query($link, "INSERT INTO guru (nuptk,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,foto)
 VALUES ('$a','$b','$c','$d','$e','$xx')");
    header("location:guru.php");
    exit();
} else {
    echo "Ukuran file terlalu besar. Maksimal 250KB.";
} 

} else {
    echo "Ekstensi file tidak diperbolehkan. Hanya JPG, JPEG, PNG, dan GIF.";
} 
?>
