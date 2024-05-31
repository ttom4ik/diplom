<?php 
include "./app/controllers/posts.php";
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
        <h1>Редагування оголошень</h1>
        <form action="addpost.php" method="post" class="form-add-post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$id; ?>">
            <input name="post-title" value="<?=$post['title']; ?>" type="text" class="post-title" placeholder="Назва посту" aria-label="Назва посту">
            <label for="content">Вміст посту</label>
            <textarea class="post-content" name="post-content" id="content"><?=$post['content']; ?></textarea>
            <label class="input-file">
                <span class="input-file-text" type="text"></span>
                <input type="file" name="post-img">        
                <span class="input-file-btn">Завантажити файл</span>
            </label>
            <br><?php include "./errorinfo.php"; ?>
            <button name="post-edit" type="" class="submit-btn">Зберегти</button>
        </form>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>