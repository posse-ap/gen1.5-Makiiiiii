<?php
require('dbconnect.php');

$id = $_GET['id'];
$stmt = $db->query("SELECT area FROM areas WHERE id = $id");
$questions = array();

$stmtQuestions =  $db->query("SELECT * FROM questions WHERE area_id = $id");
$questions = $stmtQuestions->fetchAll();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="quizy.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quizy</title>
      
</head>

<body>
  <h1 class="quiz">
    <?php
      foreach ($stmt as $row) {
        echo $row['area'];
      }
    ?>
  </h1>
  
  <?php 
    foreach($questions as $question) {
  ?>
  <div class="quiz">
    <h3><span class="chimei"><?= $question["question_id"] ?>.この地名はなんて読む？</span></h3>
    <img src="./image/<?= $question["area_id"] . '-' . $question["question_id"] ?>.png">
    <ul>
      <?php
          $random = array(1, 2, 3);
          shuffle($random);
        for($j = 0; $j < 3; $j++){
      ?>
        <li class="list" id="<?= $question["question_id"] . "_" . $random[$j] ?>" onclick="judge(<?= $question['question_id'] . ',' . $random[$j]?>)"><?= $question["answer_$random[$j]"]?></li>
      <?php
        }
      ?>
    </ul>
    
    <div class="torf" id="<?= $question["question_id"] ?>">
      <p id="result<?= $question["question_id"] ?>"></p>
      <p id="resultText<?= $question["question_id"] ?>">正解は「<?= $question["answer_1"] ?>」です！</p>
    </div>
  </div>

  <?php
    }
  ?>

<script src="quizy.js"></script>
</body>
</html>