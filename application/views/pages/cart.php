<?php $this->load->view('partials/header_pages.php'); ?>

<section class="inner_page_head">
	<div class="container_fuild">
		<div class="row">
			<div class="col-md-12">
				<div class="full">
					<h3>Shopping Cart</h3>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section_cart">
	<div class="container">
		<div class="row mt-5 mb-5">
			<p>Checklist to select product</p>
			<table class="table table-striped table-cart">
				<thead style="background-color: #0077b6; color: #FFF;">
					<tr>
						<th scope="col" width="5%"><input type="checkbox" title="to select all"></th>
						<th scope="col" width="40%">Product Name</th>
						<th scope="col" width="20%">Price </th>
						<th scope="col" width="15%">Quantity</th>
						<th scope="col" width="20%">Sub Totally</th>

					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input type="checkbox"></td>
						<td>
							<div class="row">
								<div class="col-3 img-product" style="background-image: url(<?= base_url('layouts/images/sepatu.png') ?>)"></div>
								<div class="col-9">Sepatu Outdor Merk Bla Bla Impor Dari Mars</div>
							</div>
						</td>
						<td>Rp. 500.000,00</td>
						<td><input type="number" class="qty" name="qty" id="qty" value="1"></td>
						<td>Rp. 500.000,00</td>
					</tr>
					<tr>
						<td><input type="checkbox"></td>
						<td>
							<div class="row">
								<div class="col-3 img-product" style="background-image: url(<?= base_url('layouts/images/sepatu.png') ?>)"></div>
								<div class="col-9">Sepatu Outdor Merk Bla Bla</div>
							</div>
						</td>
						<td>Rp. 500.000,00</td>
						<td><input type="number" class="qty" name="qty" id="qty" value="1"></td>
						<td>Rp. 500.000,00</td>
					</tr>
					<tr>
						<td><input type="checkbox"></td>
						<td>
							<div class="row">
								<div class="col-3 img-product" style="background-image: url(<?= base_url('layouts/images/sepatu.png') ?>)"></div>
								<div class="col-9">Sepatu Outdor Merk Bla Bla</div>
							</div>
						</td>
						<td>Rp. 500.000,00</td>
						<td><input type="number" class="qty" name="qty" id="qty" value="1"></td>
						<td>Rp. 500.000,00</td>
					</tr>
				</tbody>
			</table>
			<div class="row button-order">
				<a href="" class="btn btn-success"><i class="fa-brands fa-whatsapp"></i> Order Now</a>
			</div>
		</div>
	</div>
</section>

<?php $this->load->view('partials/footer_pages.php'); ?>
