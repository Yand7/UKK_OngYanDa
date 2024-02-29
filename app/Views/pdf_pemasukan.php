<!DOCTYPE html>
<html>

<head>
    <style>
    body {
        font-family: Arial, sans-serif;
        text-transform: capitalize;
    }

    .container {
        max-width: 8000px;
        margin: 0 auto;
        padding: 20px;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .header img {
        width: 100%;
        height: auto;
    }

    .table-container {
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #e8e9ef;
    }

    td:nth-child(4) {
        text-align: justify;
        text-transform: capitalize;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Laporan Pemasukan</h1>
        </div>

        <div class="table-container">
            <table class="table table-striped table-bordered">
                <?php foreach ($nt as $data1) { ?>
                <thead>
                    <tr>
                        <td colspan="5" style="text-align: center; font-weight: bold;">Tanggal:
                            <?=$data1->create_date1?> || No
                            Transaksi: <?= $data1->ntr ?></td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: center; font-weight: bold;">
                            Pelanggan: <?= $data1->nm_pelanggan ?></td>
                    </tr>
                    <tr>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Bayar</th>
                        <th>Kembali</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ta as $data2) { ?>
                    <?php if ($data2->notrans == $data1->ntr) { ?>
                    <tr>
                        <td><?= $data2->nm_barang ?></td>
                        <td><?= $data2->jumlah ?></td>
                        <td>Rp<?= number_format($data2->price, 0, ',', '.') ?></td>
                        <td style="text-align: center;">-</td>
                        <td>-</td>
                    </tr>
                    <?php } ?>
                    <?php } ?>
                    <tr>
                        <td colspan="2" align="center">Grand Total:</td>
                        <td>Rp<?= number_format($data1->nominal, 0, ',', '.') ?></td>
                        <td>Rp<?= number_format($data1->bayar, 0, ',', '.') ?></td>
                        <td style="text-align: center;">Rp<?= number_format($data1->kembali, 0, ',', '.') ?></td>
                    </tr>
                </tbody>
                <?php } ?>

            </table>
        </div>
    </div>

    <script>
    window.print();
    </script>
</body>

</html>