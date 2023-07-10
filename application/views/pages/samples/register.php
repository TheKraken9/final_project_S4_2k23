<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= site_url("vendors/feather/feather.css") ?>">
  <link rel="stylesheet" href="<?= site_url("vendors/ti-icons/css/themify-icons.css") ?>">
  <link rel="stylesheet" href="<?= site_url("vendors/css/vendor.bundle.base.css") ?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= site_url("css/vertical-layout-light/style.css") ?>">
    <link rel="stylesheet" href="<?= site_url("css/styles.css"); ?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= site_url("images/favicon.png") ?>" />
    <script src="<?= site_url("js/jquery-3.7.0.js"); ?>"></script>
    <script src="<?= site_url("js/parsley.js"); ?>"></script>
    <style>
        .parsley-error {
            border-color: red !important; /* Couleur de la bordure en rouge */
        }
        .parsley-errors-list {
            font-size: small !important;
            color: red; /* Couleur du texte en rouge */
            margin-top: -1px !important;
        }
    </style>
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?= site_url("images/logo.svg") ?>" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form data-parsley-validate="" id="form" class="pt-3" method="post" action="<?= site_url("index.php/Welcome/submit"); ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="usr" id="exampleInputUsername1" placeholder="Username" data-parsley-length="[5,20]" data-parsley-group="block1" required="">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="mail" id="exampleInputEmail1" placeholder="Email" data-parsley-trigger="change" required="">
                </div>
                <!--<div class="form-group">
                  <select class="form-control form-control-lg" name="country" id="exampleFormControlSelect2" required="">
                    <option value="">Country</option>
                    <option value="1">United States of America</option>
                    <option value="2">United Kingdom</option>
                    <option value="3">India</option>
                    <option value="4">Germany</option>
                    <option value="5">Argentina</option>
                  </select>
                </div>-->
                  <div class="form-group">
                      <input type="tel" name="tel" class="form-control form-control-ld" id="tel" placeholder="phone number" required="">
                  </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="pwd" id="exampleInputPassword1" placeholder="Password" required="" data-parsley-minlength="8" data-parsley-pattern="^(?=.*[A-Za-z])(?=.*[\d\W_])[A-Za-z\d\W_]{8,}$">
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Show password
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN UP">
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="<?= site_url('index.php/Welcome/index') ?>" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= site_url("vendors/js/vendor.bundle.base.js"); ?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= site_url("js/off-canvas.js"); ?>"></script>
  <script src="<?= site_url("js/hoverable-collapse.js"); ?>"></script>
  <script src="<?= site_url("js/template.js"); ?>"></script>
  <script src="<?= site_url("js/settings.js"); ?>"></script>
  <script src="<?= site_url("js/todolist.js"); ?>"></script>
  <!-- endinject -->
<script>
    var checkbox = document.querySelector('.form-check-input');
    var passwordInput = document.getElementById('exampleInputPassword1');
    if (checkbox && passwordInput) {
        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    }

    $(function () {
        $('#form').parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        })
            .on('form:submit', function() {
                return false; // Don't submit form for this demo
            });
    });

</script>
</body>

</html>
