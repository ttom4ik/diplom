<?php

include "./path.php";
include SITE_ROOT . "/app/database/db.php";

if (!$_SESSION){
    header('location' . SITE_ROOT . 'log.php');
}

$errMsg = [];
$id = '';
$title = '';
$content = '';
$img = '';

$posts = selectAll('post');
$postAdm = selectAllFromPostWithUser('post', 'public.user');

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post-create']))
{
    $title = trim($_POST['post-title']);
    $content = trim($_POST['post-content']);

    if ($title === '' || $content === '')
    {
        array_push( $errMsg, "Не всі поля заповнені!");
    } 
    elseif (mb_strlen($title, 'UTF8') < 7)
    {
        array_push( $errMsg, "Назва посту повинна бути більше 7 символів!");
    } 
    elseif (empty($_FILES['post-img']['name']))
    {
        array_push( $errMsg, "Завантажте зображення!");
    }
    else
    {
        $imgName = time() . "_" . $_FILES['post-img']['name'];
        $fileTmpName = $_FILES['post-img']['tmp_name'];
        $fileType = $_FILES['post-img']['type'];
        $destination = ROOT_PATH . "\assets\img\posts\\" . $imgName;

        if (strpos($fileType, 'image') === false)
        {
            array_push( $errMsg, "Файл не є зображенням!");
        }
        else
        {
            $result = move_uploaded_file($fileTmpName, $destination);

            if ($result)
            {
                $_POST['post-img'] = $imgName;
                $post = [
                    'user_id' => $_SESSION['id'],
                    'title' => $title,
                    'content' => $content,
                    'img' => $_POST['post-img']
                ];
                $post = insert('post', $post);
                header('location: ' . "managepost.php");
            } 
            else
            {
                array_push( $errMsg, "Помилка завантаження зображення на сервер!");
            }
        }
    }
} else {
    $id = '';
    $title = '';
    $content = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']))
{
    $post = selectOne('post', ['id' => $_GET['id']]);
    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post-edit']))
{
    $id = $_POST['id'];
    $title = trim($_POST['post-title']);
    $content = trim($_POST['post-content']);

    if ($title === '' || $content === '')
    {
        array_push( $errMsg, "Не всі поля заповнені!");
    } 
    elseif (mb_strlen($title, 'UTF8') < 7)
    {
        array_push( $errMsg, "Назва посту повинна бути більше 7 символів!");
    } 
    elseif (empty($_FILES['post-img']['name']))
    {
        $post = [
            'user_id' => $_SESSION['id'],
            'title' => $title,
            'content' => $content
        ];
        $post = update('post', $id, $post);
        header('location: ' . "managepost.php");
    }
    else
    {
        $imgName = time() . "_" . $_FILES['post-img']['name'];
        $fileTmpName = $_FILES['post-img']['tmp_name'];
        $fileType = $_FILES['post-img']['type'];
        $destination = ROOT_PATH . "\assets\img\posts\\" . $imgName;

        if (strpos($fileType, 'image') === false)
        {
            array_push( $errMsg, "Файл не є зображенням!");
        }
        else
        {
            $result = move_uploaded_file($fileTmpName, $destination);

            if ($result)
            {
                $_POST['post-img'] = $imgName;
                $post = [
                    'user_id' => $_SESSION['id'],
                    'title' => $title,
                    'content' => $content,
                    'img' => $_POST['post-img']
                ];
                $post = update('post', $id, $post);
                header('location: ' . "managepost.php");
            } 
            else
            {
                array_push( $errMsg, "Помилка завантаження зображення на сервер!");
            }
        }
    }
} 
else 
{
    $title = '';
    $content = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id']))
{
    $id = $_GET['del_id'];
    delete('post', $id);
    header('location: ' . "managepost.php");
}
