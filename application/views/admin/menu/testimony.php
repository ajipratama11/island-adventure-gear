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
			<a href="#add_testimony" data-toggle="modal" class="btn btn-primary btn-sm col-md-3"><i class="fa fa-plus-circle"></i> Add Testimony</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">List Testimony</h6>
				</div>
				<div class="table-responsive p-3">
					<table class="table align-items-center table-flush table-hover" style="width: 100%" id="dataTableHover">
						<thead class="thead-light" style="background-color: #0077b6">
							<tr>
								<th width="5%">No</th>
								<th width="20%">Customer Name</th>
								<th width="45%">Text Testimony</th>
								<th width="20%">Image</th>
								<th width="10%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no = 1;
							foreach($testimony as $value) { ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $value->customer ?></td>
									<td><?= $value->content_testimony ?></td>
									<td>
										<?php if(empty($value->image)) { ?>
											<img src="<?= base_url('layouts/images/testimony/user.png') ?>" width="70">
										<?php } else { ?>
											<img src="<?= base_url('layouts/images/testimony/' . $value->image) ?>" width="70">
										<?php } ?>
									</td>
									<td>
										<a href="#edit_testimony<?= $value->id ?>" data-toggle="modal" class="badge bg-primary tombol-edit" style="color: #fff" title="Edit"><i class="fa fa-edit"></i></a> 
										<a href="<?= base_url('Admin/delete_testimony/' . $value->id) ?>" class="badge bg-danger tombol-hapus" style="color: #fff" title="delete"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="add_testimony" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Testimony</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Admin/save_testimony') ?>" method="post" name="add_testimony">
					<div class="form-group">
						<label for="exampleInputEmail1">Customer Name</label>
						<select id="customer_name" class="form-control category-id" style="width: 100%" name="customer">
							<option></option>
							<?php foreach($customer as $value) { ?>
								<option value="<?= $value->name_customer ?>"><?= $value->name_customer ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Testimony Text</label>
						<textarea name="content_testimony" class="form-control" id="" cols="50" rows="4"></textarea>
					</div>
					<div class="form-group">
						<label>Image (can be empty (Boleh tidak diisi))</label>
						<input type="hidden" name="old_image" class="old-image">
						<input type="file" name="image" class="form-control" accept="image/*" id="imgInp" placeholder="Full Name.">
						<p>maximum size 3MB</p>
						<img id="blah" class="mt-2 mb-3 ml-3" height="200" width="200" src="#" alt="preview new photo" title="foto baru"/>
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
<?php foreach($testimony as $edit) { ?>
	<div class="modal fade" id="edit_testimony<?= $edit->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Testimony</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('Admin/update_testimony') ?>" method="post" name="edit_testimony">
						<div class="form-group">
							<label for="exampleInputEmail1">Customer Name</label>
							<input type="hidden" name="id" value="<?= $edit->id ?>">
							<select id="customer_name2" class="form-control category-id" style="width: 100%" name="customer">
								<option></option>
								<?php foreach($customer as $value) { ?>
									<option <?php if ($edit->customer == $value->name_customer) {
												echo "selected=\"selected\"";
											} ?> value="<?= $value->name_customer ?>"><?= $value->name_customer ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Testimony Text</label>
							<textarea name="content_testimony" class="form-control" id="" cols="50" rows="4"><?= $edit->content_testimony ?></textarea>
						</div>
						<div class="form-group">
							<label>Image (can be empty (Boleh tidak diisi))</label>
							<input type="hidden" name="old_image" value="<?= $edit->image ?>" class="old-image">
							<input type="file" name="image" class="form-control" accept="image/*" id="imgInp" placeholder="Full Name.">
							<p>maximum size 3MB</p>
							<img id="blah" class="mt-2 mb-3 ml-3" height="200" width="200" src="#" alt="preview new photo" title="foto baru"/>
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
<?php } ?>
<?php $this->load->view('partials/footer.php'); ?>
<script>
	$(document).ready(function() {

		$('#customer_name').select2({
            placeholder: 'Choose Customer',
        });

		$('#customer_name2').select2({
            placeholder: 'Choose Customer',
        });

		$(function() {
			$("form[name='add_testimony']").validate({
				rules: {
					customer: {
						required: true
					},
					content_testimony: {
						required: true
					}
				},
				messages: {
					customer: {
						required: "customer name is required (customer name harus di isi)"
					},
					content_testimony: {
						required: "testimony text is required (testimony text harus di isi)"
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
    	});

		$(function() {
			$("form[name='edit_testimony']").validate({
				rules: {
					customer: {
						required: true
					},
					content_testimony: {
						required: true
					}
				},
				messages: {
					customer: {
						required: "customer name is required (customer name harus di isi)"
					},
					content_testimony: {
						required: "testimony text is required (testimony text harus di isi)"
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
				text: "This testimony will be deleted!",
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
            text: 'testimony saved successfully!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'testimony updated successfully!',
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
			text: 'testimony deleted successfully!',
			showConfirmButton: true,
			// timer: 1500
		})

    <?php endif ?>	
</script>
