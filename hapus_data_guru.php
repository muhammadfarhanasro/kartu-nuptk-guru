<?php
include_once 'koneksi.php';

if (isset($_GET['id_guru'])) {
    $id = $_GET['id_guru'];

    $id = mysqli_real_escape_string($link, $id);
    
mysqli_query($link, "DELETE FROM guru WHERE id_guru='$id'");
header("location:guru.php");
}
?>