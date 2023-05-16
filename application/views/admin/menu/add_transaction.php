<?php $this->load->view('partials/header.php'); ?>

<div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-primary fw-bold"><?= $title ?></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page">Transaction</li>
			<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
		</ol>
	</div>
	<div class="row">
		<div class="col-lg-6 mb-3">
			<a href="<?= base_url('Admin/transaction') ?>" class="btn btn-primary btn-sm col-md-3"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Form Transaction</h4>
				</div>
				<div class="card-body">
					<form action="<?= base_url('Admin/save_transaction') ?>" method="POST">
						<div class="row">
							<div class="col-md-4">
								<label for="">Transaction Code</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><span class="fas fa-credit-card"></span> </span>
									</div>
									<input type="text" name="kd_trans" id="kd_trans" class="form-control kd_trans" readonly>
								</div>
							</div>
							<div class="col-md-4">
								<?php
								date_default_timezone_set('Asia/Jakarta');
								$tgl = date('Y-m-d');
								?>
								<label for="">Transaction Date</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><span class="fa fa-calendar"></span> </span>
									</div>
									<input type="date" value="<?= $tgl ?>" name="date_trans" class="form-control" readonly>
								</div>
							</div>
							<div class="col-md-4">
								<label for="">Customer</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><span class="fas fa-user"></span> </span>
									</div>
									<input type="text" name="customer" id="customer" class="form-control customer" required>
								</div>
							</div>
							<div class="col-md-4">
								<label for="">Address</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><span class="fas fa-location-dot"></span> </span>
									</div>
									<input type="text" name="address" id="address" class="form-control address" required>
								</div>
							</div>
							<div class="col-md-4">
								<label for="">Whatsapp</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><span class="fa-brands fa-whatsapp"></span> </span>
									</div>
									<input type="text" name="no_telp_customer" id="no_telp_customer" class="form-control no_telp_customer" required>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="table-responsive">
								<table class="table text-center" id="tabeltransaksi">
									<thead>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Product Name</th>
											<th scope="col">Pilih</th>
											<th scope="col">Qty</th>
											<th scope="col">Price</th>
											<th scope="col">Image</th>
											<!-- <th scope="col">Potongan</th> -->
											<th scope="col">Sub Total</th>
											<th scope="col">Delete</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						<div class="row">
							<div class="col-auto">
								<button type="button" style="margin-top: 25px;" class="btn-sm btn-primary" id="BarisBaru">
									<i class="fa fa-circle-plus"></i> Add
								</button>
							</div>
							<div class="col-auto ml-auto">
							</div>
							<div class="col-auto ml-auto mt-3">
								<h4 class="total" style="color: orange;">Transaksi Total : <span id='total_transaksi2'>0</span> &nbsp; <span class='color-blue' style="color: blue;"> Payment Total : </ span><span id='total_pembayaran2'>0</span> </h4>
							</div>
						</div>
						<hr>
						<div class="row" style="margin-top: 30px;">
							<div class="col-md-3">
								<label for="">Transaction Total</label>
								<div class="input-group mb-3">
									<!-- <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><span class="fas fa-money-check"></span> </span>
									</div> -->
									<input type="text" readonly name="transaction_total" class="form-control total_transaksi" id='total_transaksi'>
								</div>
							</div>

							<div class="col-md-3">
								<label for="">Discount</label>
								<div class="input-group mb-3">
									<input type="number" name="discount" class="form-control discount" id='discount'>
								</div>
							</div>

							<div class="col-md-3">
								<label for="">Payment Total</label>
								<div class="input-group mb-3">
									<input type="text" readonly name="totally_payment" class="form-control total_pembayaran" id='total_pembayaran'>
								</div>
							</div>
							
							<div class="col-md-3">
								<label for="">Payment Methods</label>
								<div class="input-group mb-3">
									<select id="payment_methods" class="form-control" name="payment_methods_id" required>
										<option></option>
										<?php foreach($payment as $val) { ?>
											<option value="<?= $val->id ?>"><?= $val->payment_name ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>

						<div class="mt-3">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Transaction</button>
						</div>
						<!-- <span id="datanya"></span> -->
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="listproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">List Product Island Adventure Gear</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tabel_produk" width="100%" class="tabel_produk">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Product Name</td>
                            <td>Price</td>
                            <td>Image</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('partials/footer.php'); ?>
<script>

	$('#payment_methods').select2({
		placeholder: 'Choose Payment Methods',
	});

	$(document).ready(function() {

		 //detail_barang();
		 $('html, body').animate({
            scrollTop: 0
        }, 0);
        $.ajax({
            url: "<?php echo base_url() . 'Admin/max_transCode'; ?>",
            dataType: 'json',
            method: 'POST',
            success: function(json) {
				// console.log(json);
                var d = "<?php echo date('d') ?>";
                var m = "<?php echo date('m') ?>";
                var y = "<?php echo date('Y') ?>";

                if (json.maxs == null) {
                    max = 'DS' + '' + y + '' + m + '' + d + '-' + '0000';
                } else {
                    max = json.maxs;
                }

                var ambil_tanggal = max.substring(9, 11);
                // console.log('max', max);
                console.log('ambil_tanggal', ambil_tanggal);

                if (d == ambil_tanggal) {
                    // urut = max.substring(18, 20);
                    urut = max.split('-')[1];
                } else {
                    urut = "000";
                }

                urut++;
                var kodene = sprintf("%05s", urut);

                var kd_trans = 'IAG' + '' + y + '' + m + '' + d + '-' + kodene;
                // console.log('invoice', invoice);
                $('#kd_trans').val(kd_trans);
            }
        });

	})

	$('#BarisBaru').on('click', function() {
        BarisBaru();
    });

	function detail_product(id) {
        // getDataBarang()
        $('#listproduct').modal('show');
        table2 = $('#tabel_produk').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true,
            "bDestroy": true,
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url() ?>Admin/ajax_detail_produk/" + id,
                "type": "POST"
            },

            order: [1, 'asc']

        });
        table2.ajax.reload();
    }

	$(document).on('click', '#HapusBaris', function(e) {
        e.preventDefault();
        if ($(this).parent().parent().find("#pencarian_kode").val() == "") {
            $(this).parent().parent().remove();
            var nomor = 1;
            $('#tabeltransaksi tbody tr').each(function() {
                $(this).find('td:nth-child(1)').html(nomor);
                nomor++;
            })
            HitungTotalBayar();
        } else {
            $(this).parent().parent().remove();
            var nomor = 1;
            $('#tabeltransaksi tbody tr').each(function() {
                $(this).find('td:nth-child(1)').html(nomor);
                nomor++;
            })
            HitungTotalBayar();
        }
    });

	function BarisBaru() {
		var nomor = $('#tabeltransaksi tbody tr').length + 1;
		var baris = "<tr>";
        baris += "<td>" + nomor + "</td>";

        //1
        baris += "<td>";
        baris += "<input autocomplete='off' required  type='text' class='form-control name_product" + nomor + "' name='name_product[]'><input type='hidden' name='product_id[]' class='form-control product_id"+ nomor +"'>";
        baris += "</td>";

		baris += "<td><button type='button' class='btn-sm btn-primary' onclick='detail_product(" + nomor + ")' style='margin-left: 4px;'> <i class='ace-icon fa fa-search'></i></button></td>";
		 //4
		baris += "<td><input type='number' name='qty[]' id='qty' value'0' class='form-control qty" + nomor + "' required></td>";

		//5
		baris += "<td><input type='number' required name='price[]' id='price' class='form-control price" + nomor + "'></td>";

		baris += "<td><img class='image" + nomor + "' src='' id='image' height='100' width='100'></td>";

		//7
		baris += "<td>";
		baris += "<input required type='hidden' name='sub_totally[]' id='subtotal' class='subtotal" + nomor + "'>";
		baris += '<span></span>';
		baris += "</td>";

		//hapus
		baris += "<td><button  class='btn btn-danger' id='HapusBaris'><i class='fa fa-times' style='color:white;'></i></button></td>";
		baris += "</tr>";

		$('#tabeltransaksi').append(baris);
	}

</script>
