<?php $this->load->view('partials/header.php'); ?>

<div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-primary fw-bold"><?= $title ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page">Product Photo</li>
			<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
		</ol>
	</div>
	<div class="row">
		<div class="col-lg-6 mb-3">
			<a href="#add_productPhoto" data-toggle="modal" class="btn btn-primary btn-sm col-md-4"><i class="fa fa-plus-circle"></i> Add Product Photo</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">List Product Photo</h6>
				</div>
				<div class="table-responsive p-3">
					<table class="table align-items-center table-flush table-hover" id="dataTableHover">
						<thead class="thead-light" style="background-color: #0077b6">
							<tr>
								<th>No</th>
								<th>Product Name</th>
								<th>Photo</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no = 1;
							foreach($photo as $value) { ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $value->product_name ?></td>
									<td><img src="<?= base_url('layouts/images/product_photo/' . $value->photo) ?>" width="70"></td>
									<td>
										<a href="#view_photo" data-toggle="modal" class="badge bg-success tombol-photo" style="color: #fff" data-photo="<?= $value->photo ?>" title="see photo"><i class="fa fa-eye"></i></a> 
										<a href="#edit_productPhoto" data-toggle="modal" class="badge bg-primary tombol-edit" style="color: #fff" data-id="<?= $value->id ?>" data-product_id="<?= $value->product_id ?>" data-photo="<?= $value->photo ?>" title="Edit"><i class="fa fa-edit"></i></a> 
										<a href="<?= base_url('Admin/delete_productPhoto/' . $value->id) ?>" class="badge bg-danger tombol-hapus" style="color: #fff" title="delete"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="add_productPhoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Product Photo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Admin/save_productPhoto') ?>" method="post" name="add_product_photo" enctype="multipart/form-data">
					<div class="form-group">
						<label for="exampleInputEmail1">Product</label>
						<select id="product_id" class="form-control" style="width: 100%" name="product_id">
							<option></option>
							<?php foreach($product as $value) { ?>
								<option value="<?= $value->id ?>"><?= $value->product_name ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Photo</label>
						<input type="file" name="photo" class="form-control" accept="image/*" id="imgInp" placeholder="Full Name.">
						<p>maximum size 3MB</p>
						<img id="blah" class="mt-2 mb-3" height="200" width="200" src="#" alt="preview photo" />
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
<div class="modal fade" id="view_photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Product Photo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<img src="" class="product-photo" style="margin-left: 15%" height="500" width="500" alt="">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="edit_productPhoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Product Photo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Admin/update_productPhoto') ?>" method="post" name="update_product_photo" enctype="multipart/form-data">
					<div class="form-group">
						<label for="exampleInputEmail1">Product</label>
						<input type="hidden" name="id" id="id">
						<select id="product_id" class="form-control product-id" style="width: 100%" name="product_id">
							<option></option>
							<?php foreach($product as $value) { ?>
								<option value="<?= $value->id ?>"><?= $value->product_name ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Photo</label>
						<input type="hidden" name="old_photo" class="photoo">
						<input type="file" name="photo" class="form-control" accept="image/*" id="imgInp2" placeholder="Full Name.">
						<p>maximum size 3MB</p>
						<img id="old_photo" class="mt-2 mb-3 old-photo" height="200" width="200" src="#" alt="old photo" title="old photo"/>
						<img id="blah2" class="mt-2 mb-3" height="200" width="200" src="#" title="new photo" alt="preview new photo" />
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
		$('#product_id').select2({
			placeholder: 'Choose Product',
		});

		imgInp2.onchange = evt => {
			const [file] = imgInp2.files
			if (file) {
				blah2.src = URL.createObjectURL(file)
			}
		}

		$(document).on('click', '.tombol-photo', function() {
			let photo = $(this).attr('data-photo');
			$('.product-photo').attr("src", "<?= base_url() ?>layouts/images/product_photo/" + photo)
		})

		$(document).on('click', '.tombol-edit', function() {
			let id = $(this).attr('data-id'),
				product_id = $(this).attr('data-product_id'),
				photo = $(this).attr('data-photo');
			$('#id').val(id);
			$('.product-id').val(product_id);
			$('.photoo').val(photo);
			$('.old-photo').attr('src', "<?= base_url() ?>layouts/images/product_photo/" + photo);
		})

		$(function() {
			$("form[name='add_product_photo']").validate({
				rules: {
					product_id: {
						required: true
					},
					photo: {
						required: true
					}
				},
				messages: {
					product_id: {
						required: "product is required (product harus di isi)"
					},
					photo: {
						required: "photo is required (photo harus di isi)"
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
    	});

		$(function() {
			$("form[name='update_product_photo']").validate({
				rules: {
					product_id: {
						required: true
					},
					photo: {
						required: true
					}
				},
				messages: {
					product_id: {
						required: "product is required (product harus di isi)"
					},
					photo: {
						required: "photo is required (photo harus di isi)"
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
    	});

		$(document).on('click', '.tombol-stok', function(){
			let id = $(this).attr('data-id');
			$('#id').val(id);
		})


		$('.tombol-hapus').on('click', function(e) {
			e.preventDefault();
			const link = $(this).attr('href');

			Swal.fire({
				title: 'Are You Sure ?',
				text: "This product photo will be deleted!",
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
            text: 'product photo saved successfully!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'product photo updated successfully!',
            showConfirmButton: true,
            // timer: 1500
        })

	<?php elseif ($this->session->flashdata('success_delete')) : ?>
		Swal.fire({
			icon: 'success',
			title: 'Success!',
			text: 'product photo deleted successfully!',
			showConfirmButton: true,
			// timer: 1500
		})

    <?php endif ?>	
</script>
