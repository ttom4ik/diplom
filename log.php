<?php include "app/controllers/users.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/log.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php include("app/include/header.php"); ?>

    <div class="login container container-high">
        <form action="log.php" method="post" class="loginform">
            <label for="emailInput" class="form-label">Email:</label>
            <input name="email" value="<?=$email?>" type="text" class="form-control" id="emailInput" placeholder="Введіть ваш email...">
            <label for="passwordInput" class="form-label">Пароль:</label>
            <input name="password" type="password" class="form-control" id="passwordInput" placeholder="Введіть ваш пароль...">
            <br><?php include "./errorinfo.php"; ?>
            <button type="submit" name="button-log">Ввійти</button>
        </form>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>