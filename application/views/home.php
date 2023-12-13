<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <!-- MAIN CONTENT -->
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <a href="<?php echo site_url('opname/index'); ?>" class="text-white h5">Stock Opname</a>
                    <p class="card-text mt-3">Berisi Data Stock Opname</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body">
                    <a href="<?php echo site_url('opname/stockopnamedetail'); ?>" class="text-white h5">Stock Opname Detail</a>
                    <p class="card-text mt-3">Berisi Data Stock Opname Details</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <a href="<?php echo site_url('opname/itemqtytransaksiheader'); ?>" class="text-white h5">Item Quantity Transaksi Header</a>
                    <p class="card-text mt-3">Berisi Data Quantity Transaksi Header</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <a href="<?php echo site_url('opname/itemqtytransaksi'); ?>" class="text-white h5">Item Quantity Transaksi</a>
                    <p class="card-text mt-3">Berisi Data Item Quantity Transaksi</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <a href="<?php echo site_url('opname/item_master'); ?>" class="text-white h5">Item Master</a>
                    <p class="card-text mt-3">Berisi Data Item Master</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">
                    <a href="<?= base_url('index.php/user/profile'); ?>" class="text-white h5">Profile</a>
                    <p class="card-text mt-3">Berisi Profile</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    <a href="<?= base_url('index.php/user/'); ?>" class="text-white h5">User</a>
                    <p class="card-text mt-3">Berisi Data User</p>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</main>