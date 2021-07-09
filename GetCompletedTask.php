<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');

include_once '../../Db/db.php';
include_once '../../HR/Models/Task.php';

$db = new dbConnection();
$task = new Task($db->connect());

$result = $task->GetCompleted();
$arr =  array();

foreach($result as $row)
{
    $item = array(
        'id' => $row['id'],
        'target_desc'=>$row['target_desc'],
        'assigned_id'=>$row['assigned_id'],
        'active'=>$row['active'],
    );

    array_push($arr,$item);
}


echo json_encode($arr);
return $arr;