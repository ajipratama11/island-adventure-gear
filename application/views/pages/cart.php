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
						<th scope="col" width="5%">No</th>
						<th scope="col" width="55%">Product Name</th>
						<th scope="col" width="20%">Price</th>
						<th scope="col" width="20%">Action</th>

					</tr>
				</thead>
				<?php
					$duration = 1;
					$this->db->query("DELETE FROM cart WHERE DATEDIFF(CURDATE(), date) > $duration");
				 ?>
				<tbody>
					<?php $no = 1; 
						foreach($cart as $value) { 
							$data[] = [
								'no' => $no,
								'product' => $value->product_name
							];
						?>
						<tr>
							<td><?= $no++ ?></td>
							<td>
								<div class="row">
									<div class="col-3 img-product" style="background-image: url(<?= base_url('layouts/images/product/' . $value->image) ?>)"></div>
									<div class="col-9"><?= $value->product_name ?></div>
								</div>
							</td>
							<td><?= 'Rp. ' . number_format($value->price,0,',','.') ?></td>
							<td>
								<a href="<?= base_url('Pages/delete_from_cart/' . $value->id) ?>" class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i> Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<div class="row button-order">
				<?php 
				$pesan = 'I Want To Order Product : ';
					foreach($data as $val) {
						$pesan .= $val['no']. '. ' . $val['product'] .', ';
					} 
					$pesan .= 'From Website Island Adventure Gear';
				?>
				<a href="https://wa.me/6281353012947?text=<?= $pesan ?>" target="_blank" class="btn btn-success"><i class="fa-brands fa-whatsapp"></i> Order Now</a>
			</div>
		</div>
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
    <?php endif ?>
</script>

