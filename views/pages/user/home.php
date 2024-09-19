<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>



<h1>ITS HOME PAGE</h1>

<?php print_r($_SESSION); ?>

<br><br>

<?php print_r($AllEntity); ?>

<td><a href="item.php?id=3">Подробнее</a></td>

<form action="/deleteEntity" method="post">
    <input type="hidden" name="id" value="4">
    <button type="submit">Удалить</button>
</form>

<br><br>
<form action="/logout" method="post">
    <button type="submit">Выход</button>
</form> <br>

</body>
</html>