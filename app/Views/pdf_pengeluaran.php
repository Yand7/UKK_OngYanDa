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
            <h1>Laporan Pengeluaran</h1>
        </div>

        <div class="table-container">
            <table class="table table-striped table-bordered">
                <?php foreach ($ta as $data) { ?>
                <thead>
                    <tr>
                        <td colspan="4" style="text-align: center; font-weight: bold;">Tanggal:
                            <?=$data->create_date1?> || No
                            Transaksi: <?= $data->ntr_out ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">Keterangan</th>
                        <th colspan="2">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2"><?= $data->keterangan ?></td>
                        <td colspan="2">Rp<?= number_format($data->jumlah, 0, ',', '.') ?></td>
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