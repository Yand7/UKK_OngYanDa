<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2"><span>User Table</h4>
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('/ConUser/t_user')?>">
                    <button class="btn icon icon-left btn-sm btn-primary mb-3">
                        Add Data</button>
                </a>
                <div class="table-responsive datatable-minimal">
                    <table class="table table-striped" id="table2">
                        <thead>
                            <tr>
                                <th style="padding-left: 0.5rem;">ID</th>
                                <th style="padding-left: 0.5rem;">Username</th>
                                <th style="padding-left: 0.5rem;">Email</th>
                                <th style="padding-left: 0.5rem;">Level</th>
                                <th style="padding-left: 0.5rem;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($us as $data){?>
                            <tr>
                                <td>(<?= $data->id_user?>)</td>
                                <td><?= $data->username?></td>
                                <td><?= $data->email?></td>
                                <td><?= $data->nm_level?></td>
                                <td>

                                    <a href="<?= base_url('/ConUser/e_user/'.$data->id_user)?>">
                                        <button class="btn btn-sm btn-warning text-white me-1 mb-1 mt-1">
                                            <i class="bx bx-edit"></i>
                                        </button>
                                    </a>

                                    <a href="#"
                                        onclick="openDeleteModal('<?= base_url('/ConUser/soft_delete_user/'.$data->id_user)?>')">
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
    function openDeleteModal(deleteLink) {
        document.getElementById('deleteLink').href = deleteLink;
        $('#deleteModal').modal('show');
    }
    </script>