<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12 mb-4">
            <h1><?= $title; ?></h1>
            <a href="<?= BASEURL; ?>admin"class="btn btn-sm btn-primary" >Kembali</a>
        </div>
        <div class="col-sm-12 mb-5">
        <form action="<?= BASEURL; ?>admin/tambah_asuransi_submit" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="payor_asuransi" class="form-label">Payor Asuransi</label>
                    <input type="text" name="payor_asuransi" class="form-control" id="payor_asuransi">
                </div>
                <div class="mb-3">
                    <label for="kode" class="form-label">Kode Asuransi</label>
                    <input type="text" name="kode" class="form-control" id="kode">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipe Pelayanan Asuransi</label>
                    <div>
                        <div class="form-check">
                            <input type="checkbox" name="tipe_pelayanan[]" value="ri" id="ri" class="form-check-input">
                            <label for="ri" class="form-check-label">Rawat Inap (RI)</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="tipe_pelayanan[]" value="rj" id="rj" class="form-check-input">
                            <label for="rj" class="form-check-label">Rawat Jalan (RJ)</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="produk" class="form-label">Produk Asuransi</label>
                    <div id="produk-container">
                        <div class="input-group mb-2">
                            <input type="text" name="produk[]" class="form-control" placeholder="Masukkan Produk">
                            <button type="button" id="add-produk" class="btn btn-success">Tambah</button>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="contoh_kartu" class="form-label">Contoh Kartu Asuransi</label>
                    <input type="file" name="contoh_kartu" class="form-control" id="contoh_kartu" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="call_center" class="form-label">Call Center Asuransi</label>
                    <div id="call-center-container">
                        <div class="input-group mb-2">
                            <input type="text" name="call_center[]" class="form-control" placeholder="Masukkan nomor Call Center">
                            <button type="button" id="add-call-center" class="btn btn-success">Tambah</button>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="penulisan_invoice" class="form-label">Penulisan Invoice Asuransi</label>
                    <input type="text" name="penulisan_invoice" class="form-control" id="penulisan_invoice">
                </div>
                <div class="mb-3">
                    <label for="struk_loa_loc" class="form-label">Struk LOA/LOC Asuransi</label>
                    <input type="file" name="struk_loa_loc" class="form-control" id="struk_loa_loc" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>