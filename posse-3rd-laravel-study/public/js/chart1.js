// 棒グラフ
var img = new Image();
img.src = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjUqqmOhoWxIfBnhEao_Qrq0rxVGphAarvbfPMWRw4y2NgxRd1ULVZi5pabDulps5WYXc&usqp=CAU';
img.onload = function() {

    var ctx = document.getElementById('barGraph').getContext('2d');
    var fillPattern = ctx.createPattern(img, 'repeat');

    var data = {
        labels: dateArray,
        datasets: [{
            data: timeArray,
            backgroundColor: fillPattern,
            borderRadius: 15,
        }],
    };
    
    var options = {
        scales: {
            y: {
                ticks: {
                    callback: function(value, index, values) {
                        return value + 'h'
                    },
                },
                grid: {
                    display: false,
                    drawBorder: false,
                }
                
            },
            x: {
                grid: {
                    display: false,
                    drawBorder: false,
                }
            }
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
};
