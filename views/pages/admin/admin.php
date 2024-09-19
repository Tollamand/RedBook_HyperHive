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

<table border="2">
    <tr>
        <th>Имя</th>
        <th>Отчество</th>
        <th>Фамилия</th>
        <th>Телефон</th>
        <th>Майл</th>
        <th>Роль</th>
    </tr>
    <?php foreach ($AllUsers as $item): ?>
        <tr>
            <td><h2><?=$item['1']?></h2></td>
            <td><h2><?=$item['2']?></h2></td>
            <td><h2><?=$item['3']?></h2></td>
            <td><h2><?=$item['4']?></h2></td>
            <td><h2><?=$item['5']?></h2></td>
            <td><h2><?=$item['8']?></h2></td>
            <td>
                <form action="/deleteUser" method="post">
                    <input type="hidden" name="id" value="<?=$item['0']?>">
                    <button type="submit">Удалить</button>
                </form>
            </td>
            <td>
                <form action="/updateUser" method="post">
                    <input type="hidden" name="id" value="<?=$item['0']?>">
                    <input type="text" name="name" placeholder="имя" value="<?=$item['1']?>">
                    <input type="text" name="middle_name" placeholder="отчество" value="<?=$item['2']?>">
                    <input type="text" name="surname" placeholder="фамилия" value="<?=$item['3']?>">
                    <input type="number" name="phone" placeholder="телефон" value="<?=$item['4']?>">
                    <input type="text" name="email" placeholder="почта" value="<?=$item['5']?>">
                    <select name="role">
                        <?php if ($item['8'] == "0") { ?>
                            <option selected="selected"><?= $item['8'] ?></option>
                            <option>1</option>
                        <?php } else { ?>
                            <option><?= $item['8'] ?></option>
                            <option>0</option>
                        <?php } ?>
                    </select>
                    <button type="submit">Обновить</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>



<form action="/addUser" method="post">
    <input type="text" name="name" placeholder="имя">
    <input type="text" name="middle_name" placeholder="отчество">
    <input type="text" name="surname" placeholder="фамилия">
    <input type="number" name="phone" placeholder="телефон">
    <input type="text" name="email" placeholder="почта">
    <select name="role">
        <option>0</option>
        <option>1</option>
    </select>
    <button type="submit">Добавить</button>
</form>
<br> <br>



</body>
</html>