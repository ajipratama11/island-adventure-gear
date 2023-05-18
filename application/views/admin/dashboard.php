<?php $this->load->view('partials/header.php'); ?>

<div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-primary fw-bold"><?= $title ?></h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Admin</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
	</ol>
	</div>

	<div class="row mb-3">
	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card h-100">
		<div class="card-body">
			<div class="row align-items-center">
			<div class="col mr-2">
				<div class="text-xs font-weight-bold text-uppercase mb-1">Transaction Total</div>
				<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $transaction_amount ?></div>
				<div class="mt-2 mb-0 text-muted text-xs">
				</div>
			</div>
			<div class="col-auto">
				<i class="fas fa-shopping-cart fa-2x text-primary"></i>
			</div>
			</div>
		</div>
		</div>
	</div>
	<!-- Earnings (Annual) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card h-100">
		<div class="card-body">
			<div class="row no-gutters align-items-center">
			<div class="col mr-2">
				<div class="text-xs font-weight-bold text-uppercase mb-1">Total Product</div>
				<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $product_amount ?></div>
				<div class="mt-2 mb-0 text-muted text-xs">
				</div>
			</div>
			<div class="col-auto">
				<i class="fas fa-cube fa-2x text-success"></i>
			</div>
			</div>
		</div>
		</div>
	</div>
	<!-- New User Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card h-100">
		<div class="card-body">
			<div class="row no-gutters align-items-center">
			<div class="col mr-2">
				<div class="text-xs font-weight-bold text-uppercase mb-1">Transaction Income</div>
				<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= 'Rp. '. number_format($transaction_total,0,',','.') ?></div>
				<div class="mt-2 mb-0 text-muted text-xs">
				</div>
			</div>
			<div class="col-auto">
				<i class="fas fa-money-bill-trend-up fa-2x text-info"></i>
			</div>
			</div>
		</div>
		</div>
	</div>
	<!-- Pending Requests Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card h-100">
		<div class="card-body">
			<div class="row no-gutters align-items-center">
			<div class="col mr-2">
				<div class="text-xs font-weight-bold text-uppercase mb-1">Total Customer</div>
				<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_customer ?></div>
				<div class="mt-2 mb-0 text-muted text-xs">
				</div>
			</div>
			<div class="col-auto">
				<i class="fas fa-users fa-2x text-warning"></i>
			</div>
			</div>
		</div>
		</div>
	</div>

	<!-- Area Chart -->
	<div class="col-xl-8 col-lg-12">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Chart Transaction</h6>
				<hr>
				<form method="get">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group ml-3">
								<label>Tahun</label>
								<?php if (empty($_GET['tahun'])) { ?>
									<select class="form-control" id="tahun" name="tahun">
										<option></option>
										<option value="2023">2023</option>
										<option value="2024">2024</option>
										<option value="2025">2025</option>
									</select>
								<?php } else { ?>
									<select class="form-control" id="tahun" name="tahun">
										<option></option>
										<option <?php if ($_GET['tahun'] == '2023') {
													echo "selected=\"selected\"";
												} ?>value="2023">2023</option>
										<option <?php if ($_GET['tahun'] == '2024') {
													echo "selected=\"selected\"";
												} ?> value="2024">2024</option>
										<option <?php if ($_GET['tahun'] == '2025') {
													echo "selected=\"selected\"";
												} ?> value="2025">2025</option>
									</select>
								<?php } ?>
							</div>
						</div>
						<div class="col-md-4" style="margin-top: 33px;">
							<button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
							<a href="<?= base_url('Owner') ?>" class="btn btn-primary"><i class="fa fa-refresh"></i> Refresh</a>
						</div>
					</div>
				</form>
			</div>
			<div class="card-body">
				<div class="chart-bar">
					<canvas id="ChartTransaction" height="250"></canvas>
				</div>
				<hr>
			</div>
		</div>
	</div>
	<!-- Pie Chart -->
		<div class="col-xl-4 col-lg-5">
			<div class="card mb-4">
				<?php foreach($payment_methods as $value) { ?>
					<div class="card h-100 mb-3">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-uppercase mb-1"><?= $value->payment_name ?></div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?= 'Rp. '. number_format($value->balance,0,',','.') ?></div>
									<div class="mt-2 mb-0 text-muted text-xs">
									</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-wallet fa-2x text-primary"></i>
								</div>
							</div>
						</div>
					</div>
					<hr>
				<?php } ?>
			</div>
		</div>
	</div>
	<!--Row-->

</div>

<?php $this->load->view('partials/footer.php'); ?>
<script>

	$('#tahun').select2({
		placeholder: 'Choose Years',
	});

	// Area Chart Example
var ctx = document.getElementById("ChartTransaction");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Earnings",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.5)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: <?= json_encode($transaction_chart) ?>,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rp. ' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
</script>
