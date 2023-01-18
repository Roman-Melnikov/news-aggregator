<?php include_once "menu.php" ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости категории</title>
</head>
<body>
<h2><?= $name ?></h2>
<?php foreach ($categoryNews as $item): ?>
    <div>
        <p>
            <a href="<?=route('news.one', $item['id'])?>"><?= $item['title'] ?></a>
        </p>
    </div>
<?php endforeach; ?>
</body>
</html>
