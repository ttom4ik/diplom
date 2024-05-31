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

$subjects = selectAll('subject');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['subj_id']))
{
    $_SESSION['choosenSubject'] = $_GET['subj_id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['student_id']))
{
    $_SESSION['choosenStudent'] = $_GET['student_id'];
}

if ($_SESSION['choosenSubject'] < 5)
{
    $students = selectAll('public.user', ['course' => 1]);
}
elseif ($_SESSION['choosenSubject'] < 9)
{
    $students = selectAll('public.user', ['course' => 2]);
}
elseif ($_SESSION['choosenSubject'] < 13)
{
    $students = selectAll('public.user', ['course' => 3]);
}
elseif ($_SESSION['choosenSubject'] < 17)
{
    $students = selectAll('public.user', ['course' => 4]);
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mark-create']))
{
    $mark = trim($_POST['mark-mark']);
    $description = trim($_POST['mark-description']);
    
    if ($mark === '' || $description === '')
    {
        array_push( $errMsg, "Не всі поля заповнені!");
    } 
    else
    {
        $marks = [
            'mark' => $mark,
            'description' => $description,
            'teacher_id' => $_SESSION['id'],
            'student_id' => $_SESSION['choosenStudent'],
            'subject_id' => $_SESSION['choosenSubject']
        ];
        $post = insert('mark', $marks);
    }
} else {
    $mark = '';
    $description = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id']))
{
    $id = $_GET['delete_id'];
    delete('mark', $id);
    header('location: ' . "marksteacher.php");
}