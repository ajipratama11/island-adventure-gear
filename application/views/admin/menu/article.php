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
			<a href="<?= base_url('Admin/add_article') ?>" class="btn btn-primary btn-sm col-md-3"><i class="fa fa-plus-circle"></i> Add Article</a>
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
								<th>Title</th>
								<th>Topic</th>
								<th>Date</th>
								<th>Author</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no = 1;
							foreach($article as $value) { ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $value->title ?></td>
									<td><?= $value->topic_article ?></td>
									<td><?= date('d-m-Y', strtotime($value->date)) ?></td>
									<td><?= $value->author ?></td>
									<td><img src="<?= base_url('layouts/images/article/' . $value->images) ?>" width="70"></td>
									<td>
										<a href="#description<?= $value->id ?>" data-toggle="modal" class="badge bg-success tombol-article" style="color: #fff" title="description article"><i class="fa fa-eye"></i></a> 
										<a href="<?= base_url('Admin/edit_article/' . $value->slug) ?>" class="badge bg-primary" style="color: #fff" title="edit"><i class="fa fa-edit"></i></a> 
										<a href="<?= base_url('Admin/delete_article/' . $value->id) ?>" class="badge bg-danger tombol-hapus" style="color: #fff" title="delete"><i class="fa fa-trash"></i></a>
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
<?php foreach($article as $value) { ?>
	<div class="modal fade" id="description<?= $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?= $value->title ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?= $value->description ?>
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


		$('.tombol-hapus').on('click', function(e) {
			e.preventDefault();
			const link = $(this).attr('href');

			Swal.fire({
				title: 'Are You Sure ?',
				text: "This article will be deleted!",
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
            text: 'article saved successfully!',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'article updated successfully!',
            showConfirmButton: true,
            // timer: 1500
        })

	<?php elseif ($this->session->flashdata('success_delete')) : ?>
		Swal.fire({
			icon: 'success',
			title: 'Success!',
			text: 'article deleted successfully!',
			showConfirmButton: true,
			// timer: 1500
		})

    <?php endif ?>	
</script>
