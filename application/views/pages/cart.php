<?php $this->load->view('partials/header_pages.php'); ?>
<style>
.select_checkbox_all {
	position: relative;
	display: block;
	min-height: 1.5rem;
	padding-left: 1.5rem;
}

.custome-control-label {
	position: relative;
	margin-bottom: 0;
	vertical-align: top;
}

.main-check {
	position: absolute;
	z-index: -1;
	opacity: 0;
}
</style>

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
		<form action="<?= base_url('Pages/order') ?>" method="post">
			<div class="row mt-5 mb-5">
				<!-- <p>Checklist to select product</p><br> -->
				<div class="form-group">
					<div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
						<input type="checkbox" class="custom-control-input main_check" id="customCheck">
						<label class="custom-control-label" for="customCheck">Select All Product</label>
					</div>
				</div>
				<table class="table table-striped table-cart">
					<thead style="background-color: #0077b6; color: #FFF;">
						<tr>
							<th scope="col" width="5%">No</th>
							<th scope="col" width="5%">Checklist</th>
							<th scope="col" width="50%">Product Name</th>
							<th scope="col" width="10%">Qty</th>
							<th scope="col" width="20%">Price</th>
							<th scope="col" width="20%">Action</th>

						</tr>
					</thead>
					<?php
						date_default_timezone_set('Asia/Jakarta');
						$duration = 1;
						$this->db->query("DELETE FROM cart WHERE DATEDIFF(CURDATE(), date) > $duration");
						
					?>
					<tbody> 
						
							<?php $no = 1; foreach($cart as $value) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><input type="checkbox" name="product_id[]" value="<?= $value['id'] ?>"></td>
								<td>
									<div class="row">
										<div class="col-3 img-product" style="background-image: url(<?= base_url('layouts/images/product/' . $value['product_options']['images']) ?>)"></div>
										<div class="col-9"><?= $value['name'] ?></div>
									</div>
								</td>
								<td><?= $value['qty'] ?><input type="hidden" name="qty[]" value="<?= $value['qty'] ?>"></td>
								<td><?= 'Rp. ' . number_format($value['price'],0,',','.') ?></td>
								<td>
									<a href="<?= base_url('Pages/delete_from_cart/' . $value['rowid']) ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i> Delete</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
				<div class="row button-order">
					<button type="submit" class="btn btn-success"><i class="fa-brands fa-whatsapp"></i> Order Now</button>
				</div>
			</div>
		</form>
	</div>
</section>

<?php $this->load->view('partials/footer_pages.php'); ?>
<script>
	$(".main_check").click(function(){
    	$('input:checkbox').not(this).prop('checked', this.checked);
	});	

	$(document).ready(function() {
		$('.tombol-hapus').on('click', function(e) {
			e.preventDefault();
			const link = $(this).attr('href');

			Swal.fire({
				title: 'Are You Sure ?',
				text: "This product will be deleted!",
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

	<?php if ($this->session->flashdata('delete_cart')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'product in cart succesfully deleted!',
            showConfirmButton: true,
            // timer: 1500
        })
	<?php elseif ($this->session->flashdata('not_checklist')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Notes!',
            text: 'no products are checked!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>

