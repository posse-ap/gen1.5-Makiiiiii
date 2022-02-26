// 棒グラフ
var ctx = document.getElementById('barGraph');

var data = {
    labels: dateArray,
    datasets: [{
        data: timeArray,
        backgroundColor: '#39CAFB',
        borderRadius: 15,
    }],
};

var options = {
    scales: {
        yAxes: [{
            ticks: {
                callback: function(value, index, values) {
                    return value + 'h'
                }

            },
            drawBorder: false,
            gridLines: {
                display: false,
                drawBorder: false,
            }
        }],
        yAxes: [{
            gridLines: {
                drawBorder: false,
                display: false,
            },
            ticks: {
                min: 0, 
            }
        }]
    },
    plugins: {
        legend: false
    }
};

var ex_chart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
});