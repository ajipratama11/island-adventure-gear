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
					<table class="table align-items-center table-flush table-hover" style="width: 100%" id="dataTableHover">
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
									<td><?= 'Rp. '. number_format($value->price,0,',','.') ?></td>
									<td><?= $value->name_category ?></td>
									<td><img src="<?= base_url('layouts/images/product/' . $value->image) ?>" width="70"></td>
									<td>
										<a href="<?= base_url('Admin/detail_product/' . $value->slug) ?>" class="badge bg-success" style="color: #fff" title="detail product"><i class="fa fa-eye"></i></a> 
										<a href="#add_stock" data-toggle="modal" data-id="<?= $value->id ?>" class="badge bg-info tombol-stok" style="color: #fff" title="add stock"><i class="fa fa-plus-circle"></i></a> 
										<a href="<?= base_url('Admin/edit_product/' . $value->slug) ?>" class="badge bg-primary tombol-edit" style="color: #fff" title="Edit"><i class="fa fa-edit"></i></a> 
										<a href="<?= base_url('Admin/delete_product/' . $value->id) ?>" class="badge bg-danger tombol-hapus" style="color: #fff" title="delete"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="add_stock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Stock</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Admin/add_stock') ?>" method="post" name="add_stock">
					<div class="form-group">
						<label for="exampleInputEmail1">Additional Stock</label>
						<input type="hidden" id="id" name="id">
						<input type="number" class="form-control" name="stock" id="stock" placeholder="">
					</div>
					<hr>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer.php'); ?>
<script>
	$(document).ready(function() {
		$(document).on('click', '.tombol-stok', function(){
			let id = $(this).attr('data-id');
			$('#id').val(id);
		})

		$(function() {
			$("form[name='add_stock']").validate({
				rules: {
					stock: {
						required: true
					}
				},
				messages: {
					stock: {
						required: "stock is required (stock harus di isi)"
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
    	});

		$('.tombol-hapus').on('click', function(e) {
			e.preventDefault();
			const link = $(this).attr('href');

			Swal.fire({
				title: 'Are You Sure ?',
				text: "This product will be deleted!",
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
            text: 'product saved successfully!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'product updated successfully!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('success_addition_stock')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'stock added successfully!',
            showConfirmButton: true,
            // timer: 1500
        })

	<?php elseif ($this->session->flashdata('success_delete')) : ?>
		Swal.fire({
			icon: 'success',
			title: 'Success!',
			text: 'product deleted successfully!',
			showConfirmButton: true,
			// timer: 1500
		})

    <?php endif ?>	
</script>
