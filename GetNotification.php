<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');

include_once '../../Db/db.php';
include_once '../../Admin/Models/Notifications.php';

$db = new dbConnection();
$noti = new Notification($db->connect());

$result = $noti->Get();
$arr = array();

foreach($result as $row)
{
    $item = array(
       'id'=>$row['id'],
       'notification'=>$row['notification'],
    );

    array_push($arr,$item);
}



echo json_encode($arr);
return $arr;