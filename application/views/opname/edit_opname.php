<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Stokopname</h1>
    </div>
    <form action="<?php echo site_url('opname/edit_stokopname'); ?>" method="post">
        <div>
            <label>Tanggal</label>
            <input type="datetime-local" name="Tanggal" value="<?php echo $Tanggal; ?>" class="form-control mb-3">
        </div>
        <div>
            <label>Keterangan</label>
            <input type="text" name="Keterangan" value="<?php echo $Keterangan; ?>" class="form-control mb-3">
        </div>
        <div>
            <label>EnteredBy</label>
            <input type="text" name="EnteredBy" value="<?php echo $EnteredBy; ?>" class="form-control mb-3">
        </div>
        <input type="hidden" name="NoTransaksi" value="<?php echo $NoTransaksi ?>">
        <button type="submit" class="btn btn-success">Submit</button>
        <a type="submit" class="btn btn-primary" href="<?= base_url('index.php/opname/'); ?>">Back</a>
    </form>