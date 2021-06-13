<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');

include_once '../../Db/db.php';
include_once '../../Employee/Models/Users.php';

$db = new dbConnection();
$user = new Users($db->connect());

$result = $user->GetAddress();

$arr =  array();

foreach($result as $row)
{
    $item = array(
        'id' => $row['id'],
        'user_id'=>$row['user_id'],
        'street_name'=>$row['street_name'],
        'unit'=>$row['unit'],
        'city' =>$row['city'],
        'province'=>$row['province'],
        'zipcode'=>$row['zipcode']
    );

    array_push($arr,$item);
}

echo json_encode($arr);
return $arr;