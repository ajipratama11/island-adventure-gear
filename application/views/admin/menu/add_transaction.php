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
					<form action="<?= base_url('Admin/save_transaction') ?>" method="POST" name="add_transaction">
						<div class="row">
							<div class="col-md-4">
								<label for="">Transaction Code</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><span class="fas fa-credit-card"></span> </span>
									</div>
									<input type="text" name="code_trans" id="code_trans" class="form-control code_trans" readonly>
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
								<label for="">Customer Name</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><span class="fas fa-user"></span> </span>
									</div>
									<input type="text" name="name_customer" id="customer" class="form-control customer" required>
								</div>
							</div>
							<div class="col-md-4">
								<label for="">Address</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><span class="fas fa-location-dot"></span> </span>
									</div>
									<input type="text" name="address_customer" id="address" class="form-control address" required>
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
								<h4 class="total" style="color: orange;">Transaction Total : <span id='total_transaksi2'>0</span> &nbsp; <span class='color-blue' style="color: blue;"> Payment Total : </ span><span id='total_pembayaran2'>0</span> </h4>
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
									<input type="number" name="discount" class="form-control discount" id='discount' required>
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

	$(function() {
		$("form[name='add_transaction']").validate({
			rules: {
				name_customer: {
					required: true
				},
				address_customer: {
					required: true
				},
				no_telp_customer: {
					required: true
				}
			},
			messages: {
				name_customer: {
					required: "customer name is required (customer name harus di isi)"
				},
				address_customer: {
					required: "address is required (address harus di isi)"
				},
				no_telp_customer: {
					required: "whatsapp is required (whatsapp harus di isi)"
				}
			},
			submitHandler: function(form) {
				form.submit();
			}
		});
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
                $('#code_trans').val(kd_trans);
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
        baris += "<input autocomplete='off' required  type='text' class='form-control product_name" + nomor + "' name='product_name[]'><input type='hidden' name='product_id[]' class='form-control product_id"+ nomor +"'>";
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

	function pencarian_produk(id, product_name, price, image, nomor) {
		$('.product_id' + nomor).val(id);
		$('.product_name' + nomor).val(product_name);
		$('.price' + nomor).val(price);
		$('.image' + nomor).attr('src', '<?php echo base_url('layouts/images/product/') ?>'+image);
        $('#listproduct').modal('hide');
	}

	$(document).on('keyup', '#qty', function() {
        var Indexnya = $(this).parent().parent().index();
        var Qty = $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input#qty').val();
        var Price = $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input#price').val();

        var SubTotal = parseInt(Price) * parseInt(Qty); 
		// - parseInt(Potongan);
        if (SubTotal > 0) {
            var SubTotalVal = SubTotal;
            SubTotal = to_rupiah(SubTotal);
        } else {
            SubTotal = '';
            var SubTotalVal = 0;
        }

        var SubTotal2 = parseInt(Price) * parseInt(Qty); 
		// - parseInt(Potongan);
        if (SubTotal2 > 0) {
            var SubTotalVal2 = SubTotal2;
            SubTotal2 = to_rupiah(SubTotal2);
        } else {
            SubTotal2 = '';
            var SubTotalVal2 = 0;
        }
        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(7) input#subtotal').val(SubTotalVal);
        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(7) span').html(SubTotal2);
        // console.log(SubTotal);
        // console.log(SubTotal2);
        HitungTotalBayar();
    })

    $(document).on('keyup', '#price', function() {
        var Indexnya = $(this).parent().parent().index();
        var Qty = $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input#qty').val();
        var Price = $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input#price').val();

        var SubTotal = parseInt(Price) * parseInt(Qty); 
		//- parseInt(Potongan);
        if (SubTotal > 0) {
            var SubTotalVal = SubTotal;
            SubTotal = to_rupiah(SubTotal);
        } else {
            SubTotal = '';
            var SubTotalVal = 0;
        }

        var SubTotal2 = parseInt(Price) * parseInt(Qty); 
		//- parseInt(Potongan);
        if (SubTotal2 > 0) {
            var SubTotalVal2 = SubTotal2;
            SubTotal2 = to_rupiah(SubTotal2);
        } else {
            SubTotal2 = '';
            var SubTotalVal2 = 0;
        }
        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(7) input#subtotal').val(SubTotalVal);
        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(7) span').html(SubTotal2);
        // console.log(SubTotal);
        // console.log(SubTotal2);
        HitungTotalBayar();
    })

	function HitungTotalBayar() {
        var Total = 0;
        var TotalTransaksi = 0;
        $('#tabeltransaksi tbody tr').each(function() {
            if ($(this).find('td:nth-child(7) input#subtotal').val() > 0) {
                var SubTotal = $(this).find('td:nth-child(7) input#subtotal').val();
                Total = parseInt(Total) + parseInt(SubTotal);
            }
        });

        $(document).on('keyup', '#discount', function() {
            var diskon = $('input#discount').val();
            // var potongan = $('input#inputPotongan').val();
            var total_pembayaran = 0;


            total_pembayaran = parseInt(total_pembayaran) + parseInt(Total) - parseInt(diskon);

            // console.log('kembalian', kembalian)
            $('#total_pembayaran').val(total_pembayaran);
            $('#total_pembayaran2').html(to_rupiah(total_pembayaran));

        })
        $('#total_transaksi').val(Total);
        $('#total_transaksi2').html(to_rupiah(Total));

        // $('#TotalOngkir').val(TotalOngkos);
        //$('#TotalDiskon').val(TotalDiskon);

        $('#terbilang').val(sayit(Total));


    }

	function to_rupiah(angka) {
        var rev = parseInt(angka, 10).toString().split('').reverse().join('');
        var rev2 = '';
        for (var i = 0; i < rev.length; i++) {
            rev2 += rev[i];
            if ((i + 1) % 3 === 0 && i !== (rev.length - 1)) {
                rev2 += '.';
            }
        }
        return rev2.split('').reverse().join('');
    }

    var thoudelim = ".";
    var decdelim = ",";
    var curr = "Rp ";
    var d = document;

    function format(s, r) {
        s = Math.round(s * Math.pow(10, r)) / Math.pow(10, r);
        s = String(s);
        s = s.split(".");
        var l = s[0].length;
        var t = "";
        var c = 0;
        while (l > 0) {
            t = s[0][l - 1] + (c % 3 == 0 && c != 0 ? thoudelim : "") + t;
            l--;
            c++;
        }
        s[1] = s[1] == undefined ? "0" : s[1];
        for (i = s[1].length; i < r; i++) {
            s[1] += "0";
        }
        return curr + t + decdelim + s[1];
    }

    function threedigit(word) {
        eja = Array("Nol", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan");
        while (word.length < 3) word = "0" + word;
        word = word.split("");
        a = word[0];
        b = word[1];
        c = word[2];
        word = "";
        word += (a != "0" ? (a != "1" ? eja[parseInt(a)] : "Se") : "") + (a != "0" ? (a != "1" ? " Ratus" : "ratus") : "");
        word += " " + (b != "0" ? (b != "1" ? eja[parseInt(b)] : "Se") : "") + (b != "0" ? (b != "1" ? " Puluh" : "puluh") : "");
        word += " " + (c != "0" ? eja[parseInt(c)] : "");
        word = word.replace(/Sepuluh ([^ ]+)/gi, "$1 Belas");
        word = word.replace(/Satu Belas/gi, "Sebelas");
        word = word.replace(/^[ ]+$/gi, "");

        return word;
    }

    function sayit(s) {
        var thousand = Array("", "Ribu", "Juta", "Milyar", "Trilyun");
        s = Math.round(s * Math.pow(10, 2)) / Math.pow(10, 2);
        s = String(s);
        s = s.split(".");
        var word = s[0];
        var cent = s[1] ? s[1] : "0";
        if (cent.length < 2) cent += "0";

        var subword = "";
        i = 0;
        while (word.length > 3) {
            subdigit = threedigit(word.substr(word.length - 3, 3));
            subword = subdigit + (subdigit != "" ? " " + thousand[i] + " " : "") + subword;
            word = word.substring(0, word.length - 3);
            i++;
        }
        subword = threedigit(word) + " " + thousand[i] + " " + subword;
        subword = subword.replace(/^ +$/gi, "");

        word = (subword == "" ? "NOL" : subword.toUpperCase()) + " RUPIAH";
        subword = threedigit(cent);
        cent = (subword == "" ? "" : " ") + subword.toUpperCase() + (subword == "" ? "" : " SEN");
        return word + cent;
    }
</script>
