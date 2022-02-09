// 学習コンテンツドーナツチャート
var language = document.getElementById("contents");
var contentsChart= new Chart(contents, {
    type: 'doughnut',
    data: {
        labels: ["N予備校", "ドットインストール", "課題"], //データ項目のラベル
        datasets: [{
            backgroundColor: [
                "#0445EC",
                "#0D72BD",
                "#1EBEDE",
                "#3CCEFE",
                "#B29EF3",
                "#6D46EC",
                "#6D46EC",
                "#4A17EF"
            ],
            data: [40, 20, 40] //グラフのデータ
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