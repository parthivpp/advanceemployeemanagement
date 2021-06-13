<?php

    header('Access-Control-Allow-Origin:*');
    header('Content-Type:application/json');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once '../../Db/db.php';
    include_once '../../Employee/Models/Users.php';
    
    $db = new dbConnection();
    $user = new Users($db->connect());

    $data = json_decode(file_get_contents("php://input"));

    $user->phone_no = $data->phone_no;

    $user->UpdatePhone_no();
    echo json_encode("ok");

    return json_encode("ok");
