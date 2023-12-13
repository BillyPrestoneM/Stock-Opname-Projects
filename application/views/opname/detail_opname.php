<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Stokopname</h1>
    </div>
    <div class="container">
        <p>No Transaksi : <?php echo $NoTransaksi ?></p>
        <p>Tanggal : <?php echo $Tanggal ?></p>
        <p>Keterangan : <?php echo $Keterangan ?></p>
        <p>EnteredBy : <?php echo $EnteredBy ?></p>

        <table border="1" width="800px" style="text-align: center; padding: 1 1 1 1">
            <thead>
                <tr>
                    <td>No</td>
                    <td>KodeItem</td>
                    <td>BatchNumber</td>
                    <td>ExpiredDate</td>
                    <td width="100px">RealStock</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                foreach ($detail as $row) :
                ?>
                    <tr>
                        <td><?= $count; ?></td>
                        <td><?= $row->KodeItem; ?></td>
                        <td><?= $row->BatchNumber; ?></td>
                        <td><?= $row->ExpiredDate; ?></td>
                        <td><?= $row->RealStock; ?></td>
                    </tr>
                <?php
                    $count++;
                endforeach;
                ?>
            </tbody>
        </table>
        <br>
        <a type="submit" class="btn btn-primary mr-3" href="<?= base_url('index.php/opname/'); ?>">Back</a>
    </div>