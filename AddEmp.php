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

    $User->username = $data->username;
    $User->password = $data->password;
    $User->phone_no = $data->phone;
    $User->email = $data->email;
    $User->availablity = "Available";
    $User->typeofuser = "Employee";
    $User->firstname = $data->firstname;
    $User->lastname = $data->lastname;
    $User->dateofbirth = $data->dateofbirth;
    $User->typeofid = $data->typeofid;
    $User->idnumber = $data->idnumber;
    $User->worktype = $data->worktype;
    $User->hourlywage = (int)$data->hourlywage;


    $last = $User->Post();
    $arr = array(
        "id"=>$last
    );
    
    echo json_encode($arr);

    return $arr;
