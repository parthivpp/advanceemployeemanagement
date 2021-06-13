<?php

    header('Access-Control-Allow-Origin:*');
    header('Content-Type:application/json');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once '../../Db/db.php';
    include_once '../../Employee/Models/Presence.php';
    
    $db = new dbConnection();
    $presence = new presence($db->connect());
    $data = json_decode(file_get_contents("php://input"));
    
    $presence->clock_out = date('Y-m-d-h-i-s');
    $presence->id = $data->Id;

    $last_id = $result=$presence->ClockOut();
     
    $arr =  array();

    $item = array(
        'id' => $last_id,
    );
    array_push($arr,$item);
    
    echo json_encode($arr);
    return json_encode($arr);

    