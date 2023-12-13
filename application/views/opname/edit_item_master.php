<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Itemmaster</h1>
    </div>
    <div class="container">
        <form action="<?php echo site_url('opname/edit_item_master'); ?>" method="post">
            <div>
                <label>Nama Item</label>
                <input type="text" name="NamaItem" value="<?php echo $NamaItem; ?>" class="form-control mb-3">
            </div>
            <div>
                <label>Satuan Stok</label>
                <select name="SatuanStok" class="form-control mb-3">
                    <option value="">--pilih satuan--</option>
                    <option value="box">Box</option>
                    <option value="kg">Kg</option>
                    <option value="liter">Liter</option>
                    <option value="picis">Picis</option>
                </select>
            </div>
            <div>
                <label>Keaktifan</label>
                <select name="IsActive" class="form-control mb-3">
                    <option value="">--pilih opsi--</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </div>
            <input type="hidden" name="KodeItem" value="<?php echo $KodeItem ?>">
            <button type="submit" class="btn btn-success">Submit</button>
            <a type="submit" class="btn btn-primary" href="<?= base_url('index.php/opname/item_master'); ?>">Back</a>
        </form>
    </div>