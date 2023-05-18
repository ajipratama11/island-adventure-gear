<?php $this->load->view('partials/header.php'); ?>

<div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-primary fw-bold"><?= $title ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page">Other</li>
			<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
		</ol>
	</div>
	<div class="row">
		<div class="col-lg-6 mb-3">
			<a href="<?= base_url('Admin/article') ?>" class="btn btn-primary btn-sm col-md-3"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Form Add Product</h6>
				</div>
				<div class="card-body">
                	<form action="<?= base_url('Admin/save_article') ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="exampleInputEmail1">Title</label>
							<input type="text" class="form-control" name="title" id="title" value="<?= set_value('title') ?>" placeholder="Enter Title" onkeyup="createTextSlug()">
							<?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Slug</label>
							<input type="text" class="form-control" name="slug" id="slug" value="<?= set_value('slug') ?>" placeholder="" readonly>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Topic</label>
							<input type="text" class="form-control" name="topic_article" value="<?= set_value('topic_article') ?>" placeholder="Enter Topic">
							<?= form_error('topic_article', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Author</label>
							<input type="text" class="form-control" name="author" readonly value="<?= $this->session->userdata('full_name') ?>" placeholder="Enter Athor">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Description</label>
							<textarea class="summernote" name="description"><?= set_value('description') ?></textarea>
							<?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label>Image</label>
							<input type="file" name="images" class="form-control" accept="image/*" id="imgInp" placeholder="Full Name.">
							<?= form_error('images', '<small class="text-danger pl-3">', '</small>'); ?>
							<p>maximum size 3MB</p>
							<img id="blah" class="mt-2 mb-3" height="200" width="200" src="#" alt="preview photo" />
						</div>
						<hr>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
						<button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('partials/footer.php'); ?>

<script>

		function createTextSlug()
		{
			var title = document.getElementById("title").value;
			document.getElementById("slug").value = generateSlug(title);
		}

		function generateSlug(text)
		{
			return text.toString().toLowerCase()
				.replace(/^-+/, '')
				.replace(/-+$/, '')
				.replace(/\s+/g, '-')
				.replace(/\-\-+/g, '-')
				.replace(/[^\w\-]+/g, '');
		}

	$(document).ready(function() {

		$('#category_id').select2({
			placeholder: 'Choose Category',
		});

		$('#subcategory_id').select2({
			placeholder: 'Choose Sub Category',
		});

		imgInp.onchange = evt => {
			const [file] = imgInp.files
			if (file) {
				blah.src = URL.createObjectURL(file)
			}
		}

	})

</script>
