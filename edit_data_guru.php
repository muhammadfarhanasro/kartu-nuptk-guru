<?php include_once("admin/header.php"); ?>

<div class="container">
    <h1>Edit Data Guru</h1>
    <a class="btn btn-warning" href="guru.php" role="button">Kembali</a>
    <hr>

    <?php
    include_once("koneksi.php");
    $id = $_GET['id_guru'];
    $data = mysqli_query($link, "SELECT * FROM guru WHERE id_guru='$id'");
    $d = mysqli_fetch_assoc($data); // hanya ambil 1 baris data
    ?>
    
    <div class="card p-4 shadow-sm">
        <h5><i class="bx bx-edit text-danger"></i> <span class="text-danger font-weight-bold">Form Edit</span></h5>
        <hr>
        <form action="aksi_edit_guru.php?id_guru=<?= $id ?>" method="post" enctype="multipart/form-data">
        
            <!-- Foto Sebelumnya -->
            <div class="form-group">
                <label><i class="bx bx-image"></i> Foto Sebelumnya</label><br>
                <?php if (!empty($d['foto'])): ?>
                    <img src="img/<?= $d['foto'] ?>" width="100" class="mb-2" alt="Foto Guru"><br>
                <?php endif; ?>
                <input type="file" class="form-control-file" name="foto">
                <small class="form-text text-danger">
                    File Pas Photo | 3x4* | Max size 250KB | Format (.jpg/.jpeg/.png)
                </small>
                <small class="form-text text-success">
                    (Ukuran 3x4 yaitu <strong>2,79 x 3,81 cm</strong> resolusi 300 dpi atau 
                    <strong>354 x 472 pixels</strong> resolusi 300 dpi)
                </small>
            </div>

            <!-- NUPTK -->
            <div class="form-group">
                <label for="nuptk"><i class="bx bx-grid-alt"></i> NUPTK</label>
                <input type="text" class="form-control" id="nuptk" name="nuptk" value="<?= $d['nuptk'] ?>" placeholder="NUPTK (16 Digit, Hanya Angka)">
            </div>

            <!-- Nama -->
            <div class="form-group">
                <label for="nama"><i class="bx bx-user"></i> Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $d['nama'] ?>" placeholder="Nama Lengkap">
            </div>

            <!-- Tempat Lahir -->
            <div class="form-group">
                <label for="tempat_lahir"><i class="bx bx-map"></i> Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $d['tempat_lahir'] ?>" placeholder="Tempat Lahir">
            </div>

            <!-- Tanggal Lahir -->
            <div class="form-group">
                <label for="tanggal_lahir"><i class="bx bx-calendar"></i> Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $d['tanggal_lahir'] ?>">
            </div>

            <!-- Gender -->
            <div class="form-group">
                <label for="jenis_kelamin"><i class="fa-solid fa-venus-mars"></i> Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="">Pilih</option>
                    <option value="Laki-laki" <?= $d['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="Perempuan" <?= $d['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                </select>
            </div>

            <!-- Tombol Simpan -->
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-success">
                    <i class="bx bx-save"></i> Simpan
                </button>
            </div>

        </form>
    </div>
</div>

<?php include_once("admin/footer.php"); ?>
