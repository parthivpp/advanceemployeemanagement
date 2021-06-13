<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');

include_once '../../Db/db.php';
include_once '../../Employee/Models/Bank.php';
include_once '../../Employee/Models/Users.php';
include_once '../../Employee/Models/Presence.php';

$db = new dbConnection();
$bank = new Bank($db->connect());
$user = new Users($db->connect());
$presence = new Presence($db->connect());

$result = $bank->Get();

$arr =  array();

foreach($result as $row)
{
    $item = array(
        'id' => $row['id'],
        'bank_name'=>$row['bank_name'],
        'account_no' =>$row['account_no']
    );
    
    array_push($arr,$item);
}
$result2 = $user->Get();
foreach($result2 as $row)
{
    $item = array(
        'worktype'=>$row['worktype'],
        'hourlywage'=>$row['hourlywage']
    );

    array_push($arr,$item);
}
$result3 = $presence->PreviousAttendance();
$presenceArr = array();
foreach($result3 as $row)
{
    $item = array(
        'id' => $row['Id'],
        'clock_in'=>$row['clock_in'],
        'clock_out'=>$row['clock_out'],
        'user_id'=>$row['user_id']
    );

    array_push($presenceArr,$item);
}
array_push($arr,$presenceArr);
echo json_encode($arr);
return $arr;