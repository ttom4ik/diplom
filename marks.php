<?php 
include "app/controllers/marks.php";
$studentMarks = selectAll('mark', ['student_id' => $_SESSION['id'], 'subject_id' => $_SESSION['choosenSubject']]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/mark2s.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php include("app/include/header.php"); ?>

    <div class="manage-posts container container-high">
    <h1>Оцінки</h1>
        <div class="row row-first">
            <div class="row-date">Дата</div>
            <div class="row-mark">Оцінка</div>
            <div class="row-description">Опис</div>
            <div class="row-delete"></div>
        </div>
        <?php foreach ($studentMarks as $mark): ?>
            <div class="row">
                <div class="row-date"><?=date_create($mark['date'])->Format('d-m-Y'); ?></div>
                <div class="row-mark"><?=$mark['mark']; ?></div>
                <div class="row-description"><?=$mark['description']; ?></div>
                <div class="row-delete"></div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>