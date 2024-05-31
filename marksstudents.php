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
    <div class="manage-subjects manage-posts container container-high">
        <br><h1>Студенти</h1>
        <?php foreach ($students as $student): ?>
            <p><a href="marksteacher.php?student_id=<?=$student['id'] ;?>"><?=$student['class']; ?> <?=$student['surname']; ?> <?=$student['name']; ?></a></p>
        <?php endforeach; ?>
     </div>
    <?php include("app/include/footer.php"); ?>
</body>
</html>