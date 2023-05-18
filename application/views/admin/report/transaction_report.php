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
		<div class="col-lg-12">
			<div class="card mb-3">
				<div class="card-body">
					<form>
						<div class="row">
							<div class="col-md-2">
								<input type="date" id="tglawal" name="start_date" title="start date" value="<?= $start_date ?>" required class="form-control">
							</div>
							<div class="col-md-2">
								<input type="date" id="tglakhir" name="end_date" title="end_date" value="<?= $end_date ?>" required class="form-control">
							</div>
							<button type="submit" class="btn btn-primary button-filter"><i class="fa fa-filter"></i> Filter</button>
							<?php if(empty($start_date) && empty($end_date)) { ?>
								<a href="<?php echo base_url('Admin/print_transactionreport_pdf') ?>" target="_blank" class="btn btn-primary" style="margin-left: 5px;"><i class="fa-solid fa-file-pdf"></i> Cetak PDF</a>
							<?php } else { ?>
								<a href="<?php echo base_url('Admin/print_transactionreport_pdf/?start_date=' . $start_date. '&end_date=' . $end_date) ?>" target="_blank" class="btn btn-primary" style="margin-left: 5px;"><i class="fa-solid fa-file-pdf"></i> Cetak PDF</a>
							<?php } ?>
							<?php if(empty($start_date) && empty($end_date)) { ?>
								<a href="<?php echo base_url('Admin/print_transactionreport_excel') ?>" target="_blank" class="btn btn-primary" style="margin-left: 5px;"><i class="fa-solid fa-file-excel"></i> Cetak Excel</a>
							<?php } else { ?>
								<a href="<?php echo base_url('Admin/print_transactionreport_excel/?start_date=' . $start_date. '&end_date=' . $end_date) ?>" target="_blank" class="btn btn-primary" style="margin-left: 5px;"><i class="fa-solid fa-file-excel"></i> Cetak Excel</a>
							<?php } ?>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">List Transaction</h6>
				</div>
				<div class="table-responsive p-3">
					<table class="table align-items-center table-flush table-hover" style="width: 100%" id="dataTableHover">
						<thead class="thead-light" style="background-color: #0077b6">
							<tr>
								<th>No</th>
								<th>Code</th>
								<th>Customer</th>
								<th>Date</th>
								<th>Total Qty</th>
								<th>Total Transaction</th>
								<th>Discount</th>
								<th>Total Payment</th>
								<th>Payment Methods</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no = 1;
							foreach($transaction as $value) { ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $value->code_trans ?></td>
									<td><?= $value->name_customer ?></td>
									<td><?= date('d-m-Y', strtotime($value->date_trans)) ?></td>
									<td><?= $value->totally_qty ?></td>
									<td><?= 'Rp. '. number_format($value->transaction_total,0,',','.') ?></td>
									<td><?= 'Rp. '. number_format($value->discount,0,',','.') ?></td>
									<td><?= 'Rp. '. number_format($value->totally_payment,0,',','.') ?></td>
									<td><span class="badge bg-primary" style="color: #FFF;"><?= $value->payment_name ?></span></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Transaction Recap</h6>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-2">Transaction Amount</div>
						<div class="col-md-10">: <?= $transaction_amount ?></div>
						<div class="col-md-2 mt-3">Transaction Total</div>
						<div class="col-md-10 mt-3">: <?= 'Rp. '. number_format($transaction_total,0,',','.') ?></div>
						<div class="col-md-2 mt-3">Transaction Discount</div>
						<div class="col-md-10 mt-3">: <?= 'Rp. '. number_format($transaction_discount,0,',','.') ?></div>
						<div class="col-md-2 mt-3">Transaction Payment</div>
						<div class="col-md-10 mt-3">: <?= 'Rp. '. number_format($transaction_payment,0,',','.') ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>		
</div>
<?php $this->load->view('partials/footer.php'); ?>
