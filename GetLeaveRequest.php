<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');

include_once '../../Db/db.php';
include_once '../../Employee/Models/Users.php';
include_once '../../Employee/Models/LeaveApplication.php';

$db = new dbConnection();
$user = new Users($db->connect());
$LOA = new LeaveOfApplication($db->connect());

$result = $user->GetAllUsers();
$result2 = $LOA->GetLeaves();
$arr =  array();
$users = array();
$leaves = array();

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

    array_push($users,$item);
}
foreach($result2 as $row){
        $item =[
            "id"=>$row['id'],
            "user_id"=>$row['user_id'],
            "dateofleave_from"=>$row['dateofleave_from'],
            "dateofleave_to"=>$row['dateofleave_to']
        ];
        array_push($leaves,$item);
}

foreach($leaves as $row){
 
    foreach($users as $row2){
        if($row2['id']==$row['user_id']){
            $item =[
                "id"=>$row['id'],
                "user_id"=>$row2['id'],
                "username"=>$row2['username'],
                "dateofleave_from"=>$row['dateofleave_from'],
                "dateofleave_to"=>$row['dateofleave_to']
            ];
        }
    }
   

    array_push($arr,$item);
}



echo json_encode($arr);
return $arr;