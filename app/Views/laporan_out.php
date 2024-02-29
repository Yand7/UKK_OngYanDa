<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2"><span>Laporan Pengeluaran</h4>
        <div class="card mb-3">
            <div class="card-header">
                <form action="<?= base_url('ConLaporan/filter_pengeluaran')?>" method="post"
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
                <a href="<?= base_url('/ConLaporan/pdf_pengeluaran')?>?tgl=<?= $tgl ?>" target="_blank">
                    <button class="btn btn-sm btn-danger mb-3">PDF PRINT</button>
                </a>
                <div class="table-responsive datatable-minimal">
                    <table class="table table-striped table-bordered">
                        <?php foreach ($ta as $data) { ?>
                        <thead>
                            <tr>
                                <td colspan="4" style="text-align: center; font-weight: bold;">Tanggal:
                                    <?=$data->create_date1?> || No
                                    Transaksi: <?= $data->ntr_out ?></td>
                            </tr>
                            <tr>
                                <th colspan="2">Keterangan</th>
                                <th colspan="2">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2"><?= $data->keterangan ?></td>
                                <td colspan="2">Rp<?= number_format($data->jumlah, 0, ',', '.') ?></td>
                            </tr>
                        </tbody>
                        <?php } ?>

                    </table>
                </div>
            </div>
        </div>
        <!--/ Responsive Table -->
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a id="deleteLink" href="#">
                        <button type="button" class="btn btn-danger">Delete</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
    function openDeleteModal(deleteLink) {
        document.getElementById('deleteLink').href = deleteLink;
        $('#deleteModal').modal('show');
    }
    </script>