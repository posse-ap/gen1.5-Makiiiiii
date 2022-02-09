// 棒グラフ
var ctx = document.getElementById('barGraph');

var data = {
    labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30],
    datasets: [{
        data: [3, 5, 5, 3, 0, 0, 4, 2, 2, 8, 8, 2, 2, 1, 7, 4, 4, 3, 3, 3, 2, 2, 6, 2, 2, 1, 1, 1, 7, 8],
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
            }
        }]
    },
    plugins: {
        legend: false
    },
};

var ex_chart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
});