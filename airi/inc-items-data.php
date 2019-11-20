 <?php 
 session_start();
 require("inc-connect-db.php");

 $conn = conDB();

 $pagestart_count = 0; 
 $pageget_count = 20;

 $search = isset($_GET['search'])?$_GET['search']:'';

  $cate = '';
  if(isset($_GET['cate'])) {
  $type = $_GET['cate'];
  }

 $status = array('new','hot','sale');

/*
$rows = mysqli_query($conn,"SELECT * FROM items");
$items = array();
while($value=mysqli_fetch_array($rows,MYSQLI_ASSOC)) { 
  $items[$value['id']] = array(
    ***
  );
}
*/

  $_SESSION['cart_total'] = isset($_SESSION['cart_total'])?$_SESSION['cart_total']:0;
  $_SESSION['cart_total'] = $_SESSION['cart_total']==''?0:$_SESSION['cart_total'];

  $_SESSION['items'] = isset($_SESSION['items'])?$_SESSION['items']:array();
  $_SESSION['items'] = $_SESSION['items']==null?array():$_SESSION['items'];

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

