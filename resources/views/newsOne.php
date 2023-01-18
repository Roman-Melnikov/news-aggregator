<?php include_once "menu.php"?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новость</title>
</head>
<body>
    <h2><?=$newsOne['title']?></h2>
<div>
    <p>
        <?=$newsOne['description']?>
    </p>
    <p>
        <span><?=$newsOne['author']?></span>
        <span><?=$newsOne['created_at']?></span>
    </p>
</div>
</body>
</html>
