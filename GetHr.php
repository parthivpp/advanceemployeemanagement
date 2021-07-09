<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');

include_once '../../Db/db.php';
include_once '../../Employee/Models/Users.php';

$db = new dbConnection();
$user = new Users($db->connect());

$result = $user->GetAllHr();

$arr =  array();

foreach($result as $row)
{
    $item = array(
        'id' => $row['Id'],
        'username'=>$row['username'],
        'password'=>$row['password'],
        'phone_no'=>$row['phone_no'],
        'email' =>$row['email'],
        'availability'=>$row['availability'],
        'typeofuser'=>$row['typeofuser'],
        'firstname' =>$row['firstname'],
        'lastname'=>$row['lastname'],
        'dateofbirth'=>$row['dateofbirth'],
        'typeofid'=>$row['typeofid'],
        'idnumber'=>$row['idnumber'],
        'worktype'=>$row['worktype'],
        'hourlywage'=>$row['hourlywage']
    );

    array_push($arr,$item);
}

echo json_encode($arr);
return $arr;