<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Stokopname</h1>
    </div>
    <h1 class="d-flex justify-content-center mb-4">Edit User</h1>
    <div class="row">
        <div class="col">
            <form action="<?php echo site_url('user/update'); ?>" method="post">
                <div>
                    <label>Nama</label>
                    <input class="form-control mb-2" type="text" name="Nama" value="<?= $result1['Nama']; ?>" placeholder="Nama">
                </div>
                <div>
                    <label>Tempat Lahir</label>
                    <input class="form-control mb-2" type="text" name="PlaceofBirth" value="<?php echo $result1['PlaceofBirth']; ?>" placeholder="Tempat lahir">
                </div>
                <div>
                    <label>Kerja</label>
                    <input class="form-control mb-2" type="text" name="WorkAddress" value="<?php echo $result1['WorkAddress']; ?>" placeholder="Kerja">
                </div>
                <div>
                    <label>Alamat</label>
                    <input class="form-control mb-2" type="text" name="HomeAddress" value="<?php echo $result1['HomeAddress']; ?>" placeholder="Alamat">
                </div>
        </div>
        <div class="col">
            <div>
                <label>Tanggal Lahir</label>
                <input class="form-control mb-2" type="date" name="DateofBirth" value="<?php echo $result1['DateofBirth']; ?>" placeholder="Tanggal lahir">
            </div>
            <div>
                <label>Email</label>
                <input class="form-control mb-2" type="text" name="Email" value="<?php echo $result2['Email']; ?>" placeholder="Email">
            </div>
            <div>
                <label>Password</label>
                <input class="form-control mb-2" type="text" name="Password" value="<?php echo $result2['Password']; ?>" placeholder="Password">
            </div>
            <input type="hidden" name="PersonKey" value="<?php echo $result1['PersonKey'] ?>">
            <input type="hidden" name="PersonKey" value="<?php echo $result2['PersonKey'] ?>">
        </div>
    </div>
    <br><button type="submit" class="btn btn-success">Submit</button>
    </form>
    <a type="submit" class="btn btn-primary" href="<?= base_url('index.php/user/'); ?>">Back</a>