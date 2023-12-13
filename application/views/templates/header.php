<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemrograman Web Lanjut</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/dashboard.css">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Pemrograman Web</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="<?= base_url('index.php/auth/logout/'); ?>" data-toggle="modal" data-target="#logoutModal"">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class=" container-fluid">
                    <div class="row">
                        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                            <div class="sidebar-sticky pt-3">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo site_url('home'); ?>">
                                            <span data-feather="home"></span>
                                            Dashboard <span class="sr-only">(current)</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo site_url('opname/index'); ?>">
                                            <span data-feather="file"></span>
                                            Stokopname
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo site_url('opname/stockopnamedetail'); ?>">
                                            <span data-feather="shopping-cart"></span>
                                            Stockopnamedetail
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo site_url('opname/itemqtytransaksiheader'); ?>">
                                            <span data-feather="users"></span>
                                            Itemqtytransaksiheader
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo site_url('opname/itemqtytransaksi'); ?>">
                                            <span data-feather="bar-chart-2"></span>
                                            Itemqtytransaksi
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo site_url('opname/item_master'); ?>">
                                            <span data-feather="layers"></span>
                                            Itemmaster
                                        </a>
                                    </li>
                                </ul>

                                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                    <span>User</span>
                                </h6>
                                <ul class="nav flex-column mb-2">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url('index.php/user/profile'); ?>">
                                            <span data-feather="file-text"></span>
                                            Profile
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url('index.php/user/'); ?>">
                                            <span data-feather="users"></span>
                                            User
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>