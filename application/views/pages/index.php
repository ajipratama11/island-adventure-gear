<?php $this->load->view('partials/header_pages.php'); ?>

	<!-- slider section -->
	<section class="slider_section ">
		<div class="slider_bg_box">
		<img src="<?= base_url() ?>layouts/images/slide1.png" alt="">
		</div>
		<div id="customCarousel1" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<!-- <div class="carousel-item active">
				<div class="container ">
					<div class="row">
					<div class="col-md-7 col-lg-6 ">
						<div class="detail-box">
							<h1>
								<span>
								Sale 20% Off
								</span>
								<br>
								On Everything
							</h1>
							<p>
								Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
							</p>
							<div class="btn-box">
								<a href="" class="btn1">
								Shop Now
								</a>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
			<div class="carousel-item ">
				<div class="container ">
					<div class="row">
					<div class="col-md-7 col-lg-6 ">
						<div class="detail-box">
							<h1>
								<span>
								Sale 20% Off
								</span>
								<br>
								On Everything
							</h1>
							<p>
								Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
							</p>
							<div class="btn-box">
								<a href="" class="btn1">
								Shop Now
								</a>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="container ">
					<div class="row">
					<div class="col-md-7 col-lg-6 ">
						<div class="detail-box">
							<h1>
								<span>
								Sale 20% Off
								</span>
								<br>
								On Everything
							</h1>
							<p>
								Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
							</p>
							<div class="btn-box">
								<a href="" class="btn1">
								Shop Now
								</a>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div> -->
		</div>
		<!-- <div class="container">
			<ol class="carousel-indicators">
				<li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
				<li data-target="#customCarousel1" data-slide-to="1"></li>
				<li data-target="#customCarousel1" data-slide-to="2"></li>
			</ol>
		</div> -->
		</div>
	</section>
	<!-- end slider section -->
</div>
<!-- why section -->
<section class="why_section layout_padding">
	<div class="container">
		<div class="heading_container heading_center">
		<h2>
			Why Shop With Us
		</h2>
		</div>
		<div class="row">
		<div class="col-md-4" style="margin-top: 45px; text-align: center;">
			<!-- <div class="box "> -->
				<!-- <div class="img-box"> -->
					<img src="<?= base_url() ?>/layouts/images/icon_box1.png" style="border-radius: 5px;" width="330" height="260">
				<!-- </div> -->
				<!-- <div class="detail-box">
					<h5>
					Fast Delivery
					</h5>
					<p>
					variations of passages of Lorem Ipsum available
					</p>
				</div> -->
			<!-- </div> -->
		</div>
		<div class="col-md-4" style="margin-top: 45px; text-align: center;">
			<img src="<?= base_url() ?>/layouts/images/icon_box2.png" style="border-radius: 5px;" width="330" height="260">
		</div>
		<div class="col-md-4" style="margin-top: 45px; text-align: center;">
			<img src="<?= base_url() ?>/layouts/images/icon_box3.png" style="border-radius: 5px;" width="330" height="260">
		</div>
		</div>
	</div>
</section>
<!-- end why section -->

<!-- arrival section -->
<section class="arrival_section">
	<!-- <div class="container"> -->
		<div class="box">
			<div class="arrival_bg_box">
				<img src="<?= base_url() ?>layouts/images/banner.png" alt="">
			</div>
			<div class="row">
				<div class="col-md-6 ml-auto">
					<div class="heading_container remove_line_bt">
						<h2>
						The Biggest OutDoor Adventure Gear in Bali
						</h2>
					</div>
					<p style="margin-top: 20px;margin-bottom: 30px;">
					Island Adventure Gear is a brand that provides outdoor activity equipment from Bali-Indonesia that meets various needs for equipment and equipment for the lifestyle of outdoor enthusiasts in tropical climates.
					</p>
					<a href="<?= base_url('Admin/product') ?>">
						Ayo Berpetualang bersama Kami
					</a>
				</div>
			</div>
		</div>
	<!-- </div> -->
</section>
<!-- end arrival section -->

<!-- product section -->
<section class="product_section layout_padding">
	<div class="container">
		<div class="heading_container heading_center">
			<h2>
				Our <span>products</span>
			</h2>
		</div>
		<div class="row">
			<?php foreach($product as $value) { ?>
				<div class="col-sm-6 col-md-4 col-lg-4">
					<div class="box">
						<div class="option_container">
							<div class="options">
								<a href="<?= base_url('Pages/add_to_chart2/' . $value->id) ?>" class="option1"><i class="fa fa-shopping-cart"></i>
									Add To Cart
								</a>
								<?php $pesan = 'I Want To Order Product (' . $value->product_name . ') From Website Island Adventure Gear'; ?>
								<a href="https://wa.me/6281353012947?text=<?= $pesan ?>" target="_blank" class="option2"><i class="fa-brands fa-whatsapp"></i>
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
		<div class="btn-box">
		<a href="<?= base_url('Pages/product') ?>">
		View All products
		</a>
		</div>
	</div>
</section>
<!-- end product section -->


<!-- client section -->
<section class="client_section layout_padding">
	<div class="container">
		<div class="heading_container heading_center">
		<h2>
			Customer's Testimonial
		</h2>
		</div>
		<div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<div class="box col-lg-10 mx-auto">
						<div class="img_container">
							<div class="img-box">
								<div class="img_box-inner">
									<img src="<?= base_url('layouts/images/user.png') ?>" alt="">
								</div>
							</div>
						</div>
						<div class="detail-box">
							<h5>
								Island Adventure Gear
							</h5>
							<h6>
								Owner IAG
							</h6>
							<p>
								Kami akan berkomitmen meningkatkan pelayanan kami terhadap setiap pelanggan kami
							</p>
						</div>
					</div>
				</div>
				<?php foreach($testimony as $value) { ?>
					<div class="carousel-item">
						<div class="box col-lg-10 mx-auto">
							<div class="img_container">
							<div class="img-box">
								<div class="img_box-inner">
									<?php if(empty($value->image)) { ?>
										<img src="<?= base_url('layouts/images/testimony/user.png') ?>" alt="">
									<?php } else { ?>
										<img src="<?= base_url('layouts/images/testimony/' . $value->image) ?>" alt="">
									<?php } ?>
								</div>
							</div>
							</div>
							<div class="detail-box">
							<h5>
								<?= $value->customer ?>
							</h5>
							<h6>
								Customer
							</h6>
							<p>
								<?= $value->content_testimony ?>
							</p>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="carousel_btn_box">
				<a class="carousel-control-prev" href="#carouselExample3Controls" role="button" data-slide="prev">
				<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
				<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExample3Controls" role="button" data-slide="next">
				<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
				<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
</section>
<!-- end client section -->

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
