<?php $this->load->view('partials/header_pages.php'); ?>

<section class="inner_page_head">
	<div class="container_fuild">
		<div class="row">
			<div class="col-md-12">
				<div class="full">
					<h3>Blog</h3>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="blog_section">
	<div class="container">
		<div class="row mt-5">
			<div class="d-md-flex post-blog small-img">
				<a href="" class="me-4 thumbnail">
					<img src="<?= base_url() ?>layouts/images/test.png" class="img-fluid">
				</a>
				<div class="description">
					<div class="post-meta">
						<span class="category">Pendakian</span>
						<span>|</span>
						<span class="date">12 Juli 2023</span>
					</div>
					<h3>
						<a href="" style="color: #000;">Apa yang harus diperhatikan dalam memulai pendakian ?</a>
					</h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio placeat exercitationem magni voluptates dolore. Tenetur fugiat voluptates quas.</p>
					<div class="d-flex align-items-center author">
						<div class="photo">
							<img src="<?= base_url() ?>layouts/images/user.png" alt="" class="img-fluid">
						</div>
						<div class="name">
							<h3 class="m-0 p-0">Admin</h3>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="d-md-flex post-blog small-img">
				<a href="" class="me-4 thumbnail">
					<img src="<?= base_url() ?>layouts/images/test.png" class="img-fluid">
				</a>
				<div class="description">
					<div class="post-meta">
						<span class="category">Pendakian</span>
						<span>|</span>
						<span class="date">12 Juli 2023</span>
					</div>
					<h3>
						<a href="" style="color: #000;">Apa yang harus diperhatikan dalam memulai pendakian ?</a>
					</h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio placeat exercitationem magni voluptates dolore. Tenetur fugiat voluptates quas.</p>
					<div class="d-flex align-items-center author">
						<div class="photo">
							<img src="<?= base_url() ?>layouts/images/user.png" alt="" class="img-fluid">
						</div>
						<div class="name">
							<h3 class="m-0 p-0">Admin</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $this->load->view('partials/footer_pages.php'); ?>
