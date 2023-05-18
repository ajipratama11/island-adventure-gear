<?php $this->load->view('partials/header.php'); ?>

<div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-primary fw-bold"><?= $title ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page">Transaction</li>
			<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
		</ol>
	</div>

	<div class="row">
		<div class="col-lg-6 mb-3">
			<a href="<?= base_url('Admin/transaction') ?>" class="btn btn-primary btn-sm col-md-3"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-lg-5">
			<div class="card mb-4">
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
							Code Transaction
						</div>
						<div class="col-md-9">
							: <?= $value->code_trans ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-3">
							Customer Name
						</div>
						<div class="col-md-9">
							: <?= $value->name_customer ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-3">
							Customer Address
						</div>
						<div class="col-md-9">
							: <?= $value->address_customer ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-3">
							Whatsapp
						</div>
						<div class="col-md-9">
							: <?= $value->no_telp_customer ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-3">
							Date Transaction
						</div>
						<div class="col-md-9">
							: <?= date('d-m-Y', strtotime($value->date_trans)) ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-3">
							Totally Qty
						</div>
						<div class="col-md-9">
							: <?= $value->totally_qty ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-3">
							Transaction Total
						</div>
						<div class="col-md-9">
							: <?= 'Rp. '. number_format($value->transaction_total,0,',','.') ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-3">
							Discount
						</div>
						<div class="col-md-9">
							: <?= 'Rp. '. number_format($value->discount,0,',','.') ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-3">
							Totally Payment
						</div>
						<div class="col-md-9">
							: <?= 'Rp. '. number_format($value->totally_payment,0,',','.') ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-3">
							Payment Methods
						</div>
						<div class="col-md-9">
							: <span class="badge bg-primary" style="color: #FFF;"><?= $value->payment_name ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-7">
			<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary"> Product details sold</h6>
				</div>
				<div class="card-body">
					<table class="table align-items-center table-flush table-hover" style="width: 100%" id="dataTableHover">
						<thead class="thead-light" style="background-color: #0077b6">
							<tr>
								<th>Product Name</th>
								<th>Qty</th>
								<th>Price</th>
								<th>Sub Total</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($product_trans as $val) { ?>
								<tr>
									<td><?= $val->product_name ?></td>
									<td><?= $val->qty ?></td>
									<td><?= 'Rp. ' . number_format($val->price,0,',','.') ?></td>
									<td><?= 'Rp. ' . number_format($val->sub_totally,0,',','.') ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('partials/footer.php'); ?>
