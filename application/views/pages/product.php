<?php $this->load->view('partials/header_pages.php'); ?>


<section class="inner_page_head">
	<div class="container_fuild">
		<div class="row">
			<div class="col-md-12">
				<div class="full">
					<h3>Product Grid</h3>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="category_section layout_padding">
	<div class="container">
		<div class="heading_container heading_center">
			<h2>
				Select <span>a products category</span>
			</h2>
		</div>
		<div class="row mt-3">
			<?php foreach($category as $value) { ?>
				<a href="" class="card category-item h-100 shadow">
					<div class="card-header head-card-category">
						<img src="<?= base_url('layouts/images/category/' . $value->image) ?>" width="250px" alt="">
						<div class="category-info">
							<div class="text-category"><?= $value->name_category ?></div>
						</div>
					</div>
				</a>
			<?php } ?>
		</div>
	</div>
</section>
<?php $this->load->view('partials/footer_pages.php'); ?>
