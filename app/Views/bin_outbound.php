<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2"><span>Daftar Pengeluaran Bin</h4>
        <div class="card">
            <div class="card-header">
                <div class="table-responsive datatable-minimal">
                <table class="table table-striped" id="table2">
                        <thead>
                            <tr>
                                <th style="padding-left: 0.5rem;">Tanggal</th>
                                <th style="padding-left: 0.5rem;">No Transaksi</th>
                                <th style="padding-left: 0.5rem;">Keterangan</th>
                                <th style="padding-left: 0.5rem;">Status</th>
                                <th style="padding-left: 0.5rem;">Nominal</th>
                                <th style="padding-left: 0.5rem;">Delete Date</th>
                                <th style="padding-left: 0.5rem;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($ta as $data){?>
                            <tr>
                                <td><?= $data->create_date1?></td>
                                <td><?= $data->ntr_out?></td>
                                <td><?= $data->keterangan?></td>
                                <td>Pengeluaran</td>
                                <td>Rp<?= number_format($data->jumlah, 0, ',', '.') ?></td>
                                <td><?= $data->delete_date?></td>
                                <td>


                                    <a href="#"
                                        onclick="openRestoreModal('<?= base_url('/ConTrans/restore_outbound/'.$data->id_out)?>')">
                                        <button class="btn btn-sm btn-success mr-1 mb-1 mt-1">
                                            <i class="bx bx-reset"></i>
                                        </button>
                                    </a>

                                    <a href="#"
                                        onclick="openDeleteModal('<?= base_url('/ConTrans/delete_outbound/'.$data->id_out)?>')">
                                        <button class="btn btn-sm btn-danger mr-1 mb-1 mt-1">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </a>

                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
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

    <div class="modal fade" id="restoreModal" tabindex="-1" role="dialog" aria-labelledby="restoreModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="restoreModalLabel">Restore Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to restore this?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a id="restoreLink" href="#">
                        <button type="button" class="btn btn-success">Restore</button>
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

    <script>
    function openRestoreModal(restoreLink) {
        document.getElementById('restoreLink').href = restoreLink;
        $('#restoreModal').modal('show');
    }
    </script>