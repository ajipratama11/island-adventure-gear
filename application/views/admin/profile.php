<?php $this->load->view('partials/header.php'); ?>

<div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-primary fw-bold"><?= $title ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
		</ol>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h5>Data Profile</h5>
				</div>
				<div class="card-body row">
					<div class="col-md-5">
						<p>Photo Profile Admin</p>
						<?php if(empty($value->picture)) { ?>
							<img src="<?= base_url() ?>layouts/images/user.png" height="200" width="200" class="rounded-circle" /> 
						<?php } else { ?>
							<img src="<?= base_url('layouts/images/photo/' . $value->picture) ?>" height="200" width="200" class="rounded-circle" /> 
						<?php } ?>
						<a href="#uploadFoto" data-toggle="modal" class="btn btn-primary btn-sm mt-3"><i class="fa fa-upload"></i> Upload Photo</a>
					</div>
					<div class="col-md-7">
						<div class="keterangan-admin" style="margin-top: 35px;">
							<div class="row">
								<div class="col-sm-4">Name</div>
								<div class="col-sm-8">: <?= $value->full_name ?></div>
							</div>
							<div class="row">
								<div class="col-sm-4">Address</div>
								<div class="col-sm-8">: <?= $value->address ?></div>
							</div>
							<div class="row">
								<div class="col-sm-4">Email</div>
								<div class="col-sm-8">: <?= $value->email ?></div>
							</div>
							<hr>
							<button type="button" class="btn btn-primary btn-sm mt-3 tombol-edit"><i class="fa fa-edit"></i> Edit Profile</button>
							<a href="#changePassword" data-toggle="modal" class="btn btn-success btn-sm mt-3"><i class="fa fa-lock"></i> Change Password</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-change-profile card">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h5>Form Change Profile</h5>
					<span class="tutup-form pull-right" data-effect="fadeOut" title="Tutup Form"><i class="fa fa-times"></i></span>
				</div>
				<div class="card-body">
					<form action="<?= base_url('Admin/update_profile') ?>" method="post" name="update_profile">
						<div class="form-group">
							<label>Full Name</label>
							<input type="hidden" name="id" value="<?= $value->id ?>">
							<input type="text" name="full_name" class="form-control" value="<?= $value->full_name ?>" placeholder="Full Name.">
						</div>
						<div class="form-group">
							<label>Address</label>
							<input type="text" name="address" class="form-control" value="<?= $value->address ?>" placeholder="Address.">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" value="<?= $value->email ?>" placeholder="Email.">
						</div>
						<!-- <div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" value="<?= $value->password ?>" placeholder="Email.">
						</div> -->
						<hr>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="uploadFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload Photo Admin</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Admin/save_photo') ?>" method="post" enctype="multipart/form-data" name="upload_photo">
					<div class="form-group">
						<label>Choose Photo</label>
						<input type="hidden" name="id" value="<?= $value->id ?>">
						<input type="file" name="picture" class="form-control" accept="image/*" id="imgInp" placeholder="Full Name.">
						<?= form_error('picture', '<small class="text-danger pl-3">', '</small>'); ?>
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
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Admin/update_password') ?>" method="post" name="change_password">
					<div class="form-group">
						<label>New Password</label>
						<input type="hidden" name="id" value="<?= $value->id ?>">
						<input type="password" name="password" class="form-control">
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
		$('.form-change-profile').hide();

		$(document).on('click', '.tombol-edit', function() {
			$('.form-change-profile').show();
		})

		$(document).on('click', '.tutup-form', function() {
			$('.form-change-profile').hide();
		})

		imgInp.onchange = evt => {
			const [file] = imgInp.files
			if (file) {
				blah.src = URL.createObjectURL(file)
			}
		}

		$(function() {
			$("form[name='upload_photo']").validate({
				rules: {
					picture: {
						required: true
					}
				},
				messages: {
					picture: {
						required: "photo is required (photo harus di isi)"
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
    	});

		$(function() {
			$("form[name='change_password']").validate({
				rules: {
					password: {
						required: true
					}
				},
				messages: {
					password: {
						required: "password is required (password harus di isi)"
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
    	});

		$(function() {
			$("form[name='update_profile']").validate({
				rules: {
					full_name: {
						required: true
					},
					address: {
						required: true
					},
					email: {
						required: true
					}
				},
				messages: {
					full_name: {
						required: "full name is required (full name harus di isi)"
					},
					address: {
						required: "address is required (address harus di isi)"
					},
					email: {
						required: "email is required (email harus di isi)"
					}
					
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
    	});
	})

	<?php if ($this->session->flashdata('upload_succcess')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'photo uploaded successfully!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'profile updated successfully!',
            showConfirmButton: true,
            // timer: 1500
        })

	<?php elseif ($this->session->flashdata('update_password')) : ?>
		Swal.fire({
			icon: 'success',
			title: 'Berhasil!',
			text: 'password updated successfully!',
			showConfirmButton: true,
			// timer: 1500
		})

	<?php elseif ($this->session->flashdata('login_dulu')) : ?>
		Swal.fire({
			icon: 'warning',
			title: 'Catatan!',
			text: 'Sesi anda telah habis, silahkan login kembali!',
			showConfirmButton: true,
			// timer: 1500
		})
    <?php endif ?>
</script>
