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
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/login/css/style.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/login/css/components.css");?>">
</head>

<body>
    <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?php echo base_url("assets/img/unila.png");?>" alt="logo" width="100" class="shadow-light">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Forgot Password</h4></div>

              <div class="card-body">
                <p class="text-muted">You need to contact our administrator or Visit LP3M to recover your password!</p>
                <p class="text-muted">e-mail: lp3m@kpa.unila.ac.id</p>
                <div class="row">
                    <div class="col-12">
                        <a href="https://e-lp3m.unila.ac.id/"> <button type="submit" class="btn btn-primary" tabindex="4">
                            Back
                        </button></a>
                       <a href="http://lp3m.unila.ac.id/" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i> Contact</a>
                    </div>
                </div>
                
                
              </div>
            </div>
            <div class="simple-footer">
               Copyright 2019 &copy; LP3M Unila. develop by <a href="#">A. Pangestu</a>
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
</body>
</html>
