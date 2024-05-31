<?php 
include "app/controllers/posts.php";
$posts = array_reverse(selectAll('post'));
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

    <div class="slider container">
        <div class="slides">
            <input type="radio" name="r" id="r1" checked>
            <input type="radio" name="r" id="r2">
            <input type="radio" name="r" id="r3">
            <input type="radio" name="r" id="r4">

            <div class="slide s1"><img src="./assets/img/karysel1.JPG" alt=""></div>
            <div class="slide"><img src="./assets/img/karysel2.JPG" alt=""></div>
            <div class="slide"><img src="./assets/img/karysel3.JPG" alt=""></div>
            <div class="slide"><img src="./assets/img/karysel4.JPG" alt=""></div>

            <div class="navigation">
                <label for="r1" class="bar"></label>
                <label for="r2" class="bar"></label>
                <label for="r3" class="bar"></label>
                <label for="r4" class="bar"></label>
            </div>
        </div>
    </div>

    <div class="advertisments container">
        <div class="advertisments-header">
            <div class="adv-big">
                <img src="<?='assets/img/posts/' . $posts[0]['img']; ?>" alt="">
                <?php if (mb_strlen($posts[0]['title']) > 40): ?>
                    <h2><?=mb_substr($posts[0]['title'], 0, 40, 'UTF-8') . '...'; ?></h2>
                <?php else: ?>
                    <h2><?=$posts[0]['title']; ?></h2>
                <?php endif; ?>
                <?php if (mb_strlen($posts[0]['content']) > 120): ?>
                    <h2><?=mb_substr($posts[0]['content'], 0, 120, 'UTF-8') . '...'; ?></h2>
                <?php else: ?>
                    <h2><?=$posts[0]['content']; ?></h2>
                <?php endif; ?>
                <div class="adv-description">
                    <span class="adv-hor-slash"> - </span>
                    <span class="adv-date"><?=date_create($posts[0]['date'])->Format('d-m-Y'); ?></span>
                </div>
            </div>
            <div class="adv-side">
                <div class="adv-small">
                    <img src="<?='assets/img/posts/' . $posts[1]['img']; ?>" alt="">
                    <?php if (mb_strlen($posts[1]['title']) > 40): ?>
                    <h2><?=mb_substr($posts[1]['title'], 0, 40, 'UTF-8') . '...'; ?></h2>
                    <?php else: ?>
                        <h4><?=$posts[1]['title']; ?></h4>
                    <?php endif; ?>
                    <?php if (mb_strlen($posts[1]['content']) > 120): ?>
                        <h2><?=mb_substr($posts[1]['content'], 0, 120, 'UTF-8') . '...'; ?></h2>
                    <?php else: ?>
                        <h2><?=$posts[1]['content']; ?></h2>
                    <?php endif; ?>
                    <div class="adv-description">
                        <span class="adv-hor-slash"> - </span>
                        <span class="adv-date"><?=date_create($posts[1]['date'])->Format('d-m-Y'); ?></span>
                    </div>
                </div>
                <div class="adv-small">
                    <img src="<?='assets/img/posts/' . $posts[2]['img']; ?>" alt="">
                    <?php if (mb_strlen($posts[2]['title']) > 40): ?>
                    <h2><?=mb_substr($posts[2]['title'], 0, 40, 'UTF-8') . '...'; ?></h2>
                    <?php else: ?>
                        <h4><?=$posts[2]['title']; ?></h4>
                    <?php endif; ?>
                    <?php if (mb_strlen($posts[2]['content']) > 40): ?>
                        <h2><?=mb_substr($posts[2]['content'], 0, 40, 'UTF-8') . '...'; ?></h2>
                    <?php else: ?>
                        <h2><?=$posts[2]['content']; ?></h2>
                    <?php endif; ?>
                    <div class="adv-description">
                        <span class="adv-hor-slash"> - </span>
                        <span class="adv-date"><?=date_create($posts[2]['date'])->Format('d-m-Y'); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="adv">
            <img src="<?='assets/img/posts/' . $posts[3]['img']; ?>" alt="">
            <div class="adv-right">
                <div class="adv-right-text">
                    <?php if (mb_strlen($posts[3]['title']) > 40): ?>
                    <h2><?=mb_substr($posts[3]['title'], 0, 40, 'UTF-8') . '...'; ?></h2>
                    <?php else: ?>
                        <h4><?=$posts[3]['title']; ?></h4>
                    <?php endif; ?>
                    <?php if (mb_strlen($posts[3]['content']) > 120): ?>
                        <h2><?=mb_substr($posts[3]['content'], 0, 120, 'UTF-8') . '...'; ?></h2>
                    <?php else: ?>
                        <h2><?=$posts[3]['content']; ?></h2>
                    <?php endif; ?>
                </div>
                <div class="adv-description">
                    <span class="adv-hor-slash"> - </span>
                    <span class="adv-date"><?=date_create($posts[3]['date'])->Format('d-m-Y'); ?></span>
                </div>
            </div>
        </div>
        <div class="adv">
            <img src="<?='assets/img/posts/' . $posts[4]['img']; ?>" alt="">
            <div class="adv-right">
                <div class="adv-right-text">
                    <?php if (mb_strlen($posts[4]['title']) > 40): ?>
                    <h2><?=mb_substr($posts[4]['title'], 0, 40, 'UTF-8') . '...'; ?></h2>
                    <?php else: ?>
                        <h4><?=$posts[4]['title']; ?></h4>
                    <?php endif; ?>
                    <?php if (mb_strlen($posts[4]['content']) > 120): ?>
                        <h2><?=mb_substr($posts[4]['content'], 0, 120, 'UTF-8') . '...'; ?></h2>
                    <?php else: ?>
                        <h2><?=$posts[4]['content']; ?></h2>
                    <?php endif; ?>
                </div>
                <div class="adv-description">
                    <span class="adv-hor-slash"> - </span>
                    <span class="adv-date"><?=date_create($posts[4]['date'])->Format('d-m-Y'); ?></span>
                </div>
            </div>
        </div><div class="adv">
            <img src="<?='assets/img/posts/' . $posts[5]['img']; ?>" alt="">
            <div class="adv-right">
                <div class="adv-right-text">
                    <?php if (mb_strlen($posts[5]['title']) > 40): ?>
                    <h2><?=mb_substr($posts[5]['title'], 0, 40, 'UTF-8') . '...'; ?></h2>
                    <?php else: ?>
                        <h4><?=$posts[5]['title']; ?></h4>
                    <?php endif; ?>
                    <?php if (mb_strlen($posts[5]['content']) > 120): ?>
                        <h2><?=mb_substr($posts[5]['content'], 0, 120, 'UTF-8') . '...'; ?></h2>
                    <?php else: ?>
                        <h2><?=$posts[5]['content']; ?></h2>
                    <?php endif; ?>
                </div>
                <div class="adv-description">
                    <span class="adv-hor-slash"> - </span>
                    <span class="adv-date"><?=date_create($posts[5]['date'])->Format('d-m-Y'); ?></span>
                </div>
            </div>
        </div>
    </div>

    <?php include("app/include/footer.php"); ?>
</body>
</html>