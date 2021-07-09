<?php

    header('Access-Control-Allow-Origin:*');
    header('Content-Type:application/json');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once '../../Db/db.php';
    include_once '../../Employee/Models/Users.php';
    
    $db = new dbConnection();
    $User = new Users($db->connect());

    $data = json_decode(file_get_contents("php://input"));

    $User->street_name = $data->street_name;
    $User->unit = $data->unit;
    $User->city = $data->city;
    $User->province = $data->province;
    $User->zipcode = $data->zipcode;
    $User->user_id = $data->user_id;
    


    $User->AddAddress();
    
    echo json_encode("ok");

    return "Ok";
