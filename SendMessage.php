<?php

    header('Access-Control-Allow-Origin:*');
    header('Content-Type:application/json');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once '../../Db/db.php';
    include_once '../../Admin/Models/Message.php';
    
    $db = new dbConnection();
    $message = new Messages($db->connect());

    $data = json_decode(file_get_contents("php://input"));

    $message->message_for = $data->for;
    $message->message = $data->message;


    $message->SendMessage();
    echo json_encode("ok");

    return json_encode("ok");
