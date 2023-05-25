<!DOCTYPE html>
<html>
	<head>
		<!-- Basic -->
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!-- Site Metas -->
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<link rel="shortcut icon" href="<?= base_url() ?>layouts/pages/images/logo1.png" type="">
		<title>Island Adventure Gear | <?= $title ?></title>
		<!-- bootstrap core css -->
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>layouts/pages/css/bootstrap.css" />
		<!-- font awesome style -->
		<link href="<?= base_url() ?>layouts/pages/css/font-awesome.min.css" rel="stylesheet" />
		<!-- Custom styles for this template -->
		<link href="<?= base_url() ?>layouts/pages/css/style.css" rel="stylesheet" />
		<!-- responsive style -->
		<link href="<?= base_url() ?>layouts/pages/css/responsive.css" rel="stylesheet" />

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	</head>
	<body>
		<div class="hero_area">
			<!-- header section strats -->
			<header class="header_section">
				<div class="container">
				<nav class="navbar navbar-expand-lg custom_nav-container ">
					<a class="navbar-brand" href="<?= base_url('Pages') ?>"><img width="250" src="<?= base_url() ?>layouts/pages/images/logo1.png" alt="#" /></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class=""> </span>
						</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav">
							<li class="nav-item <?php if($title == "Home") {echo "active";} else {echo "";} ?>">
								<a class="nav-link" href="<?= base_url('Pages') ?>">Home <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item <?php if($title == "About Us") {echo "active";} else {echo "";} ?>">
								<a class="nav-link" href="<?= base_url('Pages/about_us') ?>">About Us</a>
							</li>
							<li class="nav-item <?php if($title == "Product") {echo "active";} else {echo "";} ?>">
								<a class="nav-link active" href="<?= base_url('Pages/product') ?>">Product</a>
							</li>
							<li class="nav-item <?php if($title == "Blog") {echo "active";} else {echo "";} ?>">
							<a class="nav-link" href="<?= base_url('Pages/blog') ?>">Blog</a>
							</li>
							<!-- <li class="nav-item">
								<a class="nav-link" href="contact.html">Contact</a>
							</li> -->
							<li class="nav-item <?php if($title == "Cart") {echo "active";} else {echo "";} ?>">
							<?php
								$count_cart = $this->db->from('cart')->count_all_results()
							?>
							<a class="nav-link" href="<?= base_url('Pages/cart') ?>" style="display: inline-block; padding:2px; position:relativ;">
								<i class="fa fa-shopping-cart"></i>
								<?php if($count_cart != 0) { ?>
									<div class="badge badge-primary" style="font-size: 10px; display: block; position: absolute; right:-5px; top:12px"><?= $count_cart ?></div>
								<?php } ?>
							</a>
							</li>
						</ul>
					</div>
				</nav>
				</div>
			</header>
