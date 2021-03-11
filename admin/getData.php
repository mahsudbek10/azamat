<?php
//error_reporting(0);
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers");
header('Content-type: application/json');

require_once "../db/db.php";
$data = $_POST;
$jsonResponse['status'] = "failure";
if (isset($data['year'], $data['city'])){
    if($data['city']=="*"){
        $rezumes = R::getAll("SELECT * FROM azamat_rezume WHERE `year`=?",[$data['year']]);
        $vacancy = R::getAll("SELECT * FROM azamat_vacancy WHERE `year`=?",[$data['year']]);
    } else {
        $rezumes = R::getAll("SELECT * FROM azamat_rezume WHERE `id_city`=? AND `year`=?",[$data['city'],$data['year']]);
        $vacancy = R::getAll("SELECT * FROM azamat_vacancy WHERE `id_city`=? AND `year`=?",[$data['city'],$data['year']]);
    }
//    print_r($vacancy);
//    print_r($rezumes);
        
        $jsonResponse['rezumes_count']= count($rezumes);
    
        $jsonResponse['vacancy_count']= count($vacancy);
    $jsonResponse['status'] = "success";
//    if($ok){
//        $jsonResponse['status'] = "success";
//    }else $jsonResponse['status'] = "warning";
}

echo json_encode($jsonResponse, JSON_UNESCAPED_UNICODE);
