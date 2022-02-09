// 学習言語ドーナツチャート
var language = document.getElementById("language");
var languageChart= new Chart(language, {
    type: 'doughnut',
    data: {
        labels: ["HTML", "CSS", "JavaScript", "PHP", "Laravel", "SQL", "SHELL", "その他"], //データ項目のラベル
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
            data: [30, 20, 10, 5, 5, 20, 20, 10] //グラフのデータ
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