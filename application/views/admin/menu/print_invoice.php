<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
</head>
<style>
	table {
	max-width: 95%;
	max-height: 100%;
}
body {
	padding: 5px;
	position: relative;
	width: 100%;
	height: 100%;
}
table th,
table td {
	padding: .625em;
  text-align: center;
}
table .kop:before {
	content: ': ';
}
.left {
	text-align: left;
}
table #caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}
table.border {
  width: 100%;
  border-collapse: collapse
}

table.border tbody th, table.border tbody td {
  border: thin solid #000;
  padding: 2px
}
.ttd td, .ttd th {
	padding-bottom: 4em;
}

.button-cetak {
	margin-top: 50px;
}

@media print {

.hidden-print,
.hidden-print * {
	display: none !important;
}

.hidden-back,
.hidden-back * {
	display: none !important;
}
}
</style>
<body>
<div id="printable" class="container">
<table border="0" cellpadding="0" cellspacing="0" width="485" class="border" style="overflow-x:auto;">
  <thead>
  <tr>
    <td colspan="6" width="485" id="caption">Island Adventure Gear</td>
  </tr>
  <tr>
    <td colspan="2">Nama Customer</td>
    <td class="left kop"><?= $value->name_customer ?></td>
  </tr>
  <tr>
    <td colspan="2">Alamat</td>
    <td class="left kop"><?= $value->address_customer ?></td>
  </tr>
  <tr>
    <td colspan="2">Nomor Whatsapp</td>
    <td class="left kop"><?= $value->no_telp_customer ?></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  </thead>
  <tbody>
    <tr>
      <th>No</th>
      <th>NAMA PRODUK</th>
      <th>QTY</th>
      <th>HARGA</th>
      <th colspan="2">SUB TOTAL</th>
    </tr>
	<?php $no = 1; 
	foreach($product_trans as $val) { ?>
    <tr>
		<td align="right"><?= $no++ ?></td>
		<td><?= $val->product_name ?></td>
		<td><?= $val->qty ?></td>
		<td><?= 'Rp. ' . number_format($val->price,0,',','.') ?></td>
		<td colspan="2"><?= 'Rp. ' . number_format($val->sub_totally,0,',','.') ?></td>
    </tr>
	<?php } ?>
    <tr>
      <th colspan="3"> TOTAL</th>
      <td colspan="3"><?= 'Rp. '. number_format($value->transaction_total,0,',','.') ?></td>
      <!-- <td colspan="2"></td> -->
    </tr>
  </tbody>
</table>
<div class="button-cetak">
	<button id="btnPrint" class="hidden-print">Cetak</button>
	<a href="<?= base_url('Admin/transaction') ?>" class="hidden-back">Kembali</a>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
	const $btnPrint = document.querySelector("#btnPrint");
    $btnPrint.addEventListener("click", () => {
        window.print();
    });
</script>
</body>

</html>
