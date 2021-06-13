<?php

    header('Access-Control-Allow-Origin:*');
    header('Content-Type:application/json');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once '../../Db/db.php';
    include_once '../../Employee/Models/Bank.php';
    
    $db = new dbConnection();
    $bank = new Bank($db->connect());

    $data = json_decode(file_get_contents("php://input"));

    $bank->bank_name = $data->bank_name;
    $bank->typeofaccount = $data->typeofaccount;
    $bank->transit_number = $data->transit_number;
    $bank->institude_number = $data->institude_number;
    $bank->account_no = $data->account_no;

    $bank->Update();
    echo json_encode("ok");

    return json_encode("ok");