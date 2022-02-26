// 学習言語ドーナツチャート

var languageChart= new Chart(language, {
    type: 'doughnut',
    data: {
        labels: languageNameArray, //データ項目のラベル
        datasets: [{
            backgroundColor: languageColorArray,
            data: languageData //グラフのデータ
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