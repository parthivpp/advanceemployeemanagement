<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');

include_once '../../Db/db.php';
include_once '../../Employee/Models/Discount.php';

$db = new dbConnection();
$discount = new Discount($db->connect());

$result = $discount->Get();

$arr =  array();

foreach($result as $row)
{
    $item = array(
        'id' => $row['id'],
        'promo_code'=>$row['promo_code'],
        'discount'=>$row['discount']
    );
    
    array_push($arr,$item);
}

echo json_encode($arr);
return $arr;