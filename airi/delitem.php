<?php
 include("./inc-items-data.php");

 $items_cart = array();

 foreach ($_SESSION['items'] as $key => $value) {
 	if($value['prd_id']==$_GET['prd_id']){continue;}
 	$items_cart[$key] = $_SESSION['items'][$key];
 }

 $_SESSION['items'] = $items_cart;

echo json_encode(array('status'=>'ok','data'=>$_GET['prd_id']));

?>