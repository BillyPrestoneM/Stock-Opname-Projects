<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <script src="<?= base_url() ?>assets/jquery/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.css">
</head>

<body class="bg-secondary">
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url() ?>index.php/auth/registration">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="PersonKey" id="PersonKey" placeholder="Person Key" value="<?= set_value('PersonKey'); ?>">
                                    <?= form_error('PersonKey', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="Nama" id="Nama" placeholder="Nama" value="<?= set_value('Nama'); ?>">
                                    <?= form_error('Nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" name="DateofBirth" id="DateofBirth" placeholder="Tanggal lahir" value="<?= set_value('DateofBirth'); ?>">
                                    <?= form_error('DateofBirth', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="PlaceofBirth" id="PlaceofBirth" placeholder="Tempat lahir" value="<?= set_value('PlaceofBirth'); ?>">
                                    <?= form_error('PlaceofBirth', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="HomeAddress" id="HomeAddress" placeholder="Alamat" value="<?= set_value('HomeAddress'); ?>">
                                    <?= form_error('HomeAddress', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="WorkAddress" id="WorkAddress" placeholder="Kerja" value="<?= set_value('WorkAddress'); ?>">
                                    <?= form_error('WorkAddress', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="Email" id="Email" placeholder="Email address" value="<?= set_value('Email'); ?>">
                                    <?= form_error('Email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class=" form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('index.php/auth/'); ?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>