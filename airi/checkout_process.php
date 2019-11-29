<?php
 include("./inc-items-data.php");
 header('Content-Type: application/json');

 $reg_capcha = '';
 while(1) {
 	$reg_capcha = randString(6);
 	$rows = mysqli_query($conn,"select reg_capcha from cus_order where reg_capcha='".$reg_capcha."'");
 	$tmp=mysqli_fetch_array($rows,MYSQLI_ASSOC);
 	if(!isset($tmp['reg_capcha'])) {
 		break;
 	}
 }

 $ord_code =  "IV".date('Y').date('m');
 $strSQL = "SELECT MAX(ord_code) AS Code FROM cus_order WHERE YEAR(date_of_order)='".date("Y")."' AND MONTH(date_of_order)='".date('m')."' LIMIT 1";
 $rows = mysqli_query($conn,$strSQL);
 $Code=mysqli_fetch_array($rows,MYSQLI_ASSOC);
 $code_txt = substr(@$Code['Code'], 8, 5); // Run Number
 $arrCode = isset($Code['Code'])?$code_txt:'00000';
 $ord_code = $ord_code.getZero((intval($arrCode)+1), 5);

$sql_root_query = "INSERT INTO cus_order SET bsn_id ='1',cus_id={$_POST['cus_id']},ord_code='{$ord_code}',date_of_order='".date('Y-m-d H:i:s')."',usr_id='1',chn_id='4',ship_type='{$_POST['ship_type']}',sub_total='{$_POST['sub_total']}',ship_fee_status='{$_POST['ship_fee_status']}',ship_fee='{$_POST['ship_fee']}',discount_status='No',discount_type='',discount_val='0',discount_amt='0',sub_total_discount='0',vat_status='Yes',vat_type='Include VAT',vat_amt='{$_POST['vat_amt']}',sub_total_vat='{$_POST['sub_total_vat']}',wt_status='No',wt_percent='0',wt_amt='0',grand_total='{$_POST['grand_total']}',reg_capcha='{$reg_capcha}'";
 
 mysqli_query($conn,$sql_root_query);
 $ord_id = mysqli_insert_id($conn);

 foreach ($_SESSION['items'] as $key => $value) {
 	$sql = "INSERT INTO cus_order_item SET prd_id='{$value['prd_id']}',ord_id='{$ord_id}',date_of_add='".date("Y-m-d H:i:s")."',item_type='Order',item_qty='{$value['quatity']}',item_price='{$value['price']}'";
 	mysqli_query($conn,$sql);
 }

 $data = array('ord_id'=>$ord_id,'ord_code'=>$ord_code,'reg_capcha'=>$reg_capcha);

 unset($_SESSION['items']);
 echo json_encode(array('status'=>'ok','data'=>$data,'ord_id_return'=>$reg_capcha));

function randString($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')
{
    $str = '';
    $count = strlen($charset);
    while ($length--) {
        $str .= $charset[mt_rand(0, $count-1)];
    }
    return $str;
}
function getZero($str,$len) {
	$start_str = $str;
	$i = strlen($str);
	while($i<$len) {
		$start_str = '0'.$start_str;
		$i++;
	}
	return $start_str;
}
?>