<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= site_url("vendors/feather/feather.css"); ?>">
  <link rel="stylesheet" href="<?= site_url("vendors/ti-icons/css/themify-icons.css"); ?>">
  <link rel="stylesheet" href="<?= site_url("vendors/css/vendor.bundle.base.css"); ?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?= site_url("template/vendors/codemirror/codemirror.css"); ?>">
  <link rel="stylesheet" href="<?= site_url("template/vendors/codemirror/ambiance.css"); ?>">
  <link rel="stylesheet" href="<?= site_url("template/vendors/pwstabs/jquery.pwstabs.min.css"); ?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= site_url("css/vertical-layout-light/style.css"); ?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= site_url("images/favicon.png"); ?>" />
</head>

<body>
    <div class=" container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="main-panel w-100  documentation">
            <div class="content-wrapper">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 pt-5">
                    <a class="btn btn-primary" href="<?= site_url("index.php/Welcome/backoffice"); ?>"><i class="ti-home mr-2"></i>Back to home</a>
                  </div>
                </div>
                <div class="row pt-5 mt-5">
                  <div class="col-12 pt-5 text-center">
                    <i class="text-primary mdi mdi-file-document-box-multiple-outline display-1"></i>
                    <h3 class="text-primary font-weight-light mt-5">
                      The detailed documentation of Skydash Admin Template is provided at 
                      <a href="http://bootstrapdash.com/demo/skydash/docs/documentation.html" target="_blank" class="text-danger d-block text-truncate">
                        http://bootstrapdash.com/demo/skydash/docs/documentation.html
                      </a>
                    </h3>
                    <h4 class="mt-4 font-weight-light text-primary">
                      In case you want to refer the documentation file, it is available at 
                      <span class="text-danger">/docs/documentation.html</span> 
                      in the downloaded folder
                    </h4>
                  </div>
                </div>
              </div>
            </div>
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
            <!-- partial -->
          </div>
        </div>
      </div>
<!-- plugins:js -->
<script src="<?= site_url("vendors/js/vendor.bundle.base.js"); ?>"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="<?= site_url("js/off-canvas.js"); ?>"></script>
<script src="<?= site_url("js/hoverable-collapse.js"); ?>"></script>
<script src="<?= site_url("js/template.js"); ?>"></script>
<script src="<?= site_url("js/settings.js"); ?>"></script>
<script src="<?= site_url("js/todolist.js"); ?>"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?= site_url("js/codeEditor.js"); ?>"></script>
<script src="<?= site_url("js/tabs.js"); ?>"></script>
<script src="<?= site_url("js/tooltips.js"); ?>"></script>
<script src="<?= site_url("js/documentation.js"); ?>"></script>
<!-- End custom js for this page-->
</body>

</html>