<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <form action="<?= base_url('ConTrans/output_etrans')?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ide" value="<?= $t->id_ntr?>">
                    <div class="mb-3">
                        <label for="" class="form-label">Status</label>
                        <select class="form-select" id="" aria-label="" name="s">
                            <option hidden value="<?= $t->status?>">Pilih Status</option>
                            <option value="Pending">Pending</option>
                            <option value="Paid">Paid</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Payment</label>
                        <select class="form-select" id="" aria-label="" name="p">
                            <option hidden value="<?= $t->payment?>">Pilih Payment</option>
                            <option value="Cash">Via Cash</option>
                            <option value="QRIS">Via QRIS</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nominal</label>
                        <input disabled type="text" class="form-control" id="" placeholder="Kembali" name=""
                            value="<?= $t->nominal?>" />
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Bayar</label>
                        <input type="text" class="form-control" id="bayarInput" placeholder="Bayar" name="b"  value="<?= $t->bayar?>"/>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Kembali</label>
                        <input readonly type="text" class="form-control" id="kembaliInput" placeholder="Kembali"
                            name="k"  value="<?= $t->kembali?>"/>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="text-dark" href="<?= base_url('/ConTrans/transaksi')?>">
                            <button type="button" class="btn btn-secondary">Back</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    var bayarInput = document.getElementById('bayarInput');
    var kembaliInput = document.getElementById('kembaliInput');

    bayarInput.addEventListener('input', function() {
        var nominalValue = <?= $t->nominal ?>;

        var bayarValue = parseFloat(bayarInput.value) || 0;

        var kembaliValue = nominalValue - bayarValue;

        kembaliValue = Math.abs(kembaliValue);

        kembaliInput.value = kembaliValue.toFixed(0);
    });
    </script>