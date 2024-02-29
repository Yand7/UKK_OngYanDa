<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <form action="<?= base_url('ConUser/output_euser')?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ide" value="<?= $us->id_user?>">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="" placeholder="Nama Lengkap" name="nl"
                            value="<?= $us->n_lengkap?>" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" class="form-control" id="" placeholder="Username" name="nm"
                            value="<?= $us->username?>" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" id="" placeholder="Email" name="em"
                            value="<?= $us->email?>" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" id="" placeholder="Password" name="pw"
                            value="<?= $us->pw?>" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Level</label>
                        <select class="form-select" id="" aria-label="" name="lv">
                            <option hidden value="<?= $us->level?>">Pilih Level</option>
                            <?php foreach ($lvl as $mdl) { ?>
                            <option class="" value="<?= $mdl->id_level ?>">
                                <?= $mdl->nm_level ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="text-dark" href="<?= base_url('/ConUser/user')?>">
                            <button type="button" class="btn btn-secondary">Back</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>