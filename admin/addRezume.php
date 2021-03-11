<?php
//error_reporting(0);
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers");
header('Content-type: application/json');

require "../db/db.php";
$data = $_POST;
$jsonResponse['status'] = "failure";
if (isset($data['year'], $data['city'], $data['spec'], $data['company'], $data['about'])){
    $ok = R::exec("INSERT INTO azamat_rezume (`id_user`, `id_company`, `id_spec`, `id_city`, `year`, `description`) "
            . "VALUES (?,?,?,?,?,?)", 
            [1,$data['company'],$data['spec'],$data['city'],$data['year'],$data['about']]);
    if($ok){
        $jsonResponse['status'] = "success";
    }else $jsonResponse['status'] = "warning";
}

echo json_encode($jsonResponse, JSON_UNESCAPED_UNICODE);
