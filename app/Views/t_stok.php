<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <form action="<?= base_url('ConStok/output_tstok')?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Barang</label>
                        <select class="form-select" id="" aria-label="" name="b">
                            <?php foreach ($b as $mdl) { ?>
                            <option hidden>Pilih Barang</option>
                            <option class="" value="<?= $mdl->kd_barang ?>">
                                <?= $mdl->kd_barang ?>---<?= $mdl->nm_barang?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="" placeholder="Quantity" name="q" />
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="text-dark" href="<?= base_url('/ConStok/stok')?>">
                            <button type="button" class="btn btn-secondary">Back</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>