<div class="container mt-5">
    <div class="row">
        <div class="col-12 mb-3">
            <h1><?= $title; ?></h1>
        </div>
        <div class="col-12">
            <form action="<?= BASEURL; ?>karyawan/update_data/<?= $data_karyawan->id; ?>" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $data_karyawan->nama; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?= $data_karyawan->email; ?>">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $data_karyawan->alamat; ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <a href="<?= BASEURL; ?>karyawan" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-small btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>

<!-- masuk footer -->