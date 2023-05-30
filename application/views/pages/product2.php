<?php $this->load->view('partials/header_pages.php'); ?>
<style>
.product_section .product-filter {
	margin-bottom: 80px;
}

.product-filter ul {
	margin: 0;
	padding: 0;
	list-style: none;
	text-align: center;
}

.product-filter ul li {
	display: inline-block;
	font-weight: 700;
	font-size: 18px;
	margin: 15px;
	border: 2px solid #0077b6;
	color: #0077b6;
	cursor: pointer;
	padding: 8px 20px;
	border-radius: 25px;
}

.product-filter ul li.active {
	background-color: #0077b6;
	color: #FFF;
}



</style>

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
<section class="product_section layout_padding">
	<div class="container">
		<div class="heading_container heading_center">
			<h2>
				Our <span>products</span>
			</h2>
			<div class="product-filter">
				<ul>
					<li class="active" data-filter="all">All</li>
					<?php foreach($sub_category as $value) { ?>
						<li data-filter="<?= $value->name_subcategory ?>"><?= $value->name_subcategory ?></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div class="row">
			<?php foreach($product as $value) { ?>
				<div class="col-sm-6 col-md-4 col-lg-4">
					<div class="box">
						<div class="option_container">
							<div class="options">
								<a href="<?= base_url('Pages/add_to_chart/' . $value->id) ?>" class="option1"><i class="fa fa-shopping-cart"></i>
									Add To Cart
								</a>
								<?php $pesan = 'I Want To Order Product (' . $value->product_name . ') From Website Island Adventure Gear'; ?>
								<a href="<?= base_url('Pages/order2/' . $value->id) ?>" target="_blank" class="option2"><i class="fa-brands fa-whatsapp"></i>
									Buy Now
								</a>
								<a href="<?= base_url('Pages/product_show/' . $value->slug) ?>" class="option3"><i class="fa fa-eye"></i>
									See Product
								</a>
							</div>
						</div>
						<div class="img-box">
							<img src="<?= base_url() ?>layouts/images/product/<?= $value->image ?>" alt="">
						</div>
						<div class="detail-box">
							<div class="row">
								<div class="col-md-12">
									<h5>
										<?php echo $value->product_name ?>
									</h5>
								</div>
								<div class="col-md-12">
									<?= 'Rp. '. number_format($value->price,0,',','.') ?>
								</div>
								<div class="col-md-12">
									<h5>
										Sold : <?php echo $value->sold ?>
									</h5>
								</div>
							</div>
							<h6>
							</h6>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php $this->load->view('partials/footer_pages.php'); ?>
<script>
	<?php if ($this->session->flashdata('success_add_cart')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'successfully added to cart!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
