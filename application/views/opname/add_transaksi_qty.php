<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Itemqtytransaksi</h1>
    </div>
    <form action="<?php echo site_url('opname/save_itemqtytransaksi'); ?>" method="post">
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
                <label>ItemId</label>
                <select class="form-control mb-3" name="ItemId">
                    <option value="">--pilih item--</option>
                    <?php foreach ($item as $itm) : ?>
                        <option value="<?= $itm->KodeItem ?>"><?= $itm->NamaItem; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label>ExpiredDate</label>
                <input type="date" name="ExpiredDate" placeholder="" class="form-control mb-3">
            </div>
            <div class="col-6">
                <label>BatchNumber</label>
                <input type="text" name="BatchNumber" placeholder="" class="form-control mb-3">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label>Qty</label>
                <input type="text" name="Qty" placeholder="" class="form-control mb-3">
            </div>
            <div class="col-6">
                <label>ItemQtyLocation_Balance</label>
                <input type="text" name="ItemQtyLocation_Balance" placeholder="" class="form-control mb-3">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a type="submit" class="btn btn-primary" href="<?= base_url('index.php/opname/itemqtytransaksi'); ?>">Back</a>
    </form>