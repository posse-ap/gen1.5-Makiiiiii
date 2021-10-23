<?php
require('dbconnect.php');

$stmt = $db->query("SELECT * FROM studylog");

$sql = $stmt->fetchAll();

// print_r($sql);

// $studyTime = $db->query("SELECT study_time FROM studylog where study_date = DATE(NOW())");

$todayTimeStmt = $db->query("SELECT sum(study_time) as sum_study_time FROM studylog WHERE DATE_FORMAT(study_date, '%Y%m%d')=20210905");
$todayStudyTime = $todayTimeStmt->fetch();

$monthTimeStmt = $db->query("SELECT sum(study_time) as sum_study_time FROM studylog WHERE DATE_FORMAT(study_date, '%Y%m')=202109");
$monthStudyTime = $monthTimeStmt->fetch();

$totalTimeStmt = $db->query("SELECT sum(study_time) as sum_study_time FROM studylog");
$totalStudyTime = $totalTimeStmt->fetch();

// $graphTimeStmt = $db->query("SELECT study_time from studylog where study_date = (SELECT study_date FROM studylog WHERE DATE_FORMAT(study_date, '%Y%m')=202109 GROUP BY study_date) as study_date_group");
// $graphTime = $graphTimeStmt->fetchAll();

// print_r($graphTime);
?>

/**
 * PCのポップアップ
 * @popupImage 
*/

function popupImage() {
  var popup = document.getElementById('js-popup');
  if(!popup) return;

  var blackBg = document.getElementById('js-black-bg');
  var closeBtn = document.getElementById('js-close-btn');
  var showBtn = document.getElementById('post');
  var showBtnSP = document.getElementById('postSP');

  closePopUp(blackBg);
  closePopUp(closeBtn);
  closePopUp(showBtn);
  function closePopUp(elem) {
    if(!elem) return;
    elem.addEventListener('click', function() {
      popup.classList.toggle('is-show');
    });
  }
  
  // スマホ版対応
  closePopupSP(showBtnSP);
  function closePopupSP(elem) {
    if(!elem) return;
    elem.addEventListener('click', function() {
      popup.classList.toggle('is-show');
    });
  }
}
popupImage();


/**
 * モーダルの中身
 * @gotoAwesome 
*/
function gotoAwesome() {
  document.getElementById('modal').style.display="none";
  document.getElementById('modal-post').style.display="none";
  document.getElementById('awesome-page').style.display="block";
}


/**
 * かれんだーの中身
 * @newPopupImage
*/
function newPopupImage() {
  var newPopup = document.getElementById('new-js-popup');
  if(!newPopup) return;
  
  var blackBg = document.getElementById('new-js-black-bg');
  var closeBtn = document.getElementById('new-js-close-btn');
  var showBtn = document.getElementById('study-date');
  
  closePopUp(blackBg);
  closePopUp(closeBtn);
  closePopUp(showBtn);
  function closePopUp(elem) {
    if(!elem) return;
    elem.addEventListener('click', function() {
      newPopup.classList.toggle('is-show');
    });
  }
  popup.style.display ="none";
  popup.classList.add('popupNone');
}
newPopupImage();

/**
 * 学習コンテンツチェック時
 * @back
*/
function back() {
  document.getElementById('SCL').classList.add('backchange');
  
};

/**
 * 棒グラフ
*/
google.load("visualization", "1", {packages:["corechart"]});

google.setOnLoadCallback(
  function() {
    var data = google.visualization.arrayToDataTable([
      [       '', 'time'],
      <?php
        
      ?>

      ['1',     <?= $todayStudyTime["sum_study_time"]?>],
      ['2',     4],
      ['3',      5],
      ['4',     3],
      ['5',     0],
      ['6',     0],
      ['7',     4],
      ['8',     2],
      ['9',     2],
      ['10',     8],
      ['11',     8],
      ['12',     2],
      ['13',     2],
      ['14',     1],
      ['15',     7],
      ['16',     4],
      ['17',     4],
      ['18',     3],
      ['19',     3],
      ['20',     3],
      ['21',     2],
      ['22',     2],
      ['23',     6],
      ['24',     2],
      ['25',     2],
      ['26',     1],
      ['27',     1],
      ['28',     1],
      ['29',     7],
      ['30',     8],
    ]);

    var options = {
      lineWidth: 4, pointSize: 6,
      hAxis:{
        gridlines:{color: 'none', count:10},
        baselineColor: 'none',
        textStyle:{color: 'deepskyblue'},
        maxTextLines:1,
      },
      vAxis:{
        minValue:0,
        gridlines:{color: 'none', count:3},
        baselineColor: 'none',
        format: '#h',
        textStyle:{color: 'deepskyblue'},
      },
      width: '100%',
      height: '100%',
      colors:['#3ccfff'],
      legend: { position: 'none'} 
    }
    var chart = new google.visualization.ColumnChart(document.getElementById('gct_sample_column'));
    chart.draw(data,options);
  }
);

/**
 * 棒グラフ
*/
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(langDrawChart);

function langDrawChart() {

    var langData = google.visualization.arrayToDataTable([ //グラフデータの指定
        ['Language', 'Hours'],
        ['JavaScript',  10],
        ['CSS',      20],
        ['PHP', 5],
        ['HTML',     30],
        ['Laravel',    5],
        ['SQL',    20],
        ['SHELL',    20],
        ['その他',    10]
    ]);

    var langOptions = { //オプションの指定
        legend: { position: 'none'},
        pieHole: 0.5,
        chartArea: {width: '90%', height: '90%'},
        colors:['#0345EC', '#0F71BD','#20BDDE','#3CCEFE','#B29EF3','#4A17EF','#3105C0','#190030'],

        hAxis:{
              textPosition: 'none',
        },
    };

    var chart1 = new google.visualization.PieChart(document.getElementById('piechart1')); //グラフを表示させる要素の指定
    chart1.draw(langData, langOptions);
}

/**
 * 学習コンテンツのグラフ
*/
google.setOnLoadCallback(contDrawChart);
function contDrawChart() {

  var contData = google.visualization.arrayToDataTable([ //グラフデータの指定
      ['Contents', 'Hours'],
      ['ドットインストール',      20],
      ['N予備校',     40],
      ['課題',  40],
  ]);

  var contOptions = { //オプションの指定
      legend: { position: 'none'},
      pieHole: 0.5,
      chartArea: {width: '90%', height: '90%'},
      colors:['#0345EC', '#0F71BD','#20BDDE'],

      hAxis:{
            textPosition: 'none',
      },
  };

  var chart2 = new google.visualization.PieChart(document.getElementById('piechart2')); //グラフを表示させる要素の指定
  chart2.draw(contData, contOptions);
}