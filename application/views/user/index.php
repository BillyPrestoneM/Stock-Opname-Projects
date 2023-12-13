<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User</h1>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
                <th>Alamat</th>
                <th>Kerja</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($persons as $row) :
            ?>
                <tr>
                    <th><?= $count; ?></th>
                    <td><?= $row->Nama; ?></td>
                    <td><?= $row->DateofBirth; ?></td>
                    <td><?= $row->PlaceofBirth; ?></td>
                    <td><?= $row->HomeAddress; ?></td>
                    <td><?= $row->WorkAddress; ?></td>
                    <td><?= $row->Email; ?></td>
                    <td><?= $row->Password; ?></td>
                    <td>
                        <a class="badge badge-pill badge-success" href="<?php echo site_url('user/edit/' . $row->PersonKey); ?>">Edit</a>
                        <a href="" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#deleteModal">Delete</a>
                    </td>
                </tr>
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
                                <form action="<?php echo site_url('user/delete/' . $row->PersonKey); ?>">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-danger" href="<?php echo site_url('user/get_delete/' . $row->PersonKey); ?>" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                $count++;
            endforeach;
            ?>
        </tbody>
    </table>
    </div>