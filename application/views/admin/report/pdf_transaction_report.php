<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Laporan Transaksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<style>
	#transaction {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#transaction td, #transaction th {
  border: 1px solid #ddd;
  padding: 8px;
}

#transaction tr:nth-child(even){background-color: #f2f2f2;}

#transaction tr:hover {background-color: #ddd;}

#transaction th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #0077b6;
  color: white;
  
}

.text-notes {
	margin-top: 10px
}
</style>
<body>
    <div class="mt-4">
        <h3 class="alert alert-success" style="text-align: center;">Transaction Report</h3>
		<?php if(empty($start_date) && empty($end_date)) { ?>
			<p>Period : All</p>
		<?php } else { ?>
			<p>Period : <?= date('d-m-Y', strtotime($start_date)) ?> until <?= date('d-m-Y', strtotime($end_date)) ?></p>
		<?php } ?>
        <table class="table table-bordered mt-3" id="transaction">
            <thead>
                <tr>
					<th>No</th>
					<th>Code</th>
					<th>Customer</th>
					<th>Date</th>
					<th>Total Qty</th>
					<th>Total Transaction</th>
					<th>Discount</th>
					<th>Total Payment</th>
					<th>Payment Methods</th>
                </tr>
            </thead>
            <tbody>
				<?php 
				$no = 1;
				foreach($transaction as $value) { ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $value->code_trans ?></td>
						<td><?= $value->name_customer ?></td>
						<td><?= date('d-m-Y', strtotime($value->date_trans)) ?></td>
						<td><?= $value->totally_qty ?></td>
						<td><?= 'Rp. '. number_format($value->transaction_total,0,',','.') ?></td>
						<td><?= 'Rp. '. number_format($value->discount,0,',','.') ?></td>
						<td><?= 'Rp. '. number_format($value->totally_payment,0,',','.') ?></td>
						<td><?= $value->payment_name ?></td>
					</tr>
				<?php } ?>
            </tbody>
        </table>
        <div class="row" style="margin-top: 30px">
            <div class="col-md-6">
                <div class="row">
					<div class="col-md-2">Transaction Amount &nbsp;&nbsp;&nbsp;&nbsp;:  <?= $transaction_amount ?></div>
					<div class="text-notes col-md-2 mt-3">Transaction Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= 'Rp. '. number_format($transaction_total,0,',','.') ?></div>
					<div class="text-notes col-md-2 mt-3">Transaction Discount &nbsp;&nbsp;&nbsp;: <?= 'Rp. '. number_format($transaction_discount,0,',','.') ?></div>
					<div class="text-notes col-md-2 mt-3">Transaction Payment &nbsp;&nbsp;&nbsp;&nbsp;: <?= 'Rp. '. number_format($transaction_payment,0,',','.') ?></div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
