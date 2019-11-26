<?php
 include("./inc-items-data.php");
 header('Content-Type: application/json');

$type="line_id='{$_GET['useridprofilefield']}'";

if($_GET['type']=='mobile_no') {
	$type="mobile_no='{$_GET['mobile_no']}'";
}

$query = mysqli_query($conn,"select * from cus_info where bsn_id=1 and del_status='No' and {$type}");
$tmp = @mysqli_fetch_array($query,MYSQLI_ASSOC);
if(isset($tmp['cus_id'])) {
 echo json_encode(array('staus'=>'ok','msg'=>"have data.",'data'=>$tmp));
}else {
 echo json_encode(array('staus'=>'failed','msg'=>'no data.','data'=>$tmp));
}
mysqli_close($conn);

?>