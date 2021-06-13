<?php

header('Access-Control-Allow-Origin:*');
    header('Content-Type:application/json');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once '../../Db/db.php';
    include_once '../../Employee/Models/Presence.php';
    
    $db = new dbConnection();
    $presence = new presence($db->connect());
 

$result= $presence->PreviousAttendance();

$arr =  array();

foreach($result as $row)
{
    $item = array(
        'id' => $row['Id'],
        'clock_in'=>$row['clock_in'],
        'clock_out'=>$row['clock_out'],
        'user_id'=>$row['user_id']
    );

    array_push($arr,$item);
}

echo json_encode($arr);
return $arr;