<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <form action="<?= base_url('ConTrans/output_tout')?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="" placeholder="Keterangan" name="kt" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Jumlah</label>
                        <input type="text" class="form-control" id="" placeholder="Jumlah Pengeluaran" name="jp" />
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="text-dark" href="<?= base_url('/ConTrans/laporan_out')?>">
                            <button type="button" class="btn btn-secondary">Back</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>