<?php

session_start();
require('connect.php');

function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}

function dbCheckError($query){
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
} 

function selectAll($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if (!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'" . $value . "'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);

    return $query->fetchAll();
}

function selectOne($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if (!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'" . $value . "'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }

    // tt($sql);
    // exit();

    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);

    return $query->fetch();
}

// $params = [
//     'name' => 'Олександр',
//     'is_teacher' => 0
// ];

// // tt(selectAll('user', $params));
// tt(selectOne('user'));

function insert($table, $params){
    global $pdo;
    $i = 0;
    $coll = '';
    $mask = '';
    foreach($params as $key => $value){
        if ($i === 0){
            $coll = $coll . "$key";
            $mask = $mask . "'" . "$value" . "'";
        }else{
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value" . "'";
        }
        $i++;
    }
    
    $sql = "INSERT INTO $table ($coll) VALUES ($mask);";
    
    $pdo->query($sql);
    
    // $query = $pdo->prepare($sql);
    // $query->execute($params);
    // dbCheckError($query);
}
// function insert($table, $params){
//     global $pdo;
//     $i = 0;
//     $coll = '';
//     $mask = '';
//     foreach($params as $key => $value){
//         if ($i === 0){
//             $coll = $coll . "$key";
//             $mask = $mask . "'" . "$value" . "'";
//         }else{
//             $coll = $coll . ", $key";
//             $mask = $mask . ", '" . "$value" . "'";
//         }
//         $i++;
//     }
    
//     $sql = "INSERT INTO $table ($coll) VALUES ($mask);";
//     echo $sql;
    
//     $query = $pdo->prepare($sql);
//     $query->execute($params);
//     dbCheckError($query);
// }

function update($table, $id, $params){
    global $pdo;
    $i = 0;
    $str = '';
    foreach($params as $key => $value){
        if ($i === 0){
            $str = $str . $key . " = '" . $value . "'";
        }else{
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }
    
    $sql = "UPDATE $table SET $str WHERE id = $id";

    $pdo->query($sql);
    // $query = $pdo->prepare($sql);
    // $query->execute($params);
    // dbCheckError($query);
}

function delete($table, $id){
    global $pdo;
    
    $sql = "DELETE FROM $table WHERE id = $id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

// $arrData = [
//     'is_teacher' => '0',
//     'password' => '1111'
// ];

// update('user', 9, $arrData);

function selectAllFromPostWithUser ($table1, $table2)
{
    global $pdo;
    $sql = "SELECT t1.id, t1.title, t1.img, t1.content, t1.date, t2.name, t2.surname FROM $table1 AS t1 join $table2 AS t2 on t1.user_id = t2.id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

function selectAllFromAdsWithUser ($table1, $table2, $group)
{
    global $pdo;
    $sql = "SELECT t1.*, t2.name, t2.surname FROM $table1 AS t1 join $table2 AS t2 on t1.user_id = t2.id WHERE t1.purpose = \"$group\"";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

function selectAllFromAdsForUser ($table1, $table2, $user)
{
    global $pdo;
    $sql = "SELECT t1.*, t2.name, t2.surname FROM $table1 AS t1 join $table2 AS t2 on t1.user_id = t2.id WHERE t1.user_id = \"$user\"";
    echo $sql;
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
// function selectAllFromAdsForUser ($table1, $table2, $user)
// {
//     global $pdo;
//     $sql = "SELECT t1.*, t2.name, t2.surname FROM $table1 AS t1 join $table2 AS t2 on t1.user_id = t2.id WHERE t1.user_id = \"$user\"";
//     $query = $pdo->prepare($sql);
//     $query->execute();
//     dbCheckError($query);
//     return $query->fetchAll();
// }