<?php

    header('Access-Control-Allow-Origin:*');
    header('Content-Type:application/json');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once '../../Db/db.php';
    include_once '../../Employee/Models/Users.php';
    
    $db = new dbConnection();
    $presence = new presence($db->connect());

    $presence->clock_in = date('Y-m-d-h-i-s');
    $presence->clock_out = NUll;
    

    $last_id = $result=$presence->ClockIn();
     
    $arr =  array();

    $item = array(
        'id' => $last_id,
    );
    array_push($arr,$item);
    
    echo json_encode($arr);
    return json_encode($arr);

    
