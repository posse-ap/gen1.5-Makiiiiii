<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="stylesheet" href="quizy.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quizy</title>
</head>

<body>
    @foreach ($areas as $area)
        <h1 class="quiz">
            {{$area}}
        </h1>
    @endforeach



    <script src="quizy.js"></script>
</body>

</html>