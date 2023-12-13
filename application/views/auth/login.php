<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="<?= base_url() ?>assets/jquery/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.css">
</head>

<body class="bg-secondary">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                                    </div>

                                    <?= $this->session->flashdata('message'); ?>

                                    <form class="user" method="post" action="<?= base_url() ?>index.php/auth/index">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="Email" id="Email" placeholder="Enter Email Address..." value="<?= set_value('Email'); ?>">
                                            <?= form_error('Email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="Password" id="Password" placeholder="Password">
                                            <?= form_error('Password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button type="submit" href="index.html" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('index.php/auth/registration/'); ?>">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</body>

</html>