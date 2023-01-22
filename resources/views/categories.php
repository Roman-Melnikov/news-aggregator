<?php include_once "menu.php" ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Категории</title>
</head>
<body>
<h2>Категории</h2>
</body>
</html>
<?php foreach ($categories as $category): ?>
    <p>
        <a href="<?= \route('categories.one', $category['id']) ?>"><?= $category['name'] ?></a>
    </p>
<?php endforeach; ?>
