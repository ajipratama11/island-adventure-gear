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
			<a href="#add_mutation" data-toggle="modal" class="btn btn-primary btn-sm col-md-4"><i class="fa fa-plus-circle"></i> Add Balance Mutation</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">List Balance Mutation</h6>
				</div>
				<div class="table-responsive p-3">
					<table class="table align-items-center table-flush table-hover" style="width: 100%" id="dataTableHover">
						<thead class="thead-light" style="background-color: #0077b6">
							<tr>
								<th>No</th>
								<th>From Payment Methods</th>
								<th>To Payment Methods</th>
								<th>Nominals</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no = 1;
							foreach($mutation as $value) { 
								$to = $this->db->select('payment_name')->from('mutation')->join('payment_methods', 'payment_methods.id = mutation.to_id')->where('mutation.id', $value->id)->get()->row(); ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $value->payment_name ?></td>
									<td><?= $to->payment_name ?></td>
									<td><?= 'Rp. '. number_format($value->nominal,0,',','.') ?></td>
									<td><?= date('d-m-Y', strtotime($value->date_mutation)) ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="add_mutation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Add Balance Mutation</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Admin/save_mutationBalance') ?>" method="post" name="add_mutation">
					<div class="form-group">
						<label>From Payment</label>
						<select id="from_id" class="form-control" style="width: 100%" name="from_id">
							<option></option>
							<?php foreach($payment as $value) { ?>
								<option value="<?= $value->id ?>"><?= $value->payment_name ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>To Payment</label>
						<select id="to_id" class="form-control" style="width: 100%" name="to_id">
							<option></option>
							<?php foreach($payment as $value) { ?>
								<option value="<?= $value->id ?>"><?= $value->payment_name ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Nominal</label>
						<input type="text" name="nominal" class="form-control" id="currency-field" data-type="currency">
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
		$('#from_id').select2({
            placeholder: 'Choose Payment Methods',
        });
		$('#to_id').select2({
            placeholder: 'Choose Payment Methods',
        });

		$(function() {
			$("form[name='add_mutation']").validate({
				rules: {
					from_id: {
						required: true
					},
					to_id: {
						required: true
					},
					nominal: {
						required: true
					}
				},
				messages: {
					from_id: {
						required: "from payment name is required (from payment name harus di isi)"
					},
					to_id: {
						required: "to payment is required (to payment harus di isi)"
					},
					nominal: {
						required: "nominal is required (nominal harus di isi)"
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
            text: 'balance mutation saved successfully!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('failed_same')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Notes!',
            text: 'payments from and payments to cannot be the same!',
            showConfirmButton: true,
            // timer: 1500
        })

	<?php elseif ($this->session->flashdata('failed_balance')) : ?>
		Swal.fire({
			icon: 'warning',
			title: 'Notes!',
			text: 'balance mutation failed due to insufficient balance!',
			showConfirmButton: true,
			// timer: 1500
		})

    <?php endif ?>
</script>
