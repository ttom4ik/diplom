<?php 
include "./app/controllers/ads.php";
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

    <div class="add-post container container-high">
        <h1>Створити оголошення</h1>
        <form action="addads.php" method="post" class="form-add-post" enctype="multipart/form-data">
            <label for="content">Вміст посту</label>
            <textarea class="post-content" name="ad-content" id="content"></textarea>
            <input name="ad-purpose" type="text" class="post-title" placeholder="Призначення посту (КВ-04)" aria-label="Назва посту">
            <br><?php include "./errorinfo.php"; ?>
            <button name="ad-create" type="" class="submit-btn">Додати пост</button>
        </form>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>