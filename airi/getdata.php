<?php
 include("./inc-items-data.php");
 header('Content-Type: application/json');

 $data = array();
 if($_GET['type']=='Province') {
 	$rows = mysqli_query($conn,"select * from sys_area where iso_code='".$_GET['iso_code']."' AND area_type='Province'");
 	$data = array();
 	while($value=mysqli_fetch_array($rows,MYSQLI_ASSOC)) {  
 		$data[] = $value;
 	}
 }else if($_GET['type']=='City') {
 	$rows = mysqli_query($conn,"select * from sys_area where area_code like '".substr($_GET['Province'],0,2)."%' AND iso_code='".$_GET['iso_code']."' AND area_type='City'");
 	$data = array();
 	while($value=mysqli_fetch_array($rows,MYSQLI_ASSOC)) {  
 		$data[] = $value;
 	}
 }else if($_GET['type']=='Suburb') {
 	$rows = mysqli_query($conn,"select * from sys_area where area_code like '".substr($_GET['City'],0,4)."%' AND iso_code='".$_GET['iso_code']."' AND area_type='Suburb'");
 	$data = array();
 	while($value=mysqli_fetch_array($rows,MYSQLI_ASSOC)) {  
 		$data[] = $value;
 	}
 }
echo json_encode(array('status'=>'ok','data'=>$data));
?>