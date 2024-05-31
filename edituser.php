<?php 
include "./app/controllers/useradmin.php";
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

    <div class="add-post container container-high">
        <h1>Створити оголошення</h1>
        <form action="adduser.php" method="post" class="form-add-post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$id; ?>">
            <input name="user-name" value="<?=$user['name']; ?>" type="text" class="post-title" placeholder="Ім'я" aria-label="Назва посту">
            <input name="user-surname" value="<?=$user['surname']; ?>" type="text" class="post-title" placeholder="Прізвище" aria-label="Назва посту">
            <input name="user-course" value="<?=$user['course']; ?>" type="text" class="post-title" placeholder="Група" aria-label="Назва посту">
            <input name="user-group" value="<?=$user['class']; ?>" type="text" class="post-title" placeholder="Група" aria-label="Назва посту">
            <input name="user-email" value="<?=$user['email']; ?>" type="text" class="post-title" placeholder="Email" aria-label="Назва посту">
            <input name="user-pass" type="text" class="post-title" placeholder="Пароль" aria-label="Назва посту">
            <div class="checkboxes">
                <label for="teacherCheckbox" class="checkbox">Вчитель</label>
                <input type="checkbox" name="user-teacher" id="teacherCheckbox" value="1">
                <label for="adminCheckbox" class="checkbox">Адмін</label>
                <input type="checkbox" name="user-admin" id="adminCheckbox" value="1">
                <br><?php include "./errorinfo.php"; ?>
            </div>
            <button name="user-edit" type="" class="submit-btn">Зберегти</button>
        </form>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>