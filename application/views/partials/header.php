<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?= base_url() ?>layouts/images/logo1.png" rel="icon">
  <title>IAG Admin | <?= $title ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href="<?= base_url() ?>layouts/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>layouts/admin/css/ruang-admin.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>layouts/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>layouts/js/summernote/summernote.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<style>
	form .error {
        color: red;
        font-size: 15px;
        width: 100%;
    }

		.select2-selection__rendered {
        line-height: 40px !important;
    }

    .select2-container .select2-selection--single {
        height: 40px !important;
    }

    .select2-selection__arrow {
        height: 40px !important;
    }
</style>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="<?= base_url() ?>layouts/admin/img/logo/logo1.png">
        </div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item <?php if($title == 'Dashboard') {echo 'active';} else {echo '';} ?>">
        <a class="nav-link" href="<?= base_url('Admin') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Transaction
      </div>
      <li class="nav-item <?php if(($title == 'Transaction') || ($title == 'Add Transaction') || ($title == 'Detail Transaction')) {echo 'active';} else {echo '';} ?>">
        <a class="nav-link" href="<?= base_url('Admin/transaction') ?>">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Transaction</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Product
      </div>
	  <li class="nav-item <?php if(($title == 'Product') || ($title == 'Product Photo') ||  ($title == 'Add Product') ||  ($title == 'Detail Product') ||  ($title == 'Edit Product')) {echo 'active';} else {echo '';} ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true"
          aria-controls="collapseProduct">
          <i class="fas fa-fw fa-cube"></i>
          <span>Product</span>
        </a>
        <div id="collapseProduct" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Example Pages</h6> -->
            <a class="collapse-item" href="<?= base_url('Admin/product') ?>">Product</a>
            <a class="collapse-item" href="<?= base_url('Admin/product_photo') ?>">Product Photo</a>
          </div>
        </div>
      </li>
      <li class="nav-item <?php if(($title == 'Category') || ($title == 'Sub Category')) {echo 'active';} else {echo '';} ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-list-alt"></i>
          <span>Category</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Example Pages</h6> -->
            <a class="collapse-item" href="<?= base_url('Admin/category') ?>">Category</a>
            <a class="collapse-item" href="<?= base_url('Admin/sub_category') ?>">Sub Category</a>
          </div>
        </div>
      </li>
	  <hr class="sidebar-divider">
	  <div class="sidebar-heading">
        Finance
      </div>
      <li class="nav-item <?php if($title == 'Payment Methods') {echo 'active';} else {echo '';} ?>">
        <a class="nav-link" href="<?= base_url('Admin/payment_methods') ?>">
          <i class="fa fa-fw fa-money-bill"></i>
          <span>Payment Methods</span>
        </a>
      </li>
      <li class="nav-item <?php if($title == 'Mutation Balance') {echo 'active';} else {echo '';} ?>">
        <a class="nav-link" href="<?= base_url('Admin/mutation_balance') ?>">
          <i class="fa fa-fw fa-money-bill-transfer"></i>
          <span>Mutation Balance</span>
        </a>
      </li>
	  <hr class="sidebar-divider">
	  <div class="sidebar-heading">
        Report
      </div>
	  <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport" aria-expanded="true"
          aria-controls="collapseReport">
          <i class="fas fa-fw fa-book"></i>
          <span>Report</span>
        </a>
        <div id="collapseReport" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="login.html">Monthly Report</a>
            <a class="collapse-item" href="register.html">Annual Report</a>
          </div>
        </div>
      </li> -->
	  <li class="nav-item">
        <a class="nav-link <?php if($title == 'Transaction Report') {echo 'active';} else {echo '';} ?>" href="<?= base_url('Admin/transaction_report') ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Transaction Report</span>
        </a>
      </li>
      <hr class="sidebar-divider">
	  <div class="sidebar-heading">
        Other
      </div>
	  <li class="nav-item">
        <a class="nav-link <?php if(($title == 'Article') || ($title == 'Edit Article')) {echo 'active';} else {echo '';} ?>" href="<?= base_url('Admin/article') ?>">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Article</span>
        </a>
      </li>
	  <li class="nav-item">
        <a class="nav-link <?php if($title == 'Testimony') {echo 'active';} else {echo '';} ?>" href="<?= base_url('Admin/testimony') ?>">
					<i class="fa-solid fa-quote-left"></i>
          <span>Testimony</span>
        </a>
      </li>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li> -->
            <!-- <div class="topbar-divider d-none d-sm-block"></div> -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="<?= base_url('layouts/images/photo/' . $this->session->userdata('picture')) ?>" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?= $this->session->userdata('email') ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('admin/profile') ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>

		 <!-- Modal Logout -->
		 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Are you Sure!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                  <a href="<?= base_url('Auth/logout') ?>" class="btn btn-primary"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
              </div>
            </div>
          </div>

