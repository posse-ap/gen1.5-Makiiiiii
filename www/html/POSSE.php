<?php
require('dbconnect.php');

// 棒グラフ（日ごとに時間を足してる）
$graphTimeStmt = $db->query("SELECT study_date, sum(study_time) as sum_study_time from studylog WHERE DATE_FORMAT(study_date, '%Y%m')=202109 group by study_date");
$graphTime = $graphTimeStmt->fetchall();

// 学習コンテンツのグラフ
$contentsStmt = $db->query("SELECT content, sum(study_time) as sum_study_time from studylog WHERE DATE_FORMAT(study_date, '%Y%m')=202109 group by content");
$contents = $contentsStmt->fetchall();

// 学習言語のグラフ
$languagesStmt = $db->query("SELECT programming_language, sum(study_time) as sum_study_time from studylog WHERE DATE_FORMAT(study_date, '%Y%m')=202109 group by programming_language");
$languages = $languagesStmt->fetchall();

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
        foreach ( $graphTime as $graph ) {
      ?>
        ['<?= substr($graph["study_date"],8,2) ?>', <?= $graph["sum_study_time"] ?>],
      <?php 
        }
      ?>
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
 * 学習言語のグラフ
*/
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(langDrawChart);

function langDrawChart() {

    var langData = google.visualization.arrayToDataTable([ //グラフデータの指定
        ['Language', 'Hours'],
        <?php
        foreach ($languages as $language) {
        ?>
          ['<?= $language["programming_language"] ?>', <?= $language["sum_study_time"] ?>],
        <?php 
          }
        ?>


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
      <?php
        foreach ( $contents as $content ) {
      ?>
        ['<?= $content["content"] ?>', <?= $content["sum_study_time"] ?>],
      <?php 
        }
      ?>
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