<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12 mb-4">
            <h1><?= $title; ?></h1>
            <a href="<?= BASEURL; ?>admin" class="btn btn-sm btn-primary">Kembali</a>
        </div>
        <div class="col-sm-12 mb-5">
            <form action="<?= BASEURL; ?>admin/edit_asuransi_submit/<?= $data_asuransi->id; ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="payor_asuransi" class="form-label">Payor Asuransi</label>
                    <input type="text" name="payor_asuransi" value="<?= $data_asuransi->payor_asuransi; ?>" class="form-control" id="payor_asuransi">
                </div>
                <div class="mb-3">
                    <label for="kode" class="form-label">Kode Asuransi</label>
                    <input type="text" name="kode" value="<?= $data_asuransi->kode; ?>" class="form-control" id="kode">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipe Pelayanan Asuransi</label>
                    <div>
                        <div class="form-check">
                            <?php if ($data_asuransi->pelayanan_ri == 1): ?>
                                <input type="checkbox" name="tipe_pelayanan[]" value="ri" id="ri" class="form-check-input" checked>
                            <?php else: ?>
                                <input type="checkbox" name="tipe_pelayanan[]" value="ri" id="ri" class="form-check-input">
                            <?php endif ?>
                            <label for="ri" class="form-check-label">Rawat Inap (RI)</label>
                        </div>
                        <div class="form-check">
                            <?php if ($data_asuransi->pelayanan_ri == 1): ?>
                                <input type="checkbox" name="tipe_pelayanan[]" value="rj" id="rj" class="form-check-input" checked>
                            <?php else: ?>
                                <input type="checkbox" name="tipe_pelayanan[]" value="rj" id="rj" class="form-check-input">
                            <?php endif ?>

                            <label for="rj" class="form-check-label">Rawat Jalan (RJ)</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div id="produk-container">
                        <label for="produk" class="form-label">Produk Asuransi</label>
                        <?php
                        // Pisahkan produk jika ada koma
                        $produk = explode(',', $data_asuransi->produk);
                        foreach ($produk as $key => $value):
                        ?>
                            <div class="input-group mb-2">
                                <input type="text" name="produk[]" class="form-control" value="<?= trim($value); ?>" placeholder="Masukkan produk">
                                <!-- Tombol hapus hanya muncul jika lebih dari satu inputan -->
                                <?php if ($key > 0): ?>
                                    <button type="button" class="btn btn-danger btn-sm remove-produk">Hapus</button>
                                <?php else: ?>
                                    <button type="button" id="add-produk" class="btn btn-success">Tambah</button>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                        <!-- Tombol untuk menambahkan input baru -->
                    </div>
                </div>
                <div class="mb-3">
                    <a href="<?= BASEURL . 'img/' . $data_asuransi->contoh_kartu; ?>" style="cursor: pointer;">
                        <img src="<?= BASEURL . 'img/' . $data_asuransi->contoh_kartu; ?>" alt="" style="height: 50px;">
                    </a>
                    <label for="contoh_kartu" class="form-label">Contoh Kartu Asuransi</label>
                    <input type="file" name="contoh_kartu" class="form-control" id="contoh_kartu" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="call_center" class="form-label">Call Center Asuransi</label>
                    <div id="call-center-container">
                        <?php
                        // Pisahkan nomor call center jika ada koma
                        $callCenters = explode(',', $data_asuransi->call_center);
                        foreach ($callCenters as $key => $callCenter):
                        ?>
                            <div class="input-group mb-2">
                                <input type="text" name="call_center[]" class="form-control" value="<?= trim($callCenter); ?>" placeholder="Masukkan nomor Call Center">
                                <!-- Tombol hapus hanya muncul jika lebih dari satu inputan -->
                                <?php if ($key > 0): ?>
                                    <button type="button" class="btn btn-danger btn-sm remove-call-center">Hapus</button>
                                <?php else: ?>
                                    <button type="button" id="add-call-center" class="btn btn-success">Tambah</button>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                        <!-- Tombol untuk menambahkan input baru -->
                    </div>
                </div>
                <div class="mb-3">
                    <label for="penulisan_invoice" class="form-label">Penulisan Invoice Asuransi</label>
                    <input type="text" name="penulisan_invoice" value="<?= $data_asuransi->penulisan_invoice; ?>" class="form-control" id="penulisan_invoice">
                </div>
                <div class="mb-3">
                    <a href="<?= BASEURL . 'img/' . $data_asuransi->struk_loa_loc; ?>" style="cursor: pointer;">
                        <img src="<?= BASEURL . 'img/' . $data_asuransi->struk_loa_loc; ?>" alt="" style="height: 50px;">
                    </a>
                    <label for="struk_loa_loc" class="form-label">Struk LOA/LOC Asuransi</label>
                    <input type="file" name="struk_loa_loc" class="form-control" id="struk_loa_loc" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>