<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="<?= base_url() ?>layouts/images/logo1.png" rel="icon">
<title>IAG Admin - Login</title>
<link href="<?= base_url() ?>layouts/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>layouts/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>layouts/admin/css/ruang-admin.min.css" rel="stylesheet">

<style>
	.login-image-center {
		text-align: center;
		margin-bottom: 40px;
	}
</style>
</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  	<div class="container-login">
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-12 col-md-9">
				<div class="card shadow-sm my-5">
					<div class="card-body p-0">
						<div class="row">
							<div class="col-lg-12">
								<div class="login-form">
									<div class="login-image-center">
										<img width="250" src="<?= base_url() ?>layouts/images/logo1.png" alt="#" />
									</div>
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Log in Admin</h1>
									</div>
									<form action="<?= base_url('Auth/login') ?>" method="post" class="user">
										<div class="form-group">
											<input type="email" class="form-control" name="email" id="exampleInputEmail" aria-describedby="emailHelp"
												placeholder="Enter Email Address">
												<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<input type="password" class="form-control password" name="password" id="exampleInputPassword" placeholder="Password">
											<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
												<input type="checkbox" class="custom-control-input form-checkbox" id="customCheck">
												<label class="custom-control-label" for="customCheck">See Password</label>
											</div>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-primary btn-block">Log in</button>
										</div>
										<hr>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  </div>
  <!-- Login Content -->
<script src="<?= base_url() ?>layouts/admin/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>layouts/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>layouts/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url() ?>layouts/admin/js/ruang-admin.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?= base_url() ?>layouts/js/sweetalert2-all.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.form-checkbox').click(function() {
			if ($(this).is(':checked')) {
				$('.password').attr('type', 'text');
			} else {
				$('.password').attr('type', 'password');
			}
		});
	});

	<?php if ($this->session->flashdata('passwordsalah')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Failed!',
            text: 'your password is wrong!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('emailsalah')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Failed!',
            text: 'your email is wrong!',
            showConfirmButton: true,
            // timer: 1500
        })

	<?php elseif ($this->session->flashdata('logout')) : ?>
		Swal.fire({
			icon: 'success',
			title: 'Succcess!',
			text: 'you have successfully log out!',
			showConfirmButton: true,
			// timer: 1500
		})

	<?php elseif ($this->session->flashdata('login_dulu')) : ?>
		Swal.fire({
			icon: 'warning',
			title: 'Notes!',
			text: 'your session has expired, please log in again!',
			showConfirmButton: true,
			// timer: 1500
		})
    <?php endif ?>
</script>
</body>

</html>
