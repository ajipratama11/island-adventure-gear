<?php $this->load->view('partials/header.php'); ?>

<div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-primary fw-bold"><?= $title ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page">Product</li>
			<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
		</ol>
	</div>

	<div class="row">
		<div class="col-lg-6 mb-3">
			<a href="<?= base_url('Admin/product') ?>" class="btn btn-primary btn-sm col-md-3"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<div class="card mb-4">
				<div class="card-body">
					<h6>Image Product</h6>
					<img src="<?= base_url('layouts/images/product/' . $value->image) ?>" alt="" width="300">
				</div>
			</div>
		</div>
		<div class="col-lg-8">
		<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Detail Product</h6>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
							Name Product
						</div>
						<div class="col-md-9">
							: <?= $value->product_name ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-3">
							Stock
						</div>
						<div class="col-md-9">
							: <?= $value->stock ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-3">
							Price
						</div>
						<div class="col-md-9">
							: <?= 'Rp. '. number_format($value->price,2,',','.') ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-3">
							Categori
						</div>
						<div class="col-md-9">
							: <?= $value->name_category ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-3">
							Sub Category
						</div>
						<div class="col-md-9">
							: <?php if(empty($value->subcategory_id)) {
								echo '-';
							} else {
								echo $value->name_subcategory;
							} ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-3">
							Sold
						</div>
						<div class="col-md-9">
							: <?= $value->sold ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-3">
							Description
						</div>
						<div class="col-md-9">
							<div class="card" style="border: solid 1px; padding: 5px;">
								<?= $value->description ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<?php $this->load->view('partials/footer.php'); ?>
