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
 $_SESSION['cus_id'] = $tmp['cus_id'];
 $_SESSION['useridprofilefield'] = $tmp['line_id'];

 $alert_today = date('Y-m-d');
 $alert = 0;
 if($_SESSION['date_alert_today']!=$alert_today) {
 	 $_SESSION['date_alert_today'] = $alert_today;
 	 $alert = 1;
 }
  echo json_encode(array('status'=>'ok','msg'=>"have data.",'data'=>$tmp,'alert'=>$alert));
 }else {
  echo json_encode(array('status'=>'failed','msg'=>'no data.','data'=>$tmp,'alert'=>$alert));
 }
mysqli_close($conn);

?>