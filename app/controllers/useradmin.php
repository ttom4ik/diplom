<?php

include "./path.php";
include SITE_ROOT . "/app/database/db.php";

if (!$_SESSION){
    header('location' . SITE_ROOT . 'log.php');
}

$errMsg = [];
$id = '';
$is_teacher = '';
$name = '';
$surname = '';
$group = '';
$email = '';
$pass = '';

$users = selectAll('public.user');

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user-create']))
{
    $name = trim($_POST['user-name']);
    $surname = trim($_POST['user-surname']);
    $course = trim($_POST['user-course']);
    $group = trim($_POST['user-group']);
    $email = trim($_POST['user-email']);
    $pass = trim($_POST['user-pass']);
    $teacher = isset($_POST['admin']) ? 1 : 0;
    $admin = isset($_POST['admin']) ? 1 : 0;
    

    if ($name === '' || $surname === ''|| $group === ''|| $email === ''|| $pass === '' || $course === '')
    {
        array_push( $errMsg, "Не всі поля заповнені!");
    } 
    else
    {
        $user = [
            'name' => $name,
            'surname' => $surname,
            'course' => $course,
            'class' => $group,
            'email' => $email,
            'password' => $pass,
            'is_teacher' => $teacher,
            'is_admin' => $admin
        ];
        $post = insert('public.user', $user);
        header('location: ' . "manageuser.php");
    }
} else {
    $name = '';
    $surname = '';
    $group = '';
    $email = '';
    $pass = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']))
{
    $user = selectOne('public.user', ['id' => $_GET['id']]);
    $teacher = $user['is_teacher'];
    $admin = $user['is_admin'];
    $id = $user['id'];
    $name = $user['name'];
    $surname = $user['surname'];
    $class = $user['class'];
    $course = $user['course'];
    $email = $user['email'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user-edit']))
{
    $id = $_POST['id'];
    $name = trim($_POST['user-name']);
    $surname = trim($_POST['user-surname']);
    $course = trim($_POST['user-course']);
    $group = trim($_POST['user-group']);
    $email = trim($_POST['user-email']);
    $pass = trim($_POST['user-pass']);
    $teacher = isset($_POST['teacher']) ? 1 : 0;
    $admin = isset($_POST['admin']) ? 1 : 0;

    if ($name === '' || $surname === ''|| $course === '' || $group === ''|| $email === '')
    {
        array_push( $errMsg, "Не всі поля заповнені!");
    } 
    elseif ($pass === '')
    {
        $user = [
            'name' => $name,
            'surname' => $surname,
            'course' => $course,
            'class' => $group,
            'email' => $email,
            'is_teacher' => $teacher,
            'is_admin' => $admin
        ];
        $post = update('public.user', $id, $user);
        header('location: ' . "manageuser.php");
    }
    else
    {
        $user = [
            'name' => $name,
            'surname' => $surname,
            'course' => $course,
            'class' => $group,
            'email' => $email,
            'password' => $pass,
            'is_teacher' => $teacher,
            'is_admin' => $admin
        ];
        $post = update('user', $id, $user);
        header('location: ' . "manageuser.php");
    }
} 
else 
{
    $name = '';
    $surname = '';
    $course = '';
    $group = '';
    $email = '';
    $pass = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id']))
{
    $id = $_GET['del_id'];
    delete('public.user', $id);
    header('location: ' . "manageuser.php");
}
