<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');

include_once '../../Db/db.php';
include_once '../../Employee/Models/Bank.php';

$db = new dbConnection();
$bank = new Bank($db->connect());

$result = $bank->Get();

$arr =  array();

foreach($result as $row)
{
    $item = array(
        'id' => $row['id'],
        'bank_name'=>$row['bank_name'],
        'typeofaccount'=>$row['typeofaccount'],
        'transit_number'=>$row['transit_number'],
        'institude_number'=>$row['institude_number'],
        'account_no' =>$row['account_no'],
        'user_id'=>$row['user_id']
    );
    
    array_push($arr,$item);
}

echo json_encode($arr);
return $arr;