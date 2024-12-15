<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-sm-12">
            <?php Flasher::getFlash(); ?>
            <h1><?= $title; ?></h1>
        </div>
        <div class="col-sm-12">
            <a href="<?= BASEURL; ?>admin/tambah_asuransi" class="btn btn-sm btn-primary mb-4">Add Data</a>
            <table id="data_asuransi" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th rowspan="2">No.</th>
                        <th rowspan="2">PAYOR ASURANSI</th>
                        <th rowspan="2">KODE</th>
                        <th colspan="2">PELAYANAN</th> <!-- PELAYANAN akan mencakup 2 kolom -->
                        <th rowspan="2">PRODUK</th>
                        <th rowspan="2">CONTOH KARTU</th>
                        <th rowspan="2">Call Center</th>
                        <th rowspan="2">PENULISAN DALAM INVOICE</th>
                        <th rowspan="2">STRUK LOA / LOC</th>
                        <th rowspan="2">ACTION</th>
                    </tr>
                    <tr>
                        <th>RI</th>
                        <th>RJ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_asuransi as $index => $row): ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= $row->payor_asuransi; ?></td>
                            <td><?= $row->kode; ?></td>
                            <td><?= $row->pelayanan_ri == 1 ? 'Ya' : 'Tidak'; ?></td>
                            <td><?= $row->pelayanan_rj == 1 ? 'Ya' : 'Tidak'; ?></td>
                            <td><?= str_replace(',', '<br>', $row->produk); ?></td>
                            <td><img src="<?= BASEURL . 'img/' . $row->contoh_kartu; ?>" alt="" style="height: 50px;"></td>
                            <td><?= str_replace(',', '<br>', $row->call_center); ?></td>
                            <td><?= $row->penulisan_invoice; ?></td>
                            <td><img src="<?= BASEURL . 'img/' . $row->struk_loa_loc; ?>" alt="" style="height: 50px;"></td>
                            <td>
                                <a href="<?= BASEURL; ?>admin/edit_asuransi/<?= $row->id; ?>" class="btn btn-sm btn-success">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="<?= BASEURL; ?>admin/hapus_asuransi/<?= $row->id; ?>" class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>