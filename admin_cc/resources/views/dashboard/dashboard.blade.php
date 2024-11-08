<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @vite(['resources/css/dashboard/dashboard.css'])

</head>
<body>
    @include('navbar.navbar')
    <div class="content">
        <h1>Dashboard</h1>

        <div class="dashboard-row">
            <div class="card">
                <h2>Sales Overview</h2>
                <div class="chart-container">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>

            <div class="card">
                <h2>Stock Levels</h2>
                <div class="chart-container">
                    <canvas id="stockChart"></canvas>
                </div>
            </div>
        </div>

        <div class="card">
            <h2>Order Requests</h2>
            <div class="chart-container">
                <canvas id="ordersChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        // Sales chart
        var salesCtx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May'],
                datasets: [{
                    label: 'Sales',
                    data: [120, 190, 300, 500, 200],
                    backgroundColor: 'rgba(255, 156, 52, 0.2)',
                    borderColor: '#ff9c34',
                    borderWidth: 2
                }]
            }
        });

        // Stock levels chart
        var stockCtx = document.getElementById('stockChart').getContext('2d');
        var stockChart = new Chart(stockCtx, {
            type: 'bar',
            data: {
                labels: ['Product A', 'Product B', 'Product C', 'Product D'],
                datasets: [{
                    label: 'Stock',
                    data: [50, 75, 150, 100],
                    backgroundColor: '#ff9c34',
                    borderColor: '#ff9c34',
                    borderWidth: 2
                }]
            }
        });

        // Order requests chart
        var ordersCtx = document.getElementById('ordersChart').getContext('2d');
        var ordersChart = new Chart(ordersCtx, {
            type: 'pie',
            data: {
                labels: ['Pending', 'Completed', 'Canceled'],
                datasets: [{
                    data: [10, 40, 5],
                    backgroundColor: ['#ff9c34', '#34a853', '#ea4335'],
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            }
        });
    </script>
</body>
</html>
