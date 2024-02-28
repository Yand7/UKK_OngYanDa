<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <?php foreach($b as $data){?>
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data->nm_barang?></h5>
                        <?php 
                            if ($data->stok>0) {
                        ?>

                        <h6 class="card-subtitle text-success">Available</h6>

                        <?php 
                            }else if ($data->stok==0) {
                        ?>

                        <h6 class="card-subtitle text-danger">Unavailable</h6>

                        <?php 
                            }
                        ?>
                        <h6 class="card-subtitle mt-1 mb-2 text-muted">
                            Rp<?= number_format(floor($data->harga), 0, ',', '.') ?>
                        </h6>
                        <div class="row">
                            <?php 
                               if ($data->stok>0) {
                            ?>

                            <div class="col-md-6">
                                <form action="<?= base_url('ConCart/add_cart')?>" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="ide" value="<?= $data->id_barang?>">
                                    <input type="text" name="jmlh" id="" class="form-control" style="width: 130px;"
                                        oninput="validateInput(this)" placeholder="Masukkan Jumlah">
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-sm mt-1">Add</button>
                                </form>
                            </div>

                            <?php 
                                }else if ($data->stok==0) {
                            ?>
                            <div class="col-md-6">
                                <input disabled type="text" name="" id="" style="width: 130px;"
                                    oninput="validateInput(this)">
                            </div>
                            <div class="col-md-6">
                                <button disabled class="btn btn-success btn-sm">Add</button>
                            </div>

                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<script>
function validateInput(inputElement) {
    inputElement.value = inputElement.value.replace(/[^0-9]/g, '');

    if (inputElement.value === '') {
        return;
    }

    const minValue = 1;
    const maxValue = 99999;
    const numericValue = parseInt(inputElement.value);

    if (isNaN(numericValue) || numericValue < minValue) {
        inputElement.value = minValue;
    } else if (numericValue > maxValue) {
        inputElement.value = maxValue;
    }
}
</script>