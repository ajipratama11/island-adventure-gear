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
			<a href="<?= base_url('Admin/add_transaction') ?>" class="btn btn-primary btn-sm col-md-3"><i class="fa fa-plus-circle"></i> Add Transaction</a>
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
								<th>Action</th>
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
									<td>
										<a href="<?= base_url('Admin/detail_transaction/' . $value->code_trans) ?>" class="badge bg-success" style="color: #fff" title="detail transaction"><i class="fa fa-eye"></i></a> 
										<?php date_default_timezone_set('Asia/Jakarta');
										$date_now = date('Y-m-d');
										if($value->date_trans == $date_now) { ?>
											<a href="<?= base_url('Admin/print_invoice/' . $value->code_trans) ?>" class="badge bg-primary" style="color: #fff" title="print invoice"><i class="fa fa-file-invoice"></i></a> 
											<a href="<?= base_url('Admin/delete_transaction/' . $value->id) ?>" class="badge bg-danger tombol-hapus" style="color: #fff" title="delete"><i class="fa fa-trash"></i></a>
										<?php } ?>
									</td>
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
<script>
	$(document).ready(function() {


		$('.tombol-hapus').on('click', function(e) {
			e.preventDefault();
			const link = $(this).attr('href');

			Swal.fire({
				title: 'Are You Sure ?',
				text: "This transaction will be deleted!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#898989',
				confirmButtonText: 'Delete!'
			}).then((result) => {
				if (result.isConfirmed) {
					document.location.href = link;
				}
			})

    	})
	})

	<?php if ($this->session->flashdata('success_insert')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Transaction saved successfully!',
            showConfirmButton: true,
            // timer: 1500
        })

	<?php elseif ($this->session->flashdata('success_delete')) : ?>
		Swal.fire({
			icon: 'success',
			title: 'Success!',
			text: 'Transaction deleted successfully!',
			showConfirmButton: true,
			// timer: 1500
		})

    <?php endif ?>	
</script>
