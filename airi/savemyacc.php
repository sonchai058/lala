<?php
 include("./inc-items-data.php");
 header('Content-Type: application/json');

$query = mysqli_query($conn,"select * from cus_info where bsn_id=1 and del_status='No' and line_id='{$_POST['useridprofilefield']}'");
/*
$query = mysqli_query($conn,"select * from cus_info where bsn_id=1 and del_status='No' and line_id='{$_POST['useridprofilefield']}' or mobile_no='{$_POST['mobile_no']}'");
*/
$tmp = mysqli_fetch_array($query,MYSQLI_ASSOC);
$cus_id=0;
$type = "INSERT INTO";
if(isset($tmp['cus_id'])) {
	$cus_id=$tmp['cus_id'];
	$type = "UPDATE";
}

$sql = "{$type} cus_info SET
bsn_id='1',
cus_fname='{$_POST['cus_fname']}',
cus_lname='{$_POST['cus_lname']}',
mobile_no='{$_POST['mobile_no']}',
line_id='{$_POST['useridprofilefield']}',
iso_code='{$_POST['iso_code']}',
email_addr='{$_POST['email_addr']}',
addr_line1='{$_POST['addr_line1']}',
addr_prov='{$_POST['addr_prov']}',
addr_city='{$_POST['addr_city']}',
addr_suburb='{$_POST['addr_suburb']}',
addr_zipcode='{$_POST['addr_zipcode']}'";

if($type=="UPDATE") {
	$sql = $sql." Where cus_id=".$cus_id;
}

$query = mysqli_query($conn,$sql);
//$tmp = mysqli_fetch_array($query,MYSQLI_ASSOC);
if($query) {
 echo json_encode(array('staus'=>'ok','msg'=>"{$type} cus_info successfully",'data'=>$query));
}else {
	 echo json_encode(array('staus'=>'failed','msg'=>'error','data'=>$query));
}
mysqli_close($conn);

?>