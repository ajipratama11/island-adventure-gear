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
			<a href="<?= base_url('Admin/add_product') ?>" class="btn btn-primary btn-sm col-md-3"><i class="fa fa-plus-circle"></i> Add Product</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">List Product</h6>
				</div>
				<div class="table-responsive p-3">
					<table class="table align-items-center table-flush table-hover" id="dataTableHover">
						<thead class="thead-light" style="background-color: #0077b6">
							<tr>
								<th>No</th>
								<th>Code</th>
								<th>Product Name</th>
								<th>Stock</th>
								<th>Price</th>
								<th>Category</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no = 1;
							foreach($product as $value) { ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $value->product_code ?></td>
									<td><?= $value->product_name ?></td>
									<td><?= $value->stock ?></td>
									<td><?= 'Rp. '. number_format($value->nominal,2,',','.') ?></td>
									<td><?= $value->name_category ?></td>
									<td><img src="<?= base_url('layouts/images/product/' . $value->image) ?>" width="70"></td>
									<td>
										<a href="" data-toggle="modal" class="badge bg-primary tombol-edit" style="color: #fff" title="Edit"><i class="fa fa-edit"></i> Edit</a> 
										<a href="<?= base_url('Admin/delete_category/' . $value->id) ?>" class="badge bg-danger tombol-hapus" style="color: #fff" title="delete"><i class="fa fa-trash"></i> Delete</a>
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
	<?php if ($this->session->flashdata('success_insert')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'balance mutation saved successfully!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('failed_same')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Notes!',
            text: 'payments from and payments to cannot be the same!',
            showConfirmButton: true,
            // timer: 1500
        })

	<?php elseif ($this->session->flashdata('failed_balance')) : ?>
		Swal.fire({
			icon: 'warning',
			title: 'Notes!',
			text: 'balance mutation failed due to insufficient balance!',
			showConfirmButton: true,
			// timer: 1500
		})

    <?php endif ?>	
</script>
