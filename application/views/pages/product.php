<?php $this->load->view('partials/header_pages.php'); ?>
<style>

.category-div {
  position: relative;
  height: 250px;
  width: 250px;
  overflow: hidden;
  box-shadow: 0px 2px 5px rgba(0,0,0,0.3);
  transition: box-shadow 0.3s ease-out;
}

.category-div:hover {
  box-shadow: 1px 2px 10px rgba(0,0,0,0.5);
}

.img-container {
  background-color: #000;
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 250px;
  transition: transform 0.3s ease-out;
  z-index: 2;
}

.img-container:hover {
	cursor: pointer;
}

.container:hover .img-container {
	transform: translateY(-100px);
}

.img-container > img {
  height: 100%;
  width: 250px;
  transition: opacity 0.3s ease-out;
}

.container:hover > .img-container > img {
  opacity: 0.5;
}

.social-media {
  display: flex;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  z-index: 3;
  margin: 0;
  padding: 0;
}

.social-media > li {
  list-style: none;
}

.social-media > li > a {
  display: block;
  height: 50px;
  width: 50px;
  background-color: #FFF;
  text-align: center;
  color: #262626;
  margin: 0 5px;
  border-radius: 50%;
  opacity: 0;
  transform: translateY(200px);
  transition: all 0.3s ease-out;
}

.container:hover > .social-media > li > a {
  transform: translateY(0);
  opacity: 1;
}

.social-media > li > a > .fa {
  font-size: 24px;
  line-height: 50px;
  transition: transform 0.3s ease-out;
}

.social-media > li > a:hover > .fa {
  transform: rotateY(360deg);
}

.container:hover .social-media li:nth-child(1) a {
	transition-delay: 0s;
}

.container:hover .social-media li:nth-child(2) a {
	transition-delay: 0.1s;
}

.container:hover .social-media li:nth-child(3) a {
	transition-delay: 0.2s;
}

.container:hover .social-media li:nth-child(4) a {
	transition-delay: 0.3s;
}

.container:hover .social-media li:nth-child(5) a {
	transition-delay: 0.4s;
}

.user-info {
  position: absolute;
	bottom: 0;
	left: 0;
	background-color: #FFF;
	height: 100px;
	width: 100%;
	box-sizing: border-box;
	padding: 10px;
  text-align: center
}

.user-info > h2 {
  padding: 0;
  margin: 10px 0;
}

.user-info > span {
  color: #262626;
  font-size: 16px;
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
<section class="category_section layout_padding">
	<div class="container">
		<div class="heading_container heading_center">
			<h2>
				Select <span>a products category</span>
			</h2>
		</div>
		<div class="row mt-3">
			<?php foreach($category as $value) { ?>
				<div class="col-md-3" style="margin-top: 20px">
					<a href="<?= base_url('Pages/product_detail/' . $value->id) ?>" style="">
						<!-- <div class="card-header head-card-category">
							<img src="<?= base_url('layouts/images/category/' . $value->image) ?>" width="250px" alt="">
							<div class="category-info">
								<div class="text-category"><?= $value->name_category ?></div>
							</div>
						</div> -->
						<div class="category-div">
							<div class="img-container">
								<img src="<?= base_url('layouts/images/category/' . $value->image) ?>" alt="">
							</div>
							<ul class="social-media">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							</ul>
							<div class="user-info">
								<h2><?= $value->name_category  ?></h2>
							</div>
						</div>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php $this->load->view('partials/footer_pages.php'); ?>
