<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <form action="<?= base_url('ConPelanggan/output_epelanggan')?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="ide" value="<?= $p->id_pelanggan?>">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="" placeholder="Nama Pelanggan" name="np" value="<?= $p->nm_pelanggan?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="" placeholder="Alamat" name="a" value="<?= $p->alamat?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">No HP</label>
                        <input type="text" class="form-control" id="" placeholder="No HP" name="n" value="<?= $p->nhp?>"/>
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