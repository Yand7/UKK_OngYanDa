<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <form action="<?= base_url('ConPelanggan/output_tpelanggan')?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="" placeholder="Nama Pelanggan" name="np" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="" placeholder="Alamat" name="a" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">No HP</label>
                        <input type="text" class="form-control" id="" placeholder="No HP" name="n" />
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="text-dark" href="<?= base_url('/ConPelanggan/pelanggan')?>">
                            <button type="button" class="btn btn-secondary">Back</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>