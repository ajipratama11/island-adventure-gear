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
			<?php foreach($blog as $value) { ?>
				<div class="d-md-flex post-blog small-img">
					<a href="<?= base_url('Pages/full_blog/' . $value->slug) ?>" class="me-4 thumbnail">
						<img src="<?= base_url() ?>layouts/images/article/<?= $value->images ?>" class="img-fluid">
					</a>
					<div class="description">
						<div class="post-meta">
							<span class="category"><?= $value->topic_article ?></span>
							<span>|</span>
							<span class="date"><?= date('d-m-Y', strtotime($value->date)) ?></span>
						</div>
						<h3>
							<a href="<?= base_url('Pages/full_blog/' . $value->slug) ?>" style="color: #000;"><?= $value->title ?></a>
						</h3>
						<div><?= substr($value->description, 375, 600) ?>...</div>
						<div class="d-flex align-items-center author">
							<div class="photo">
								<img src="<?= base_url() ?>layouts/images/user.png" alt="" class="img-fluid">
							</div>
							<div class="name">
								<h3 class="m-0 p-0"><?= $value->author ?></h3>
							</div>
						</div>
					</div>
				</div>
				<hr>
			<?php } ?>
		</div>
	</div>
</section>

<?php $this->load->view('partials/footer_pages.php'); ?>
