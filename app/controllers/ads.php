<?php

include "./path.php";
include SITE_ROOT . "/app/database/db.php";

if (!$_SESSION){
    header('location' . SITE_ROOT . 'log.php');
}

$errMsg = [];
$id = '';
$content = '';
$purpose = '';

$user = $_SESSION['id'];
$ads = selectAllFromAdsForUser('ads', 'public.user', $user);

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ad-create']))
{
    $content = trim($_POST['ad-content']);
    $purpose = trim($_POST['ad-purpose']);

    if ($purpose === '' || $content === '')
    {
        array_push( $errMsg, "Не всі поля заповнені!");
    } 
    elseif (mb_strlen($content, 'UTF8') < 12)
    {
        array_push( $errMsg, "Оголошення повинно бути більше 12 символів!");
    } 
    else
    {
        $post = [
            'user_id' => $_SESSION['id'],
            'purpose' => $purpose,
            'content' => $content
        ];
        $post = insert('ads', $post);
        header('location: ' . "manageads.php");
    }
} else {
    $id = '';
    $purpose = '';
    $content = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']))
{
    $ad = selectOne('ads', ['id' => $_GET['id']]);
    $id = $ad['id'];
    $content = $ad['content'];
    $purpose = $ad['purpose'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ad-edit']))
{
    $id = $_POST['id'];
    $content = trim($_POST['ad-content']);
    $purpose = trim($_POST['ad-purpose']);

    if ($purpose === '' || $content === '')
    {
        array_push( $errMsg, "Не всі поля заповнені!");
    } 
    elseif (mb_strlen($content, 'UTF8') < 12)
    {
        array_push( $errMsg, "Оголошення повинно бути більше 12 символів!");
    } 
    else
    {
        $post = [
            'user_id' => $_SESSION['id'],
            'purpose' => $purpose,
            'content' => $content
        ];
        $post = update('ads', $id, $post);
        header('location: ' . "manageads.php");
    }
} 
else 
{
    $purpose = '';
    $content = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id']))
{
    $id = $_GET['del_id'];
    delete('ads', $id);
    header('location: ' . "manageads.php");
}
