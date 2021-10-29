<?php
require('dbconnect.php');

$stmt = $db->query("SELECT * FROM studylog");
$sql = $stmt->fetchAll();


$todayTimeStmt = $db->query("SELECT sum(study_time) as sum_study_time FROM studylog WHERE DATE_FORMAT(study_date, '%Y%m%d')=20210901");
$todayStudyTime = $todayTimeStmt->fetch();

$monthTimeStmt = $db->query("SELECT sum(study_time) as sum_study_time FROM studylog WHERE DATE_FORMAT(study_date, '%Y%m')=202109");
$monthStudyTime = $monthTimeStmt->fetch();

$totalTimeStmt = $db->query("SELECT sum(study_time) as sum_study_time FROM studylog");
$totalStudyTime = $totalTimeStmt->fetch();

// 学習コンテンツのグラフ
$contentsStmt = $db->query("SELECT content, sum(study_time) as sum_study_time from studylog WHERE DATE_FORMAT(study_date, '%Y%m')=202109 group by content");
$contents = $contentsStmt->fetchall();

// 学習言語のグラフ
$languagesStmt = $db->query("SELECT programming_language, sum(study_time) as sum_study_time from studylog WHERE DATE_FORMAT(study_date, '%Y%m')=202109 group by programming_language");
$languages = $languagesStmt->fetchall();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POSSE</title>
  
  <!-- BootstrapのCSS読み込み -->
  <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
  <!-- jQuery読み込み -->
  <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
  <!-- BootstrapのJS読み込み -->
  <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->

  <!-- flatpickrの読み込み -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
  <link href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
  <link rel="stylesheet" href="POSSE.css">
</head>

<body>
  
  <header>
    <img src="./img/posseLogo.png" alt="">
      <p class="four">4th week</p>
      <div class="post" id="post">
          <p>記録・投稿</p>
      </div>
  </header>

  <!-- ポップアップ -->
  <div class="popup" id="js-popup">
    <div class="popup-inner" id="popup-inner">
      <div class="close-btn" id="js-close-btn"><i class="fas fa-times"></i></div>
      <div class="modal" id="modal">
        <div class="modalL"> 
          <div>
            <label for="study-date">学習日</label>
            <!-- <input type="date" id="study-date" name="study-date"> -->
            <input class="flatpickr" type="text" readonly="readonly" id="study-date" name="study-date">
          </div>
          <h1>学習コンテンツ（複数選択可)</h1>
            <div class="study-content">
              <div>
              <label class="study-content-label">
                <input class="SCL-Input" type="checkbox">
                <span class="SCL-DummyInput">
                </span>
                <span class="SCL-LabelText">
                  N予備校
                </span>
              </label>
            </div>
            <div>
              <label class="study-content-label">
                <input class="SCL-Input" type="checkbox">
                  <span class="SCL-DummyInput">
                  </span>
                  <span class="SCL-LabelText">
                    ドットインストール
                  </span>
              </label>
            </div>
            <div>
              <label class="study-content-label">
                <input class="SCL-Input" type="checkbox">
                  <span class="SCL-DummyInput">
                  </span>
                  <span class="SCL-LabelText">
                    POSSE課題
                  </span>
              </label>
            </div>
          </div><!--study-content-->

          <h1>学習言語（複数選択可)</h1>
          <div class="study-content">
            <div id="SCL" onclick="back()">
            <label class="study-content-label">
              <input class="SCL-Input" type="checkbox">
                <span class="SCL-DummyInput">
                </span>
                <span class="SCL-LabelText">
                  HTML
                </span>
            </label>
          </div>
          <div>
            <label class="study-content-label">
              <input class="SCL-Input" type="checkbox">
                <span class="SCL-DummyInput">
                </span>
                <span class="SCL-LabelText">
                  CSS
                </span>
            </label>
          </div>
          <div>
            <label class="study-content-label">
              <input class="SCL-Input" type="checkbox">
                <span class="SCL-DummyInput">
                </span>
                <span class="SCL-LabelText">
                  JavaScript
                </span>
            </label>
          </div>
          <div>
            <label class="study-content-label">
              <input class="SCL-Input" type="checkbox">
                <span class="SCL-DummyInput">
                </span>
                <span class="SCL-LabelText">
                  PHP
                </span>
            </label>
          </div>
          <div>
            <label class="study-content-label">
              <input class="SCL-Input" type="checkbox">
                <span class="SCL-DummyInput">
                </span>
                <span class="SCL-LabelText">
                  Laravel
                </span>
            </label>
          </div>
          <div>
            <label class="study-content-label">
              <input class="SCL-Input" type="checkbox">
                <span class="SCL-DummyInput">
                </span>
                <span class="SCL-LabelText">
                  SQL
                </span>
            </label>
          </div>
          <div>
            <label class="study-content-label">
              <input class="SCL-Input" type="checkbox">
                <span class="SCL-DummyInput">
                </span>
                <span class="SCL-LabelText">
                  SHELL
                </span>
            </label>
          </div>
          <div>
            <label class="study-content-label">
              <input class="SCL-Input" type="checkbox">
                <span class="SCL-DummyInput">
                </span>
                <span class="SCL-LabelText">
                  情報システム基礎知識
                </span>
            </label>
          </div>
        </div><!--study-content-->

        </div>
        <div class="modalR">

          <div>
            <label for="study-hour">学習時間</label>
            <input type="text" id="study-hour" name="study-hour">
          </div>
          <div>
            <label for="comment">Twitter用コメント</label>
            <input type="text" id="comment" name="comment">
          </div>
          
          <div>
            <label class="T-study-content-label">
              <input class="T-SCL-Input" type="checkbox">
                <span class="T-SCL-DummyInput">
                </span>
                <span class="T-SCL-LabelText">
                  Twitterにシェアする
                </span>
            </label>
          </div>
        </div>
      </div>
      <div class="modal-post" id="modal-post" onclick="gotoAwesome()">
        <p>記録・投稿</p>
      </div>
      
      <div class="awesome-page" id="awesome-page">
        <p class="awesome">AWESOME!</p>
        <div class="checked">
          <p class="checked-p"></p>
        </div>
        <p>
          記録・投稿<br>
          完了しました
        </p>
      </div>
    </div>

    <div class="black-background" id="js-black-bg"></div>
    
  </div>
  
  <!-- カレンダーのポップアップ -->
  <!-- なぜかこれを表示させようとするとトップページのグラフが消える！！！ -->
<!-- <div class="popup" id="new-js-popup">
  <div class="popup-inner">
    <div class="close-btn" id="new-js-close-btn"><i class="fas fa-times"></i></div>
    <div>
      <iframe src="https://calendar.google.com/calendar/embed?height=500&amp;wkst=1&amp;bgcolor=%23039BE5&amp;ctz=Asia%2FTokyo&amp;src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;src=amEuamFwYW5lc2UjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%2333B679&amp;color=%230B8043&amp;showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0" style="border:solid 1px #777" width="500" height="500" frameborder="0" scrolling="no"></iframe>
    </div>
  </div>
  <div class="black-background-T" id="new-js-black-bg"></div>
</div> -->
  
  <div class="container">
    <div class="pc">
      <div class="pcLeft">
        <div class="three">
          <div class="today">
            <h1 class="period">Today</h1>
            <p class="figure">
              <?= $todayStudyTime["sum_study_time"] ?>
            </p>
            <p class="hour">hour</p>
          </div>

          <div class="month">
            <h1 class="period">Month</h1>
            <p class="figure">
              <?= $monthStudyTime["sum_study_time"] ?>
            </p>
            <p class="hour">hour</p>
          </div>

          <div class="total">
            <h1 class="period">Total</h1>
            <p class="figure">
              <?= $totalStudyTime["sum_study_time"] ?>
            </p>
            <p class="hour">hour</p>
          </div>
        </div><!--three-->

        <div class="graph">
          <!-- <img src="./img/graph.png" alt=""> -->
          <div class="gct_sample_column" id="gct_sample_column"></div>
        </div>
      </div><!--pcLeft-->

      <div class="circle">
        <div class="language">
          <h1>学習言語</h1>
          <!-- <img src="./img/language.png" alt=""> -->
          <div id="piechart1"></div>
          <ul class="lang-list">
            <?php
              for($i = 0; $i < 9; $i++){
            ?>
              <li class="lang-list<?= $i+1 ?>"><?= $languages[$i]["programming_language"] ?></li>
            <?php 
              }
            ?>
          </ul>
        </div>


        <div class="content">
          <h1>学習コンテンツ</h1>
          <!-- <img src="./img/content.png" alt=""> -->
          <div id="piechart2"></div>
          <ul class="cont-list">
            <?php
              for($i = 0; $i < 3; $i++){
            ?>
              <li class="cont-list<?= $i+1 ?>"><?= $contents[$i]["content"] ?></li>
            <?php 
              }
            ?>
          </ul>
        </div>
      </div><!--circle-->

    </div><!--pc-->

    <div class="change">
      <div>
        <p>2020年 10月</p>
      </div>
    </div>

    <div class="postSP" id="postSP">
      <p>記録・投稿</p>
    </div>

  </div><!--container-->

  <script>
    //「flatpickr」の読み込み
    flatpickr('.flatpickr');
</script>
<!-- Google Chart API -->
  <script src="https://www.gstatic.com/charts/loader.js"></script>

  <script src="POSSE.php"></script>
</body>
</html>