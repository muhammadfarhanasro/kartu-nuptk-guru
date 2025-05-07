<?php include_once ("admin/header.php"); ?>
<br>
<div class="container-fluid">
        <h1>Data Guru</h1>
        <hr>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8">
                    <a class="btn btn-primary" href="add_data_guru.php" role= "button"><i class='bx bx-book-add'></i>Tambah Data Guru</a>
                    <a class="btn btn-warning" href="lap_data_guru.php" role="button"><i class='bx bx-printer'></i>Print</a>
                </div>
                <div class="col-sm-4"> 
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" name="cari"
                        placeholder="Cari Produk" aria-label="Search"> 
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NUPTK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Foto</th>
                    <th scope="col">aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php
                error_reporting(0);
                include "koneksi.php";
                $batas = 5;
                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
                $previous = $halaman - 1;
                $next = $halaman + 1;
                
                $da = mysqli_query($link, "select * from guru");
                $jumlah_data = mysqli_num_rows($da);
                $total_halaman = ceil($jumlah_data / $batas);

                $nomor = $halaman_awal + 1;

                if (isset($_GET['cari'])){
                    $cari = $_GET['cari'];
                    $data_guru = mysqli_query($link, "select * from guru where nama like '%" . $cari . "%'");
                } else {
                    $data_guru = mysqli_query($link,  "select * from guru limit $halaman_awal, $batas");
                }

                while($data = mysqli_fetch_array($data_guru)){
                ?>
                <!-- akhir script menampilkan data -->
                <tr>
                    <th scope="row"><?php echo $nomor++; ?></th>
                    <td><?php echo $data['nuptk']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['tempat_lahir']; ?></td>
                    <td><?php echo $data['tanggal_lahir']; ?></td>
                    <td><?php echo $data['jenis_kelamin']; ?></td>
                    <td><img src="img/profil/<?php echo $data['foto']; ?>" width="80px" height="60"></td>

                    <td>
                    <a class="edit" href="edit_data_guru.php?id_guru=<?php echo $data['id_guru']; ?>"><i class='bx bx-edit bg-success p-2 text-white rounded'></i></a>
                    <a class="view" href="view_guru.php?id_guru=<?php echo $data['id_guru']; ?>"><i class='bx bx-show bg-warning p-2 text-white rounded'></i></a>
                    <a class="lapor" href="hhhh.php?id_guru=<?php echo $data['id_guru']; ?>"><i class='bx bx-printer bg-primary p-2 text-white rounded'></i></a>
                    <a class="hapus" href="hapus_data_guru.php?id_guru=<?= $data['id_guru']; ?>"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class='bx bx-trash bg-danger p-2 text-white rounded'></i></a>
                    
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if($halaman > 1){
                    echo "href='?halaman=$previous'"; } ?>>Previous</a>
            </li>
            <?php 
            for($x=1; $x <= $total_halaman; $x++) { 
                ?>

                <li class="page-item">
                    <a class="page-link" href="?halaman=<?php echo $x; ?>"><?php echo $x; ?></a></li>
                    <?php 
                } 
                ?>
                <li class="page-item">
                    <a class="page-link" <?php if($halaman < $total_halaman){
                        echo "href='?halaman=$next'"; } ?>>Next</a>
            </li>
        </ul>
    </nav>

</div>

<?php include_once("admin/footer.php"); ?>

        

