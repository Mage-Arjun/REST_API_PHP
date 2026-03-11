<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
//initializing our API
include_once('../core/initialize.php');

//instantiate POST
$post = new Category($db);

//get raw posted data
$data = json_decode(file_get_contents("php://input"));
$post->name = $data->name;

//create category
if($post->create_category()){
    echo json_encode(array('message' => 'Category created.'));
}else{
    echo json_encode(array('message' => 'Category not created.'));
}

?>