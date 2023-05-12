<?php $this->load->view('partials/header.php'); ?>

<div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-primary fw-bold"><?= $title ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page">Finance</li>
			<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
		</ol>
	</div>
	<div class="row">
		<div class="col-lg-6 mb-3">
			<a href="#add_payment" data-toggle="modal" class="btn btn-primary btn-sm col-md-4"><i class="fa fa-plus-circle"></i> Add Payment Methods</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">List Payment Methods</h6>
				</div>
				<div class="table-responsive p-3">
					<table class="table align-items-center table-flush table-hover" id="dataTableHover">
						<thead class="thead-light" style="background-color: #0077b6">
							<tr>
								<th>No</th>
								<th>Payment Name</th>
								<th>Balance</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no = 1;
							foreach($payment as $value) { ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $value->payment_name ?></td>
									<td><?= 'Rp. '. number_format($value->balance,2,',','.') ?></td>
									<td>
										<a href="#edit_payment" data-toggle="modal" class="badge bg-primary tombol-edit" data-id="<?= $value->id ?>" data-payment_name="<?= $value->payment_name ?>" data-balance="<?= $value->balance ?>" style="color: #fff" title="Edit"><i class="fa fa-edit"></i> Edit</a>
										<a href="<?= base_url('Admin/delete_paymentMethods/' . $value->id) ?>" class="badge bg-danger tombol-hapus" style="color: #fff" title="delete"><i class="fa fa-trash"></i> Delete</a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="add_payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Add Payment Methods</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Admin/save_paymentMethods') ?>" method="post" name="add_payment">
					<div class="form-group">
						<label>Payment Name</label>
						<input type="text" name="payment_name" class="form-control">
					</div>
					<div class="form-group">
						<label>Balance</label>
						<input type="text" name="balance" class="form-control" id="currency-field" data-type="currency">
					</div>
					<hr>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="edit_payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Edit Payment Methods</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Admin/update_paymentMethods') ?>" method="post" name="update_payment">
					<div class="form-group">
						<input type="hidden" name="id" id="id">
						<label>Payment Name</label>
						<input type="text" name="payment_name" class="form-control payment-name">
					</div>
					<div class="form-group">
						<label>Balance</label>
						<input type="text" name="balance" class="form-control balance">
					</div>
					<hr>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer.php'); ?>
<script>
	$(document).ready(function() {
		$(function() {
			$("form[name='add_payment']").validate({
				rules: {
					payment_name: {
						required: true
					},
					balance: {
						required: true
					}
				},
				messages: {
					payment_name: {
						required: "payment name is required (payment name harus di isi)"
					},
					balance: {
						required: "balance is required (balance harus di isi)"
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
    	});

		$(function() {
			$("form[name='update_payment']").validate({
				rules: {
					payment_name: {
						required: true
					},
					balance: {
						required: true
					}
				},
				messages: {
					payment_name: {
						required: "payment name is required (payment name harus di isi)"
					},
					balance: {
						required: "balance is required (balance harus di isi)"
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
    	});

		$(document).on('click', '.tombol-edit', function() {
			let id = $(this).attr('data-id'),
				payment_name = $(this).attr('data-payment_name'),
				balance = $(this).attr('data-balance');
			
			$('#id').val(id);
			$('.payment-name').val(payment_name);
			$('.balance').val(balance);
		})

		$('.tombol-hapus').on('click', function(e) {
			e.preventDefault();
			const link = $(this).attr('href');

			Swal.fire({
				title: 'Are You Sure ?',
				text: "This payment methods will be deleted!",
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


		$("input[data-type='currency']").on({
			keyup: function() {
				formatCurrency($(this));
			},
			blur: function() {
				formatCurrency($(this), "blur");
			}
		});


		function formatNumber(n) {
			// format number 1000000 to 1,234,567
			return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
		}


		function formatCurrency(input, blur) {
			// appends $ to value, validates decimal side
			// and puts cursor back in right position.

			// get input value
			var input_val = input.val();

			// don't validate empty input
			if (input_val === "") {
				return;
			}

			// original length
			var original_len = input_val.length;

			// initial caret position 
			var caret_pos = input.prop("selectionStart");

			// check for decimal
			if (input_val.indexOf(".") >= 0) {
				var decimal_pos = input_val.indexOf(".");
				left_side = formatNumber(left_side);

				// validate right side
				right_side = formatNumber(right_side);
				input_val = left_side;

			} else {
				input_val = formatNumber(input_val);
			}

			// send updated string to input
			input.val(input_val);

			// put caret back in the right position
			var updated_len = input_val.length;
			caret_pos = updated_len - original_len + caret_pos;
			input[0].setSelectionRange(caret_pos, caret_pos);
		}
	})


	<?php if ($this->session->flashdata('success_insert')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'payment methods saved successfully!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'payment methods updated successfully!',
            showConfirmButton: true,
            // timer: 1500
        })

	<?php elseif ($this->session->flashdata('success_delete')) : ?>
		Swal.fire({
			icon: 'success',
			title: 'Success!',
			text: 'payment methods deleted successfully!',
			showConfirmButton: true,
			// timer: 1500
		})

    <?php endif ?>
</script>
