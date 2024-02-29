<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2"><span>Laporan Pemasukan</h4>
        <div class="card mb-3">
            <div class="card-header">
                <form action="<?= base_url('ConLaporan/filter_laporan_pemasukan')?>" method="post"
                    enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Date</label>
                        <input type="date" class="form-control" id="" placeholder="" name="tgl" />
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-primary">Find</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('/ConLaporan/pdf_pemasukan')?>?tgl=<?= $tgl ?>" target="_blank">
                    <button class="btn btn-sm btn-danger mb-3">PDF PRINT</button>
                </a>
                <div class="table-responsive datatable-minimal">
                    <table class="table table-striped table-bordered">
                        <?php foreach ($nt as $data1) { ?>
                        <thead>
                            <tr>
                                <td colspan="5" style="text-align: center; font-weight: bold;">Tanggal:
                                    <?=$data1->create_date1?> || No
                                    Transaksi: <?= $data1->ntr ?></td>
                            </tr>

                            <tr>
                                <td colspan="5" style="text-align: center; font-weight: bold;">
                                    Pelanggan: <?= $data1->nm_pelanggan ?></td>
                            </tr>

                            <tr>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Bayar</th>
                                <th>Kembali</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ta as $data2) { ?>
                            <?php if ($data2->notrans == $data1->ntr) { ?>
                            <tr>
                                <td><?= $data2->nm_barang ?></td>
                                <td><?= $data2->jumlah ?></td>
                                <td>Rp<?= number_format($data2->price, 0, ',', '.') ?></td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                            <tr>
                                <td colspan="2" align="center">Grand Total:</td>
                                <td>Rp<?= number_format($data1->nominal, 0, ',', '.') ?></td>
                                <td>Rp<?= number_format($data1->bayar, 0, ',', '.') ?></td>
                                <td>Rp<?= number_format($data1->kembali, 0, ',', '.') ?></td>
                            </tr>
                        </tbody>
                        <?php } ?>

                    </table>
                </div>
            </div>
        </div>
        <!--/ Responsive Table -->
    </div>