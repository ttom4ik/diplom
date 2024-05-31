<?php 
include "app/controllers/useradmin.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/managepost1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php include("app/include/header.php"); ?>

    <div class="manage-posts container container-high">
        <a href="adduser.php"><button name="button-add" class="button-add">Додати</button></a>
        <h1>Редагування користувачів</h1>
        <div class="row row-first">
            <div class="row-id">ID</div>
            <div class="row-group">Група</div>
            <div class="row-name">Прізвище та ім'я</div>
            <div class="row-role">Роль</div>
            <div class="row-manage">Управління</div>
        </div>
        <?php foreach ($users as $key => $post): ?>
        <div class="row">
            <div class="row-id"><?=$post['id']; ?></div>
            <div class="row-group"><?=$post['class']; ?></div>
            <div class="row-name"><?=$post['surname']; ?> <?=$post['name']; ?></div>
            <?php if ($post['is_admin'] == 1): ?>
                <div class="row-role">Адмін</div>
            <?php elseif ($post['is_teacher'] == 1): ?>
                <div class="row-role">Викладач</div>
            <?php else: ?>
                <div class="row-role">Студент</div>
            <?php endif; ?>
            <div class="row-edit"><a href="edituser.php?id=<?=$post['id'] ;?>">Редагувати</a></div>
            <div class="row-del"><a href="edituser.php?del_id=<?=$post['id'] ;?>">Видалити</a></div>
        </div>
        <?php endforeach; ?>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>