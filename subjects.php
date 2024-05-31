<?php 
include "app/controllers/marks.php";
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

    <div class="manage-subjects container container-high">
    <form action="subjects.php" method="post" class="form-add-post" enctype="multipart/form-data">
        <?php if ($_SESSION['teacher']): ?>
            <h1>Перелік всіх предметів</h1>
            <?php foreach ($subjects as $subj): ?>
                <p><a href="marksstudents.php?subj_id=<?=$subj['id'] ;?>"><?=$subj['name']; ?></a></p>
            <?php endforeach; ?>
        <?php elseif ($_SESSION['course'] == 1): ?>
            <h1>Перелік всіх ваших предметів</h1>
            <p><a href="marks.php?subj_id=<?=$subjects[9]['id'] ;?>"><?=$subjects[9]['name']; ?></a></p>
            <p><a href="marks.php?subj_id=<?=$subjects[0]['id'] ;?>"><?=$subjects[0]['name']; ?></a></p>
            <p><a href="marks.php?subj_id=<?=$subjects[7]['id'] ;?>"><?=$subjects[7]['name']; ?></a></p>
            <p><a href="marks.php?subj_id=<?=$subjects[1]['id'] ;?>"><?=$subjects[1]['name']; ?></a></p>
        <?php elseif ($_SESSION['course'] == 2): ?>
            <h1>Перелік всіх ваших предметів</h1>
            <p><a href="marks.php?subj_id=<?=$subjects[8]['id'] ;?>"><?=$subjects[8]['name']; ?></a></p>
            <p><a href="marks.php?subj_id=<?=$subjects[4]['id'] ;?>"><?=$subjects[4]['name']; ?></a></p>
            <p><a href="marks.php?subj_id=<?=$subjects[12]['id'] ;?>"><?=$subjects[12]['name']; ?></a></p>
            <p><a href="marks.php?subj_id=<?=$subjects[10]['id'] ;?>"><?=$subjects[10]['name']; ?></a></p>
        <?php elseif ($_SESSION['course'] == 3): ?>
            <h1>Перелік всіх ваших предметів</h1>
            <p><a href="marks.php?subj_id=<?=$subjects[2]['id'] ;?>"><?=$subjects[2]['name']; ?></a></p>
            <p><a href="marks.php?subj_id=<?=$subjects[6]['id'] ;?>"><?=$subjects[6]['name']; ?></a></p>
            <p><a href="marks.php?subj_id=<?=$subjects[15]['id'] ;?>"><?=$subjects[15]['name']; ?></a></p>
            <p><a href="marks.php?subj_id=<?=$subjects[3]['id'] ;?>"><?=$subjects[3]['name']; ?></a></p>
        <?php elseif ($_SESSION['course'] == 4): ?>
            <h1>Перелік всіх ваших предметів</h1>
            <p><a href="marks.php?subj_id=<?=$subjects[11]['id'] ;?>"><?=$subjects[11]['name']; ?></a></p>
            <p><a href="marks.php?subj_id=<?=$subjects[5]['id'] ;?>"><?=$subjects[5]['name']; ?></a></p>
            <p><a href="marks.php?subj_id=<?=$subjects[13]['id'] ;?>"><?=$subjects[13]['name']; ?></a></p>
            <p><a href="marks.php?subj_id=<?=$subjects[14]['id'] ;?>"><?=$subjects[14]['name']; ?></a></p>
        <?php endif; ?>
    </form>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>