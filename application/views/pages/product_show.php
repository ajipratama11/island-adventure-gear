<?php $this->load->view('partials/header_pages2.php'); ?>
<section class="inner_page_head">
	<div class="container_fuild">
		<div class="row">
			<div class="col-md-12">
				<div class="full">
					<h3><?= $title ?></h3>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="product_section layout_padding">
	<div class="container">
		<div class="row">
			<div class="col-md-6 photo-product">
				<div class="row">
					<?php foreach($photo_product as $value_image) { ?>
						<div class="image-product col-sm-4 mt-3">
							<img src="<?= base_url('layouts/images/product_photo/' . $value_image->photo) ?>" width="200">
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-6 description">
				<div class="row">
					<div class="card col-md-12" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s;">
						<div class="image-product row" style="margin-left: 20px">
							<img src="<?= base_url('layouts/images/product/' . $value->image) ?>" width="400">
						</div>
					</div>
					<div class="card mt-3 col-md-12" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s;">
						<div class="row">
							<div class="col-sm-4" style="margin-left: 10px; margin-top:10px">
								Product Name
							</div>
							<div class="col-sm-7" style="margin-left: 10px; margin-top:10px">
								: <?= $value->product_name ?>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4" style="margin-left: 10px; margin-top:10px">
								Harga
							</div>
							<div class="col-sm-7" style="margin-left: 10px; margin-top:10px">
								: <?= 'Rp. '. number_format($value->price,0,',','.') ?>
							</div>
						</div>
						<!-- <div class="row">
							<div class="col-sm-4" style="margin-left: 10px; margin-top:10px">
								Kategori
							</div>
							<div class="col-sm-7" style="margin-left: 10px; margin-top:10px">
								: <?= $value->category ?>
							</div>
						</div> -->
						<div class="row">
							<div class="col-sm-4" style="margin-left: 10px; margin-top:10px">
								Stock
							</div>
							<div class="col-sm-7" style="margin-left: 10px; margin-top:10px">
								: <?= $value->stock ?>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4" style="margin-left: 10px; margin-top:10px">
								Sold
							</div>
							<div class="col-sm-7" style="margin-left: 10px; margin-bottom: 10px; margin-top:10px">
								: <?= $value->sold ?>
							</div>
						</div>
					</div>
					<div class="card mt-3 col-md-12" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s;">
						<div class="description-product row" style="margin: 10px 10px 10px 10px;">
							<?= $value->description ?>
						</div>
						<div class="button-order">
							<?php $pesan = 'I Want To Order Product (' . $value->product_name . ') From Website Island Adventure Gear'; ?>
							<a href="https://wa.me/6281353012947?text=<?= $pesan ?>" target="_blank" class="btn btn-success" style="margin-top: 10px; margin-left: 40%; margin-right: 10px; margin-bottom: 10px;"><i class="fa-brands fa-whatsapp"></i> Pesan Sekarang</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $this->load->view('partials/footer_pages.php'); ?>
