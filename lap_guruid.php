<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
  integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> 
  <title>Document</title>
</head>
<body>
  <div class="container">
    <h1>LAPORAN GURU</h1>
    <hr>
    
    <?php
    include 'koneksi.php';
    $id = $_GET['id_guru'];
    $query = "SELECT * FROM guru WHERE id_guru='$id'";
     ($data = mysqli_fetch_array(mysqli_query($link, $query)));
      ?>

      <div class="row">
        <div class="col-2">
          <div class="col"><label>NUPTK</label></div>
          <div class="col"><label>Nama</label></div>
          <div class="col"><label>Tempat Lahir</label></div>
          <div class="col"><label>Tanggal Lahir</label></div>
          <div class="col"><label>Jenis Kelamin</label></div>
        </div>

        <div class="col-6">
          <div class="col"><label><?php echo $data['nuptk']; ?></label></div>
          <div class="col"><label><?php echo $data['nama']; ?></label></div>
          <div class="col"><label><?php echo $data['tempat_lahir']; ?></label></div>
          <div class="col"><label><?php echo $data['tanggal_lahir']; ?></label></div>
          <div class="col"><label><?php echo $data['jenis_kelamin']; ?></label></div>
  </div>
  </div>

  <?php
    
    ?>
  <script>
    window.print();
  </script>
  </div>
</body>
</html>