<?php

    header('Access-Control-Allow-Origin:*');
    header('Content-Type:application/json');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once '../../Db/db.php';
    include_once '../../HR/Models/Task.php';
    
    $db = new dbConnection();
    $Task = new Task($db->connect());

    $data = json_decode(file_get_contents("php://input"));

    $Task->id = $data->Id;

    $Task->Activate();
    echo json_encode("ok");

    return json_encode("ok");
