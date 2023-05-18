<?php $this->load->view('partials/header.php'); ?>

<div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-primary fw-bold"><?= $title ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page">Category</li>
			<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
		</ol>
	</div>
	<div class="row">
		<div class="col-lg-6 mb-3">
			<a href="#add_subcategory" data-toggle="modal" class="btn btn-primary btn-sm col-md-3"><i class="fa fa-plus-circle"></i> Add Sub Category</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">List Sub Category</h6>
				</div>
				<div class="table-responsive p-3">
					<table class="table align-items-center table-flush table-hover" style="width: 100%" id="dataTableHover">
						<thead class="thead-light" style="background-color: #0077b6">
							<tr>
								<th>No</th>
								<th>Category</th>
								<th>Sub Category</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no = 1;
							foreach($sub_category as $value) { ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $value->name_category ?></td>
									<td><?= $value->name_subcategory ?></td>
									<td>
										<a href="#edit_subcategory" data-toggle="modal" class="badge bg-primary tombol-edit" data-id="<?= $value->id ?>" data-category_id="<?= $value->category_id ?>" data-name_subcategory="<?= $value->name_subcategory ?>" style="color: #fff" title="Edit"><i class="fa fa-edit"></i> Edit</a>
										<a href="<?= base_url('Admin/delete_subCategory/' . $value->id) ?>" class="badge bg-danger tombol-hapus" style="color: #fff" title="delete"><i class="fa fa-trash"></i> Delete</a>
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
<div class="modal fade" id="add_subcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Add Sub Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Admin/save_subCategory') ?>" method="post" name="add_subcategory">
					<div class="form-group">
						<label>Category</label>
						<select id="category_id" class="form-control" style="width: 100%" name="category_id">
							<option></option>
							<?php foreach($category as $value) { ?>
								<option value="<?= $value->id ?>"><?= $value->name_category ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Sub Category</label>
						<input type="text" name="name_subcategory" class="form-control">
					</div>
					<hr>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="edit_subcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Edit Sub Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Admin/update_subCategory') ?>" method="post" name="edit_subcategory">
					<div class="form-group">
						<label>Category</label>
						<input type="hidden" name="id" id="id">
						<select id="category_id" class="form-control category-id" style="width: 100%" name="category_id">
							<option></option>
							<?php foreach($category as $value) { ?>
								<option value="<?= $value->id ?>"><?= $value->name_category ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Sub Category</label>
						<input type="text" name="name_subcategory" class="form-control name-subcategory">
					</div>
					<hr>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer.php'); ?>
<script>
	$(document).ready(function() {

   		$('#category_id').select2({
            placeholder: 'Choose Category',
        });

		$(function() {
			$("form[name='add_subcategory']").validate({
				rules: {
					category_id: {
						required: true
					},
					name_subcategory: {
						required: true
					}
				},
				messages: {
					category_id: {
						required: "category is required (category harus di isi)"
					},
					name_subcategory: {
						required: "sub category is required (sub category harus di isi)"
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
    	});

		$(function() {
			$("form[name='edit_subcategory']").validate({
				rules: {
					category_id: {
						required: true
					},
					name_subcategory: {
						required: true
					}
				},
				messages: {
					category_id: {
						required: "category is required (category harus di isi)"
					},
					name_subcategory: {
						required: "sub category is required (sub category harus di isi)"
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
    	});

		$(document).on('click', '.tombol-edit', function() {
			let id = $(this).attr('data-id'),
				category_id = $(this).attr('data-category_id'),
				name_subcategory = $(this).attr('data-name_subcategory');

			$('#id').val(id);
			$('.category-id').val(category_id);
			$('.name-subcategory').val(name_subcategory);
		})

		$('.tombol-hapus').on('click', function(e) {
			e.preventDefault();
			const link = $(this).attr('href');

			Swal.fire({
				title: 'Are You Sure ?',
				text: "This sub category will be deleted!",
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
            text: 'sub category saved successfully!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'sub category updated successfully!',
            showConfirmButton: true,
            // timer: 1500
        })

	<?php elseif ($this->session->flashdata('success_delete')) : ?>
		Swal.fire({
			icon: 'success',
			title: 'Success!',
			text: 'sub category deleted successfully!',
			showConfirmButton: true,
			// timer: 1500
		})

    <?php endif ?>
</script>
