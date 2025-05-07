<?php include_once("admin/header.php"); ?>

<div class="container">
    <h1>Tambah Data Guru</h1>
    <a class="btn btn-primary" href="guru.php" role="button">Kembali</a>
    <hr>

    <div class="card p-4 shadow-sm">
        <h5><i class="bx bx-edit text-danger"></i> <span class="text-danger font-weight-bold">Form Isian</span></h5>
        <hr>

        <form action="aksi_data_guru.php" method="post" enctype="multipart/form-data">

            <!-- Foto -->
            <div class="form-group">
                <label><i class="bx bx-image"></i> Foto</label>
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
                <input type="text" class="form-control" id="nuptk" name="nuptk" placeholder="NUPTK (16 Digit, Hanya Angka)" 
                required maxlength="16" pattern="\d{16}" title="NUPTK harus terdiri dari 16 digit angka"/>
            </div>

            <!-- Nama -->
            <div class="form-group">
                <label for="nama"><i class="bx bx-user"></i> Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap (Min 3, Max 29)">
            </div>

            <!-- Tempat Lahir -->
            <div class="form-group">
                <label for="tempat_lahir"><i class="bx bx-map"></i> Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir (Min 3, Max 24)">
            </div>

            <!-- Tanggal Lahir -->
            <div class="form-group">
                <label for="tanggal_lahir"><i class="bx bx-calendar"></i> Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
            </div>

            <!-- Gender -->
            <div class="form-group">
                <label for="jenis_kelamin"><i class="fa-solid fa-venus-mars"></i></i> Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="">Pilih</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
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
