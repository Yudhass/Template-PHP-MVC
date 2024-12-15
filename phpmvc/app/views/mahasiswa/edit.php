<div class="container mt-5">
    <div class="row">
        <div class="col-12 mb-3">
            <h1><?= $title; ?></h1>
        </div>
        <div class="col-12">
            <form action="<?= BASEURL; ?>mahasiswa/update_data/<?= $data_mahasiswa->id; ?>" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $data_mahasiswa->nama; ?>">
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">Nim</label>
                    <input type="text" name="nim" id="nim" class="form-control" value="<?= $data_mahasiswa->nim; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?= $data_mahasiswa->email; ?>">
                </div>
                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" class="form-control" value="<?= $data_mahasiswa->jurusan; ?>">
                </div>
                <a href="<?= BASEURL; ?>mahasiswa" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-small btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>

<!-- masuk footer -->