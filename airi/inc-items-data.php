 <?php 
 session_start();
 require("inc-connect-db.php");

 $conn = conDB();

 $pagestart_count = isset($_GET['pagestart_count'])?$_GET['pagestart_count']:0;
 $pageend_count = isset($_GET['pageend_count'])?$_GET['pageend_count']:19; 
 $page_count = 20;

 $q = isset($_GET['q'])?$_GET['q']:'';
 
 $cate_id = isset($_GET['cate_id'])?$_GET['cate_id']:'';
 $order = isset($_GET['order'])?$_GET['order']:'';
 
 $search = isset($_GET['search'])?$_GET['search']:'';

  $cate = '';
  if(isset($_GET['cate'])) {
  $type = $_GET['cate'];
  }

 $status = array('new','hot','sale','Unknown');

/*
$rows = mysqli_query($conn,"SELECT * FROM items");
$items = array();
while($value=mysqli_fetch_array($rows,MYSQLI_ASSOC)) { 
  $items[$value['id']] = array(
    ***
  );
}
*/

  $_SESSION['items'] = isset($_SESSION['items'])?$_SESSION['items']:array();
  $_SESSION['items'] = $_SESSION['items']==null?array():$_SESSION['items'];

  $_SESSION['cart_total'] = isset($_SESSION['cart_total'])?count($_SESSION['items']):0;
  $_SESSION['cart_total'] = $_SESSION['cart_total']==''?0:count($_SESSION['items']);

  /*
  $_SESSION['items'] = array(
      array(
        ***
      ),
      array(
        ***
      )
  );
  */

 ?>

