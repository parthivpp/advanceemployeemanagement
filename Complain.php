<?php

    header('Access-Control-Allow-Origin:*');
    header('Content-Type:application/json');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once '../../Db/db.php';
    include_once '../../Employee/Models/Complains.php';
    
    $db = new dbConnection();
    $Complain = new Complain($db->connect());

    $data = json_decode(file_get_contents("php://input"));

    $Complain->complain = $data->complain;
    $Complain->complain_for = $data->complain_for;


    $Complain->Post();
    echo json_encode("ok");

    return json_encode("ok");
