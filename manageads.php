<?php 
include "app/controllers/ads.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/manageads.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php include("app/include/header.php"); ?>

    <div class="manage-posts container container-high">
        <a href="addads.php"><button name="button-add" class="button-add">Додати пост</button></a>
        <h1>Редагування постів</h1>
        <div class="row row-first">
            <div class="row-id">ID</div>
            <div class="row-name">Вміст</div>
            <div class="row-manage">Управління</div>
        </div>
        <?php foreach ($ads as $key => $post): ?>
        <div class="row">
            <div class="row-id"><?=$key + 1; ?></div>
            <div class="row-name">
                <?php if (mb_strlen($post['content']) > 50): ?>
                    <?=mb_substr($post['content'], 0, 50, 'UTF-8') . '...'; ?>
                <?php else: ?>
                    <?=$post['content']; ?>
                <?php endif; ?>
            </div>
            <div class="row-edit"><a href="editads.php?id=<?=$post['id'] ;?>">Редагувати</a></div>
            <div class="row-del"><a href="editads.php?del_id=<?=$post['id'] ;?>">Видалити</a></div>
        </div>
        <?php endforeach; ?>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>