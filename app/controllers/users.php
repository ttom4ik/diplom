<?php
include "./app/database/db.php";

$errMsg = [];

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log']))
{
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email === '')
    {
        array_push( $errMsg, "Поле Email не може бути пустим!");
    } 
    elseif ($password === '')
    {
        array_push( $errMsg, "Поле пароль не може бути пустим!");
    } 
    else 
    {
        $existence = selectOne('public.user', ['email' => $email]);
        if ($existence &&  $password === $existence['password']){
            $_SESSION['id'] = $existence['id'];
            $_SESSION['teacher'] = $existence['is_teacher'];
            $_SESSION['admin'] = $existence['is_admin'];
            $_SESSION['name'] = $existence['name'];
            $_SESSION['surname'] = $existence['name'];
            $_SESSION['group'] = $existence['class'];
            $_SESSION['course'] = $existence['course'];
            $_SESSION['choosenSubject'] = 0;
            $_SESSION['choosenStudent'] = 0;

            header('location: ' . "index.php");
        } 
        else 
        {
            array_push( $errMsg, "Пошта або пароль введені невірно!");
        }
    }
} else {
    $email = '';
}