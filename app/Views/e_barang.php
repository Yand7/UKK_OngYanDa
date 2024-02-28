<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <form action="<?= base_url('ConBarang/output_ebarang')?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="ide" value="<?= $b->id_barang?>">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="" placeholder="Nama Barang" name="nb" value="<?= $b->nm_barang?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="" placeholder="Harga" name="h" value="<?= $b->harga?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="" placeholder="Stok" name="s" value="<?= $b->stok?>"/>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="text-dark" href="<?= base_url('/ConBarang/barang')?>">
                            <button type="button" class="btn btn-secondary">Back</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>