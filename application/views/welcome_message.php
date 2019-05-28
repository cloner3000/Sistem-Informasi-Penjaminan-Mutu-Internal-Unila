<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login | E-LP3M Unila</title>
    <meta name="description" content="Sistem Penjaminan Mutu Internal Unila">
    <meta name="keywords" content="Audit, Audit Internal, SPMI, Unila, ilmu Komputer">
    <meta name="author" content="Adji Pangestu">

    <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/unila.png");?>">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo base_url("node_modules/bootstrap-social/bootstrap-social.css");?>">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/login/css/style.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/login/css/components.css");?>">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <img src="<?php echo base_url("assets/img/unila.png");?>" alt="logo" width="100" class="mb-5 mt-2">
                        <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">E-LP3M</span></h4>
                        <p class="text-muted">Sistem Penjaminan Mutu Internal</p>
                        <form raction="<?php echo base_url('auth/login');?>" method="post" role="login" class="needs-validation" novalidate="">
                            <div id="myalert">
                                <?php echo $this->session->flashdata('alert', true)?>
                            </div>
                            <div class="form-group">
                                <label for="email">Username</label>
                                <input  class="form-control" type="text" name="username" tabindex="1" autocomplete="off" required autofocus>
                                <div class="invalid-feedback">
                                Please fill in your email
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                                </div>
                                <input type="password" class="form-control" name="password" tabindex="2" autocomplete="off" required>
                                <div class="invalid-feedback">
                                please fill in your password
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <a href="https://e-lp3m.unila.ac.id/forgotpassword" class="float-left mt-3">
                                    Forgot Password?
                                </a>
                                <button name="submit" type="submit" value="login" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-5 text-small">
                        Copyright 2019 &copy; LP3M Unila. develop by <a href="#">A. Pangestu</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?php echo base_url("assets/login/img/rektorat.jpg");?>">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                            <?php
                                // 24-hour format of an hour without leading zeros (0 through 23)
                                $Hour = date('G');

                                if ( $Hour >= 5 && $Hour <= 11 ) {
                                    echo '<h1 class="mb-2 display-4 font-weight-bold">Selamat Pagi</h1>';
                                } else if ( $Hour >= 12 && $Hour <= 18 ) {
                                    echo '<h1 class="mb-2 display-4 font-weight-bold">Selamat Siang</h1>';
                                } else if ( $Hour >= 19 || $Hour <= 4 ) {
                                    echo  '<h1 class="mb-2 display-4 font-weight-bold">Selamat Malam</h1>';
                                }
                                ?>
                                <h3 class="mb-2 display-6 font-weight-bold"><?php echo longdate_indo(date("Y-m-d"))?></h3>
                                <h5 class="font-weight-normal text-muted-transparent">Lembaga Pengembangan Pembelajaran dan Penjaminan Mutu (LP3M)</h5>
                                <a class="text-light bb" target="_blank" href="http://www.unila.ac.id/">Universitas Lampung</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?php echo base_url("assets/login/js/stisla.js");?>"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<?php echo base_url("assets/login/js/scripts.js");?>"></script>
    <script src="<?php echo base_url("assets/login/js/custom.js");?>"></script>

    <!-- Page Specific JS File -->
    <script>
        $('#myalert').delay('slow').slideDown('slow').delay(4100).slideUp(600);
    </script>
</body>
</html>
