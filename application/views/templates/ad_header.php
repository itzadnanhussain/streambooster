<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo (isset($title)) ? $title : 'Title Missing' ?></title>
  <!-- base:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/') ?>vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/') ?>vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/') ?>css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/') ?>vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/') ?>vendors/jquery-toast-plugin/jquery.toast.min.css">

  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/admin/') ?>images/favicon.png" />


  <script src="<?php echo base_url('assets/admin/') ?>vendors/base/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url('assets/admin/') ?>vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?php echo base_url('assets/admin/') ?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- include summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body class="sidebar-fixed">
  <div class="container-scroller">
    <!--Top Navigation Bar -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-left navbar-brand-wrapper d-flex align-items-center justify-content-between">
        <a class="navbar-brand brand-logo" href="Javascript:void(0)">Streambooster</a>
        <a class="navbar-brand brand-logo-mini" href="Javascript:void(0)">SB</a>
        <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
            <a class="dropdown-toggle btn btn-outline-secondary btn-fw" href="#" data-toggle="dropdown" id="pagesDropdown">
              <span class="nav-profile-name">Pages</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="pagesDropdown">
              <a class="dropdown-item" href="<?php echo base_url() ?>">
                <i class="mdi mdi-home text-primary"></i>
                Go To Home
              </a>
              <a class="dropdown-item" href="<?php echo base_url('logout') ?>">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link d-flex">
              <div class="profile-image">
                <img src="<?php echo base_url('assets/admin/images/admin.png') ?>" alt="image">
              </div>
              <div class="profile-name">
                <p class="name">
                  <?php echo (isset($_SESSION['username']) ? $_SESSION['username'] : '') ?>
                </p>
                <p class="designation">
                  Admin
                </p>
              </div>
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('en/admin/dashboard') ?>">
              <i class="mdi mdi-shield-check menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('en/admin/statistics') ?>">
              <i class="mdi mdi-barcode-scan menu-icon"></i>
              <span class="menu-title">Statistics</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('en/admin/streamer') ?>">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">Streamers</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('en/admin/users') ?>">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">Manage Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('en/admin/posts') ?>">
              <i class="mdi mdi-barcode-scan menu-icon"></i>
              <span class="menu-title">Posts</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('en/admin/setcoins') ?>">
              <i class="mdi mdi-monitor-dashboard menu-icon"></i>
              <span class="menu-title">Set Coins</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('en/admin/videoads') ?>">
              <i class="mdi mdi-monitor-dashboard menu-icon"></i>
              <span class="menu-title">Video Ads</span>
            </a>
          </li>

          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">Streamers</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/accordions.html">Accordions</a></li>
              </ul>
            </div>
          </li> -->
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">