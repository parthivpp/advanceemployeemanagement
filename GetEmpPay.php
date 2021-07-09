<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');

include_once '../../Db/db.php';
include_once '../../Employee/Models/Users.php';

$db = new dbConnection();
$user = new Users($db->connect());

$result = $user->GetAll();

$arr =  array();

foreach($result as $row)
{
    $item = array(
        'id' => $row['Id'],
        'username'=>$row['username'],
        'worktype'=>$row['worktype'],
        'hourlywage'=>$row['hourlywage']
    );

    array_push($arr,$item);
}

echo json_encode($arr);
return $arr;