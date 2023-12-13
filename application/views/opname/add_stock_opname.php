<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Stokopname</h1>
    </div>
    <form action="<?php echo site_url('opname/save_stokopname'); ?>" method="post">
        <div class="row">
            <div class="col-6">
                <label>No Transaksi</label>
                <input type="text" name="NoTransaksi" placeholder="" class="form-control mb-3">
            </div>
            <div class="col-6">
                <label>Tanggal</label>
                <input type="datetime-local" name="Tanggal" placeholder="" class="form-control mb-3">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label>Keterangan</label>
                <input type="text" name="Keterangan" placeholder="" class="form-control mb-3">
            </div>
            <div class="col-6">
                <label>EnteredBy</label>
                <input type="text" name="EnteredBy" value="<?= $this->session->userdata('Email') ?>" class="form-control mb-3">
            </div>
        </div><br>
        <div class="row">
            <div class="col-12">
                <div class="row duplicate-row">
                    <div class="col-3">
                        <label>KodeItem</label>
                        <select class="form-control mb-3" name="KodeItem">
                            <option value="">--pilih item--</option>
                            <?php foreach ($item as $itm) : ?>
                                <option value="<?= $itm->KodeItem ?>"><?= $itm->NamaItem; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-3">
                        <label>BatchNumber</label>
                        <input type="text" name="BatchNumber" placeholder="" class="form-control mb-3">
                    </div>
                    <div class="col-3">
                        <label>ExpiredDate</label>
                        <input type="date" name="ExpiredDate" placeholder="" class="form-control mb-3">
                    </div>
                    <div class="col-3">
                        <label>RealStock</label>
                        <input type="text" name="RealStock" placeholder="" class="form-control mb-3">
                    </div>
                </div>
            </div>
        </div>
        <!-- <div>
                <label>EnteredDate</label>
                <input type="date" name="Tanggal" placeholder="" class="form-control mb-3">
            </div> -->
        <button type="submit" class="btn btn-success">Submit</button>
        <a type="submit" class="btn btn-primary" href="<?= base_url('index.php/opname/'); ?>">Back</a>
    </form>