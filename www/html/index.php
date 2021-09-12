<?php
require('dbconnect.php');

$id = $_GET['id'];
$stmt = $db->query("SELECT area FROM areas WHERE id = $id");

// print_r($stmt);

// $questions = $db->query("SELECT * FROM questions WHERE area_id = $id");

// print_r($questions);
// $jsonArray = json_encode($questions);

for($i = 0; $i < 11; $i++){
  $questions = $db->query("SELECT * FROM questions WHERE area_id = $id AND question_id = $i");
  print_r($questions);
}


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
      foreach ($questions as $question) {
        echo $question['answer_1'];
      }
  ?>

<script src="quizy.js"></script>
</body>
</html>