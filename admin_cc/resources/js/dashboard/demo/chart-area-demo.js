document.addEventListener('DOMContentLoaded', function() {
    console.log('The chart area file is connected successfully.');
    drawChart();
    window.addEventListener('resize', drawChart);
});

function drawChart() {
    const canvas = document.getElementById('myAreaChart');
    const ctx = canvas.getContext('2d');

    // Set the canvas size to match the container size
    canvas.width = canvas.parentElement.clientWidth;
    canvas.height = canvas.parentElement.clientHeight;

    // Sample data
    const data = [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000];
    const labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    // Chart dimensions
    const width = ctx.canvas.width;
    const height = ctx.canvas.height;
    const padding = 40;

    // Calculate max value for scaling
    const maxValue = Math.max(...data);

    // Clear the canvas
    ctx.clearRect(0, 0, width, height);

    // Draw the area chart
    ctx.beginPath();
    ctx.moveTo(padding, height - padding);

    data.forEach((value, index) => {
        const x = padding + (index * (width - 2 * padding) / (data.length - 1));
        const y = height - padding - (value / maxValue * (height - 2 * padding));
        ctx.lineTo(x, y);
    });

    ctx.lineTo(width - padding, height - padding);
    ctx.closePath();
    ctx.fillStyle = 'rgba(75, 192, 192, 0.2)';
    ctx.fill();

    // Draw the line
    ctx.beginPath();
    ctx.moveTo(padding, height - padding);

    data.forEach((value, index) => {
        const x = padding + (index * (width - 2 * padding) / (data.length - 1));
        const y = height - padding - (value / maxValue * (height - 2 * padding));
        ctx.lineTo(x, y);
    });

    ctx.strokeStyle = 'rgba(75, 192, 192, 1)';
    ctx.stroke();

    // Draw X-axis labels
    ctx.fillStyle = '#000';
    ctx.textAlign = 'center';
    labels.forEach((label, index) => {
        const x = padding + (index * (width - 2 * padding) / (labels.length - 1));
        const y = height - padding + 20;
        ctx.fillText(label, x, y);
    });

    // Draw Y-axis labels and lines
    ctx.textAlign = 'right';
    const yAxisLabels = [0, maxValue / 4, maxValue / 2, (3 * maxValue) / 4, maxValue];
    yAxisLabels.forEach((label, index) => {
        const y = height - padding - (index * (height - 2 * padding) / (yAxisLabels.length - 1));
        ctx.fillText(label.toFixed(0), padding - 10, y + 3);

        // Draw horizontal line
        ctx.beginPath();
        ctx.moveTo(padding, y);
        ctx.lineTo(width - padding, y);
        ctx.strokeStyle = 'rgba(200, 200, 200, 0.5)';
        ctx.stroke();
    });
}
