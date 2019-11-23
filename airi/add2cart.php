<?php
 include("./inc-items-data.php");
//$rows = mysqli_query($conn,$_GET['sql']);
// $items = array();
// while($value=mysqli_fetch_array($rows,MYSQLI_ASSOC)) {  
//   $items[$value['prd_id']] = array(
//     'prd_id'=>$value['prd_id'],
//     'PrdPhoto'=>$value['PrdPhoto'],
//     'prd_name'=>urlencode($value['prd_name']).' ('.urlencode($value['unit_name']).')',
//     'price'=>$value['price_tag'],
//     'price_tag'=>$value['price_tag'],
//     'price_retail'=>$value['price_retail'],
//     'price_wholesale'=>$value['price_wholesale'],
//     'prd_descr'=>urlencode($value['prd_descr']),
//     'unit_name'=>urlencode($value['unit_name']),
//     'brand_name'=>urlencode($value['brand_name']),
//     'cate_id'=>$value['cate_id'],
//     'prd_code'=>$value['prd_code'],
//     'unit_id'=>$value['unit_id'],
//     'cate_name'=>urlencode($value['cate_name']),
//     'badge_status'=>$value['badge_status']
//   );
//   /*
//   if($type!=$value['type'] && $type!="") {
//     continue;
//   }
//   */
// }
 
 $items_cart = array();

 $key0 = 0;
 foreach ($_SESSION['items'] as $key => $value) {
 	$items_cart[$key0] = $_SESSION['items'][$key];
  $key0++;
 }

$ck = 0;
$prd_id = isset($_GET['prd_id'])?$_GET['prd_id']:0;
  
$rows = mysqli_query($conn,"select *,(SELECT sto_prd_photo.photo_val FROM sto_prd_photo WHERE sto_prd_photo.prd_id=sto_prd.prd_id AND sto_prd_photo.cover_status='Yes' ) AS PrdPhoto FROM sto_prd LEFT JOIN sto_brand ON sto_prd.brand_id=sto_brand.brand_id LEFT JOIN sto_cate ON sto_prd.cate_id=sto_cate.cate_id AND sto_cate.iso_code='TH'  LEFT JOIN sto_unit ON sto_prd.unit_id=sto_unit.unit_id WHERE sto_prd.bsn_id='1' AND sto_prd.iso_code='TH' AND sto_prd.del_status='No' AND sto_prd.public_status='Yes' AND prd_id={$prd_id}");
$value0=mysqli_fetch_array($rows,MYSQLI_ASSOC);
foreach ($items_cart as $key => $value) {
 	if($value['prd_id']==$_GET['prd_id']) {
 		if(!isset($_GET['del'])) {
 			$items_cart[$key]['quatity'] = $items_cart[$key]['quatity']+$_GET['quatity'];
 			$items_cart[$key]['price'] = $items_cart[$key]['price']+($value0['price_tag']*$_GET['quatity']);
 		}else {
      if($items_cart[$key]['quatity']-1<1){unset($items_cart[$key]);$ck=1;continue;}
 			$items_cart[$key]['quatity'] = $items_cart[$key]['quatity']-1;
 			$items_cart[$key]['price'] = $items_cart[$key]['price']-$value0['price_tag'];
 		}
 		$ck=1;
 	}
}

if($ck==0) {

	 $items_cart[count($_SESSION['items'])] = array(
	        'PrdPhoto'=> $value0['PrdPhoto'],
	        'prd_id'=> $_GET['prd_id'],
	        'quatity'=> $_GET['quatity'],
          'price'=> ($value0['price_tag']*$_GET['quatity']),
	        'price_tag'=> $value0['price_tag'],
          'price_retail'=> $value0['price_retail'],
          'price_wholesale'=> $value0['price_wholesale'],
	        'detail'=> urlencode($value0['prd_name'])
	      );
}

 $key0 = 0;
 $_SESSION['items'] = array();
 foreach ($items_cart as $key => $value) {
  $_SESSION['items'][$key0] = $value;
  $key0++;
 }

echo json_encode(array('staus'=>'ok','data'=>$items_cart));

?>