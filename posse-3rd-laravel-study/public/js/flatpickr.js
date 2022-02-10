//「flatpickr」の読み込み
flatpickr('.flatpickr');


// 日付を表示
const calToday = new Date();

let calYear = calToday.getFullYear();
let calMonth = calToday.getMonth();
let calDate = calToday.getDate();

function dateText(year, month, date) {
    return `${year}-${month + 1}-${date}`;
}

document.getElementById('study-date').value = dateText(calYear, calMonth, calDate);