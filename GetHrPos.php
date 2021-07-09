<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');

include_once '../../Db/db.php';
include_once '../../Employee/Models/Users.php';
include_once '../../Admin/Models/Positions.php';

$db = new dbConnection();
$user = new Users($db->connect());
$position = new Positions($db->connect());

$result = $user->GetAllHr();
$result2 = $position->Get();


$arr =  array();
$positions = array();
$dup = array();
$count = 0;
foreach($result2 as $row){
    $item = array(
        'id' => $row['id'],
        'user_id'=>$row['user_id'],
        'position' =>$row['position']
    );
    array_push($positions,$item);
}

foreach($result as $row)
{
    
    $item = array();
       
    foreach($positions as $row2){
        
            if($row2['user_id'] == $row['Id']){
                $count = 0;
                $item = array(
                    'id' => $row2['id'],
                    'user_id'=>$row2['user_id'],
                    'position' =>$row2['position'],
                    'name' => $row['username']
                );
                
                array_push($arr,$item);
            
                break;
            }
            else{
                $count++;
                $item = array(
                    'id' => "0",
                    'user_id'=>$row['Id'],
                    'position' =>"Not Assigned",
                    'name' => $row['username']
                );
                
               
            }       
                $count++;
            }
        
            if($count > 0 ){
                array_push($arr,$item);
            }
        
        
    }
    


echo json_encode($arr);
return $arr;