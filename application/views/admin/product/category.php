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
			<a href="#add_category" data-toggle="modal" class="btn btn-primary btn-sm col-md-3"><i class="fa fa-plus-circle"></i> Add Category</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">List Category</h6>
				</div>
				<div class="table-responsive p-3">
					<table class="table align-items-center table-flush table-hover" style="width: 100%" id="dataTableHover">
						<thead class="thead-light" style="background-color: #0077b6">
							<tr>
								<th>No</th>
								<th>Category</th>
								<th>image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no = 1;
							foreach($category as $value) { ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $value->name_category ?></td>
									<td><img src="<?= base_url('layouts/images/category/' . $value->image) ?>" width="80" alt="Image"></td>
									<td>
										<a href="#edit_category" data-toggle="modal" class="badge bg-primary tombol-edit" data-id="<?= $value->id ?>" data-category="<?= $value->name_category ?>" data-image="<?= $value->image ?>" style="color: #fff" title="Edit"><i class="fa fa-edit"></i> Edit</a> 
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
<div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Add Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Admin/save_category') ?>" method="post" name="add_category" enctype="multipart/form-data">
					<div class="form-group">
						<label>Category</label>
						<input type="text" name="name_category" class="form-control">
					</div>
					<div class="form-group">
						<label>Image</label>
						<input type="file" name="image" class="form-control" accept="image/*" id="imgInp" placeholder="Full Name.">
						<p>maximum size 3MB</p>
						<img id="blah" class="mt-2 mb-3" height="200" width="200" src="#" alt="preview photo" />
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
<div class="modal fade" id="edit_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Edit Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Admin/update_category') ?>" method="post" name="update_category" enctype="multipart/form-data">
					<div class="form-group">
						<label>Category</label>
						<input type="hidden" name="id" id="id">
						<input type="text" name="name_category" class="form-control category-val">
					</div>
					<div class="form-group">
						<label>Image</label>
						<input type="hidden" name="old_image" class="old-image">
						<input type="file" name="image" class="form-control" accept="image/*" id="imgInp2" placeholder="Full Name.">
						<p>maximum size 3MB</p>
						<img class="mt-2 mb-3 preview-old-image" height="200" width="200" src="" alt="old-image" title="foto lama"/>
						<img id="blah2" class="mt-2 mb-3 ml-3" height="200" width="200" src="#" alt="preview new photo" title="foto baru"/>
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
		$(function() {
			$("form[name='add_category']").validate({
				rules: {
					name_category: {
						required: true
					},
					image: {
						required: true
					}
				},
				messages: {
					name_category: {
						required: "category is required (category harus di isi)"
					},
					image: {
						required: "image is required (image harus di isi)"
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
    	});

		$(function() {
			$("form[name='update_category']").validate({
				rules: {
					name_category: {
						required: true
					}
				},
				messages: {
					name_category: {
						required: "category is required (category harus di isi)"
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
    	});

		imgInp.onchange = evt => {
			const [file] = imgInp.files
			if (file) {
				blah.src = URL.createObjectURL(file)
			}
		}

		imgInp2.onchange = evt => {
			const [file] = imgInp2.files
			if (file) {
				blah2.src = URL.createObjectURL(file)
			}
		}

		$(document).on('click', '.tombol-edit', function() {
			let id = $(this).attr('data-id'),
				category = $(this).attr('data-category'),
				image = $(this).attr('data-image');
			
			$('#id').val(id);
			$('.category-val').val(category);
			$('.old-image').val(image);
			$('.preview-old-image').attr("src", "<?= base_url() ?>layouts/images/category/" + image);
		})

		$('.tombol-hapus').on('click', function(e) {
			e.preventDefault();
			const link = $(this).attr('href');

			Swal.fire({
				title: 'Are You Sure ?',
				text: "This category will be deleted!",
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
            text: 'category saved successfully!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'category updated successfully!',
            showConfirmButton: true,
            // timer: 1500
        })

	<?php elseif ($this->session->flashdata('success_delete')) : ?>
		Swal.fire({
			icon: 'success',
			title: 'Success!',
			text: 'category deleted successfully!',
			showConfirmButton: true,
			// timer: 1500
		})

    <?php endif ?>
</script>
