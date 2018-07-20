<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
require "db.php";

function getAllContacts($con){
    $query = "SELECT * FROM `contacts`";
    $result = mysqli_query($con, $query);
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_close($con);
    echo json_encode([
        "data" => $rows
    ]);
}

function insertContact($con, $name, $email){
    $query = "INSERT INTO contacts VALUES(null,''"+$name+"','"+$email+"');";
    $result = mysqli_query($con, $query);
    mysqli_close($con);
    if ($result){
        return true;
    }else{
        return false;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    getAllContacts($con);
}else if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = file_get_contents('php://input');
    $obj = json_decode($data, true);
    echo json_encode($obj);
}

