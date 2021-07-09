<?php

    header('Access-Control-Allow-Origin:*');
    header('Content-Type:application/json');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once '../../Db/db.php';
    include_once '../../Admin/Models/job.php';
    
    $db = new dbConnection();
    $job = new Job($db->connect());

    $data = json_decode(file_get_contents("php://input"));

    $job->job_title = $data->job_title;
    $job->job_desc = $data->job_desc;


    $job->Post();
    echo json_encode("ok");

    return json_encode("ok");
