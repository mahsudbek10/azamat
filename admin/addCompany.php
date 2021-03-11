<?php
//error_reporting(0);
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers");
header('Content-type: application/json');

require "../db/db.php";
$data = $_POST;
$jsonResponse['status'] = "failure";
if (isset($data['name'], $data['city'], $data['gos'], $data['ch'])){
    $type = ($data['gos']==true) ? 2 : 1;
    $ok = R::exec("INSERT INTO azamat_company (`name`, `id_city`, `type`) VALUES (?,?,?)", [$data['name'],$data['city'],$type]);
    if($ok){
        $jsonResponse['status'] = "success";
    }else $jsonResponse['status'] = "warning";
}

echo json_encode($jsonResponse, JSON_UNESCAPED_UNICODE);
