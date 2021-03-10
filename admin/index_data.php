<?php

//error_reporting(0);
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers");
header('Content-type: application/json');

require "./db/db.php";
$data = $_POST;
$jsonResponse['status'] = "failure";
if (isset($data['year'], $data['city'])){
    $ok = R::getAll("SELECT * FROM azamat", [$data['email']]);
    if(!$ok){
        $ok = R::exec("INSERT INTO `subscribe` (`email`) VALUES (?);", [$data['email']]);
        $jsonResponse['status'] = "success";
    }else 
    $jsonResponse['status'] = "warning";
}

echo json_encode($jsonResponse, JSON_UNESCAPED_UNICODE);