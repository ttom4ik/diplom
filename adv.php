<?php 
include "app/controllers/users.php";
$group = $_SESSION['group'];
$ads = selectAllFromAdsWithUser('ads', 'user', $group);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/indexpage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php include("app/include/header.php"); ?>

    <div class="advertisments container container-high">
        <?php foreach (array_reverse($ads) as $ad): ?>
            <div class="adv advert">
                <div class="adv-right">
                    <div class="adv-right-text">
                        <h2><?=$ad['content']; ?></h2>
                    </div>
                    <div class="adv-description">
                        <span class="adv-hor-slash"> - </span>
                        <span class="adv-date"><?=date_create($ad['date'])->Format('d-m-Y'); ?></span>
                        <span class="adv-vert-slash"> | </span>
                        <span class="adv-author"><?=$ad['surname']; ?> <?=mb_substr($ad['name'], 0, 1, 'UTF-8') . '.'; ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>