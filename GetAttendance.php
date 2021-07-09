<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');

include_once '../../Db/db.php';
include_once '../../Employee/Models/Presence.php';
include_once '../../Employee/Models/Users.php';

$db = new dbConnection();
$presence = new presence($db->connect());
$Users = new Users($db->connect());
$result = $presence->GetAttendance();
$result2 = $Users->GetAll();
$arr =  array();
$users = array();
$attendance = array();
foreach($result2 as $row)
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

    array_push($users,$item);
}
foreach($result as $row)
{
    $item = array(
        'id' => $row['Id'],
        'clock_in'=>$row['clock_in'],
        'clock_out'=>$row['clock_out'],
        'user_id'=>$row['user_id'],
        'approved'=>$row['approved'],
    );

    array_push($attendance,$item);
}

foreach($users as $row){
    foreach($attendance as $row2){
        if($row2['user_id'] == $row['id']){
            $item = [
                "id"=>$row2['id'],
                "username"=>$row["username"],
                "clock_in"=>$row2["clock_in"],
                "clock_out"=>$row2["clock_out"]
            ];

            array_push($arr,$item);
        }
    }
}


echo json_encode($arr);
return $arr;