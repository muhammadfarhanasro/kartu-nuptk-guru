<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> 

    <title> Laporan Data Guru </title>
</head>
<body>
    
<div class="container text-center">
    <div class="text-center p-3 mb-5 bg-white rounded shadow">
        <h1 class="display-4 text-center">Laporan Data Guru</h1>
    </div>
    <div class="row">
        <table border="2" align="center">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NUPTK</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                error_reporting(0);
                include "koneksi.php";
                $query = mysqli_query($link, "SELECT * FROM guru") or die(mysqli_error($link));
                $nomor = 1;
                while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $data['nuptk']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['tempat_lahir']; ?></td>
                        <td><?php echo $data['tanggal_lahir']; ?></td>
                        <td><?php echo $data['jenis_kelamin']; ?></td>
                    </tr>
            </tbody>
                    <?php
                }
                ?>
        </table>
        </div>
        </div>
        <script>
            window.print();
        </script>
</body>
</html>