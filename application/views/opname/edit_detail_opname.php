<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Stockopnamedetail</h1>
    </div>
    <div class="container">
        <form action="<?php echo site_url('opname/edit_stockopnamedetail'); ?>" method="post">
            <div class="">
                <label>No Transaksi</label>
                <select class="form-control mb-3" name="NoTransaksi">
                    <option value="<?php echo $NoTransaksi; ?>">--pilih no transaksi--</option>
                    <?php foreach ($stokopname as $stok) : ?>
                        <option value="<?= $stok->NoTransaksi ?>"><?= $stok->NoTransaksi; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label>KodeItem</label>
                <select class="form-control mb-3" name="KodeItem">
                    <option value="<?php echo $KodeItem; ?>">--pilih item--</option>
                    <?php foreach ($item as $itm) : ?>
                        <option value="<?= $itm->KodeItem ?>"><?= $itm->NamaItem; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label>BatchNumber</label>
                <input type="text" name="BatchNumber" value="<?php echo $BatchNumber; ?>" class="form-control mb-3">
            </div>
            <div>
                <label>ExpiredDate</label>
                <input type="date" name="ExpiredDate" value="<?php echo $ExpiredDate; ?>" class="form-control mb-3">
            </div>
            <div>
                <label>RealStock</label>
                <input type="text" name="RealStock" value="<?php echo $RealStock; ?>" class="form-control mb-3">
            </div>
            <div>
                <label>EnteredBy</label>
                <input type="text" name="EnteredBy" value="<?php echo $EnteredBy; ?>" class="form-control mb-3">
            </div>
            <div>
                <label>EnteredDate</label>
                <input type="datetime-local" name="EnteredDate" value="<?php echo $EnteredDate; ?>" class="form-control mb-3">
            </div>
            <input type="hidden" name="NoLine" value="<?php echo $NoLine ?>">
            <button type="submit" class="btn btn-success">Submit</button>
            <a type="submit" class="btn btn-primary" href="<?= base_url('index.php/opname/stockopnamedetail'); ?>">Back</a>
        </form>
    </div>