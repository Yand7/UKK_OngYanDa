<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <form action="<?= base_url('ConUser/output_elevel')?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ide" value="<?= $l->id_level?>">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Level</label>
                        <input type="text" class="form-control" id="" placeholder="Nama Level" name="nl"
                            value="<?= $l->nm_level?>" />
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="text-dark" href="<?= base_url('/ConUser/level')?>">
                            <button type="button" class="btn btn-secondary">Back</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>