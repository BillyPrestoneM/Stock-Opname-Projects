<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Stokopname</h1>
    </div>
    <a href="<?php echo site_url('opname/add_stokopname'); ?>" class="btn btn-primary mb-3">Add</a>
    <?= $this->session->flashdata('message'); ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>No. Transaksi</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Entered By</th>
                <th>Detail</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($opname as $row) :
            ?>
                <tr>
                    <td><?= $count; ?></td>
                    <td><?= $row->NoTransaksi; ?></td>
                    <td><?= $row->Tanggal; ?></td>
                    <td><?= $row->Keterangan; ?></td>
                    <td><?= $row->EnteredBy; ?></td>
                    <td><a class="badge badge-pill badge-primary" href="<?php echo site_url('opname/get_detail_opname/'  . $row->NoTransaksi); ?>">Detail</a></td>
                    <td>
                        <a class="badge badge-pill badge-success" href="<?php echo site_url('opname/get_edit_stokopname/'  . $row->NoTransaksi); ?>">Edit</a>
                        <a class="badge badge-pill badge-danger" href="" data-toggle="modal" data-target="#deleteModal">Delete</a>
                    </td>

                </tr>
            <?php
                $count++;
            endforeach;
            ?>
        </tbody>
    </table>
    </div>




    <!-- Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Do you want to delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are ready to delete your current session.</div>
                <div class="modal-footer">
                    <form action="<?php echo site_url('opname/delete_stokopname/' . $row->NoTransaksi); ?>">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-danger" href="<?php echo site_url('opname/get_delete_stokopname/' . $row->NoTransaksi); ?>" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>