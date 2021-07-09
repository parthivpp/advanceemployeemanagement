<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');

include_once '../../Db/db.php';
include_once '../../Employee/Models/Users.php';
include_once '../../Admin/Models/job.php';
include_once '../../Admin/Models/Hiring.php';

$db = new dbConnection();
$user = new Users($db->connect());
$job = new Job($db->connect());
$hiring = new Hiring($db->connect());

$result = $user->GetAll();
$result2 = $job->Get();
$hirelist = $hiring->Get();
$arr =  array();
$users = array();
$jobs = array();

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
    $item=[
        "id"=>$row["id"],
        "job_title"=>$row['job_title'],
        "job_desc"=>$row['job_desc']
    ];
    array_push($jobs,$item);
}
foreach($hirelist as $row){
    $list = array();
     $hireid= [
         'id'=>$row['id']
     ];

    array_push($list,$hireid);
    foreach($users as $row2){
        if($row['user_id'] == $row2['id']){
            $item =[
                'id'=>$row2['id'],
                'username'=>$row2['username']
            ];
            array_push($list,$item);
        }

    }
    foreach($jobs as $row2){
        if($row['job_id'] == $row2['id']){
            $item2 = [
                'job_title'=>$row2['job_title'],
                'job_desc'=>$row2['job_desc']
            ];
            array_push($list,$item2);
        }
    }
    array_push($arr,$list);
}
echo json_encode($arr);
return $arr;