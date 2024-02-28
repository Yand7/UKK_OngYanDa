<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <div class="table-responsive datatable-minimal">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td colspan="3" style="text-align: center; font-weight: bold;">No Transaksi: <?= $ntr ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $grandTotal = 0;
                            foreach ($t as $data) { ?>
                            <tr>
                                <td><?= $data->nm_barang ?></td>
                                <td><?= $data->jumlah ?></td>
                                <td>Rp<?= number_format($data->price, 0, ',', '.') ?></td>
                            </tr>
                            <?php 
                            $grandTotal += floor($data->price);
                            } ?>

                            <tr>
                                <td colspan="2" align="center">Grand Total:</td>
                                <td>Rp<?= number_format($grandTotal, 0, ',', '.') ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Responsive Table -->
        <a class="text-dark" href="<?= base_url('/ConTrans/transaksi')?>">
            <button type="button" class="btn btn-secondary mt-3">Back</button></a>
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