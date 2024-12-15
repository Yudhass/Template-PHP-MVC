<div class="container mt-5">
    <div class="row">
        <div class="col-12 mb-3">
            <h1><?= $title; ?></h1>
        </div>
        <div class="col-12">
            <form>
                <fieldset disabled>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Nama</label>
                        <input type="text" id="disabledTextInput" class="form-control" value="<?= $data_mahasiswa->nama; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Nim</label>
                        <input type="text" id="disabledTextInput" class="form-control" value="<?= $data_mahasiswa->nim; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Email</label>
                        <input type="text" id="disabledTextInput" class="form-control" value="<?= $data_mahasiswa->email; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Jurusan</label>
                        <input type="text" id="disabledTextInput" class="form-control" value="<?= $data_mahasiswa->jurusan; ?>">
                    </div>
                </fieldset>
                <a href="<?= BASEURL; ?>mahasiswa" class="btn btn-primary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<!-- masuk footer -->