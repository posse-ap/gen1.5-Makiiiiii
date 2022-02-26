// 学習コンテンツドーナツチャート
var contentsChart= new Chart(contents, {
    type: 'doughnut',
    data: {
        labels: contentNameArray, //データ項目のラベル
        datasets: [{
            backgroundColor: contentColorArray,
            data: contentData//グラフのデータ
        }]
    },
    options: {
        title: {
            display: false,
        },
        datalabels: {
            color: '#000',
            font: {
                weight: 'bold',
                size: 20,
            },
            formatter: (value, ctx) => {
                return value + '%';
            },
        },
        plugins: {
        legend: false
        },
    }
});