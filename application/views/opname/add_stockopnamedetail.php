<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Stockopnamedetail</h1>
    </div>
    <form action="<?php echo site_url('opname/save_stockopnamedetail'); ?>" method="post">
        <div class="row">
            <div class="col-6">
                <label>No Transaksi</label>
                <select class="form-control mb-3" name="NoTransaksi">
                    <option value="">--pilih no transaksi--</option>
                    <?php foreach ($stokopname as $stok) : ?>
                        <option value="<?= $stok->NoTransaksi ?>"><?= $stok->NoTransaksi; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-6">
                <label>KodeItem</label>
                <select class="form-control mb-3" name="KodeItem">
                    <option value="">--pilih item--</option>
                    <?php foreach ($item as $itm) : ?>
                        <option value="<?= $itm->KodeItem ?>"><?= $itm->NamaItem; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label>BatchNumber</label>
                <input type="text" name="BatchNumber" placeholder="" class="form-control mb-3">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label>ExpiredDate</label>
                <input type="date" name="ExpiredDate" placeholder="" class="form-control mb-3">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label>RealStock</label>
                <input type="text" name="RealStock" placeholder="" class="form-control mb-3">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label>EnteredBy</label>
                <input type="text" name="EnteredBy" placeholder="" class="form-control mb-3">
            </div>
            <div class="col-6">
                <label>EnteredDate</label>
                <input type="datetime-local" name="EnteredDate" placeholder="" class="form-control mb-3">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a type="submit" class="btn btn-primary" href="<?= base_url('index.php/opname/stockopnamedetail'); ?>">Back</a>
    </form>