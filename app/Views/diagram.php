<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2">Diagram</h4>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Diagram Penjualan</h4>
            </div>
            <div class="card-body">
                <canvas id="bar2"></canvas>
            </div>
        </div>
        <!--/ Responsive Table -->
    </div>
</div>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Diagram Pengeluaran</h4>
            </div>
            <div class="card-body">
                <canvas id="bar3"></canvas>
            </div>
        </div>
        <!--/ Responsive Table -->
    </div>
</div>

<script src="<?= base_url('assets/extensions/chart.js/chart.umd.js')?>"></script>
<script src="<?= base_url('assets/static/js/pages/ui-chartjs.js')?>"></script>
<script>
// PHP code for generating chart data and labels
<?php
    // Initialize an array to hold the total nominal for each month
$monthTotals = array_fill(1, 12, 0);

// Loop through $data['nt'] to accumulate the total nominal for each month
foreach ($nt as $data) {
    $month = date('n', strtotime($data->create_date1)); // Extract month as a number (1-12)
    $monthTotals[$month] += $data->nominal; // Accumulate total nominal for the month
}

// Convert the totals to a simple array for the chart data
$chartData = array_values($monthTotals);

// Labels for the chart
$chartLabels = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    ?>

// Find the maximum value in your chart data
var maxChartData = Math.max(...<?= json_encode($chartData) ?>);

// Calculate a suitable step size based on the maximum value
var stepSize = Math.ceil(maxChartData / 5); // Adjust the divisor as needed

var ctxBar = document.getElementById("bar2").getContext("2d");
var myBar = new Chart(ctxBar, {
    type: "bar",
    data: {
        labels: <?= json_encode($chartLabels) ?>,
        datasets: [{
            label: "Jumlah Pendapatan",
            backgroundColor: "blue",
            data: <?= json_encode($chartData) ?>,
        }],
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    stepSize: stepSize,
                    callback: function(value, index, ticks) {
                        return value.toLocaleString();
                    }
                },
            }],
        },
    },
});
</script>

<script>
// PHP code for generating chart data and labels
<?php
    // Initialize an array to hold the total nominal for each month
$monthTotals = array_fill(1, 12, 0);

// Loop through $data['nt'] to accumulate the total nominal for each month
foreach ($out as $data) {
    $month = date('n', strtotime($data->create_date1)); // Extract month as a number (1-12)
    $monthTotals[$month] += $data->jumlah; // Accumulate total nominal for the month
}

// Convert the totals to a simple array for the chart data
$chartData = array_values($monthTotals);

// Labels for the chart
$chartLabels = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    ?>

// Find the maximum value in your chart data
var maxChartData = Math.max(...<?= json_encode($chartData) ?>);

// Calculate a suitable step size based on the maximum value
var stepSize = Math.ceil(maxChartData / 5); // Adjust the divisor as needed

var ctxBar = document.getElementById("bar3").getContext("2d");
var myBar = new Chart(ctxBar, {
    type: "bar",
    data: {
        labels: <?= json_encode($chartLabels) ?>,
        datasets: [{
            label: "Jumlah Pengeluaran",
            backgroundColor: "blue",
            data: <?= json_encode($chartData) ?>,
        }],
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    stepSize: stepSize,
                    callback: function(value, index, ticks) {
                        return value.toLocaleString();
                    }
                },
            }],
        },
    },
});
</script>