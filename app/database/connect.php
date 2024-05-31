<?php

$driver = 'mysql';
$host = 'localhost';
$db_name = 'diplom';
$db_user = 'root';
$db_pass = 'mysql';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try {
    $pdo = new PDO("pgsql:host=diplom-database.cvo2w8ei0391.us-east-1.rds.amazonaws.com;port=5432;dbname=diplom;user=postgres;password=543621cfif");
}catch (PDOException $i){
    die("Помилка підключення до бази даних");
}