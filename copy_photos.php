<?php
/**
 * Script untuk menyalin dan mengganti nama foto guru dari folder uploads ke folder img
 * dengan format nama file yang unik berdasarkan NUPTK atau ID guru.
 */

// Proses setiap guru
while ($guru = mysqli_fetch_assoc($result)) {
    $id_guru = $guru['id_guru'];
    $nuptk = $guru['nuptk'];
    $foto_source = $guru['foto'];
    
    // ...
    
    // Tentukan nama file tujuan yang unik berdasarkan NUPTK atau ID
    $file_parts = pathinfo($foto_source);
    $extension = isset($file_parts['extension']) ? $file_parts['extension'] : 'jpg';
    
    if (!empty($nuptk)) {
        $destination_filename = 'guru_' . $nuptk . '.' . $extension;
    } else {
        $destination_filename = 'guru_' . $id_guru . '.' . $extension;
    }
    
    // ...
}