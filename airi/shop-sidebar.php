<?php 
require("inc-items-data.php");

//die('<pre>'.print_r($_SESSION['items']).'</pre>');

$qstr = isset($_GET['q'])?" AND (prd_name like '%{$_GET['q']}%' OR prd_descr like '%{$_GET['q']}%') ":"";

$sql = "(SELECT sto_prd_photo.photo_val FROM sto_prd_photo WHERE sto_prd_photo.prd_id=sto_prd.prd_id AND sto_prd_photo.cover_status='Yes' ) AS PrdPhoto FROM sto_prd LEFT JOIN sto_brand ON sto_prd.brand_id=sto_brand.brand_id LEFT JOIN sto_cate ON sto_prd.cate_id=sto_cate.cate_id AND sto_cate.iso_code='TH'  LEFT JOIN sto_unit ON sto_prd.unit_id=sto_unit.unit_id WHERE sto_prd.bsn_id='1' AND sto_prd.iso_code='TH' AND sto_prd.del_status='No' AND sto_prd.public_status='Yes'{$qstr}";

$rows = mysqli_query($conn,"SELECT *,".$sql." limit {$pagestart_count},$page_count");
$rows1 = mysqli_query($conn,"SELECT count(prd_id) as cc,sto_prd.*,".$sql);
$sql = "SELECT *,".$sql." limit {$pagestart_count},$page_count";
?>
<!doctype html>
<html class="no-js" lang="th">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/lala/logo.PNG" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/lala/logo.PNG">
    <link rel="icon" href="assets/lala/logo.PNG" type="image/x-icon">

    <!-- Title -->
    <title>ค้นหาสินค้า</title>

    <!-- ************************* CSS Files ************************* -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- dl Icon CSS -->
    <link rel="stylesheet" href="assets/css/dl-icon.css">

    <!-- All Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">

    <!-- Revoulation Slider CSS  -->
    <link rel="stylesheet" href="assets/css/revoulation.css">

    <!-- style CSS -->
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- modernizr JS
    ============================================ -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
      function noimage(image) {
        image.onerror = "";
        image.src = 'images/noimage.png';
        return true;
      }
      var accesstokenfield = "";
      var useridprofilefield = "";
      var displaynamefield = "";
      var pictureUrl = "";
      var statusmessagefield = "";
    </script>
</head>

<body>


    <div class="ai-preloader active">
        <div class="ai-preloader-inner h-100 d-flex align-items-center justify-content-center">
            <div class="ai-child ai-bounce1"></div>
            <div class="ai-child ai-bounce2"></div>
            <div class="ai-child ai-bounce3"></div>
        </div>
    </div>
  
    <!-- Main Wrapper Start -->
    <div class="wrapper">
        <style>
            .tools li {
                float: left;
            }
        </style>

        <!-- Header Area Start -->
        <header class="header header-fullwidth header-style-1">
            <div class="header-inner fixed-header">
                <div class="container-fluid">
                    <ul class="tools" style="position: absolute; top:2px; right:0px; list-style: none;">
                        <li class="header-toolbar__item">
                            <a onclick="window.location.replace('cart.php')" href="javascript:void(0)" class="mini-cart-btn toolbar-btn" style="color:#333">
                                <i class="dl-icon-cart4"></i>
                                <sup class="mini-cart-count cart_total" style="background-color:#f00"><?php echo $_SESSION['cart_total'];?></sup>
                            </a>
                        </li>
                        <li class="header-toolbar__item">
                            <a onclick="window.location.replace('my-account.php')" href="javascript:void(0)" class="toolbar-btn" style="color:#333">
                                <i class="dl-icon-user1"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="row align-items-center">
                        <div class="col-4">
                            <a href="index.html" class="logo-box">
                                <figure class="logo--normal">
                                    <img src="./images/logo-lala-black.svg" alt="Logo">
                                </figure>
                            </a>
                        </div>
                        <div class="col-8">
                            <ul class="header-toolbar text-right">
                                <li class="header-toolbar__item">
                                    <a href="#searchForm" class="search-btn toolbar-btn" style="position:absolute;top:-20px;right:0;width: 150px;">
                                       ค้นหา <i class="dl-icon-search1"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header Area End -->

        <!-- Mobile Header area Start -->
        <header class="header-mobile" style="margin-top: -86.9688px !important;">
            <div class="container-fluid">
                <div class="row align-items-center" style="margin-top: 0;">
                    <div class="col-12 text-center">
                        <ul class="tools" style="position: absolute; top:2px; right:0px; list-style: none;">
                            <li class="header-toolbar__item">
                                <a onclick="window.location.replace('cart.php')" href="javascript:void(0)" class="mini-cart-btn toolbar-btn" style="color:#333">
                                    <i class="dl-icon-cart4"></i>
                                    <sup class="mini-cart-count cart_total" style="background-color:#f00"><?php echo $_SESSION['cart_total'];?></sup>
                                </a>
                            </li>
                            <li class="header-toolbar__item">
                                <a onclick="window.location.replace('my-account.php')" href="javascript:void(0)" class="toolbar-btn" style="color:#333">
                                    <i class="dl-icon-user1"></i>
                                </a>
                            </li>
                        </ul>
                        <a href="#searchForm" class="search-btn toolbar-btn" style="">
                            <img src="./images/logo-lala-black.svg" alt="Logo">
                            <h3>ค้นหาสินค้า <i class="dl-icon-search1"></i></h3>
                        </a>
                    </div>
                </div>

            </div>
        </header>
        <!-- Mobile Header area End -->
        
        <!-- Main Content Wrapper Start -->
        <div id="content" class="main-content-wrapper" style="margin-top: -40px;">
            <div class="page-content-inner enable-page-sidebar">
                <div class="container-fluid">
                    <div class="row pt--45 pt-md--35 pt-sm--20 pb--60 pb-md--50 pb-sm--40"> <!-- class shop-sidebar -->
                        <div class="col-lg-12 order-lg-2" id="main-content">
                            <div class="shop-toolbar">
                                <div class="shop-toolbar__inner">
                                    <div class="row align-items-center">
                                        <div class="col-md-6 text-md-left text-center mb-sm--20">
                                            <div class="shop-toolbar__left">
                                                <p class="product-pages">แสดง <span id="pagestart_count"><?php echo $pagestart_count;?></span>–<span id="pageend_count"><?php echo $pageend_count;?></span> จากทั้งหมด <span id="rows_count"><?php echo $page_count;?></span> รายการ</p>
                                                <!--
                                                <div class="product-view-count">
                                                    <p>แสดง</p>
                                                    <ul>
                                                        <li><a href="shop-sidebar.html">6</a></li>
                                                        <li class="active"><a href="shop-sidebar.html">12</a></li>
                                                        <li><a href="shop-sidebar.html">15</a></li>
                                                    </ul>
                                                </div>
                                                -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="shop-toolbar__right">
                                                <div class="product-ordering">
                                                    <a href="" class="product-ordering__btn shop-toolbar__btn">
                                                        <span>กลุ่มสินค้า</span>
                                                        <i></i>
                                                    </a>
                                                    <ul class="product-ordering__list">
                                                        <li class="active"><a href="#">All</a></li>
                                                        <li><a href="#">Accessories</a></li>
                                                        <li><a href="#">Brands</a></li>
                                                        <li><a href="#">Clothing</a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-ordering">
                                                    <a href="" class="product-ordering__btn shop-toolbar__btn">
                                                        <span>เรียงจาก</span>
                                                        <i></i>
                                                    </a>
                                                    <ul class="product-ordering__list">
                                                        <li class="active"><a href="#">Sort by popularity</a></li>
                                                        <li><a href="#">Sort by average rating</a></li>
                                                        <li><a href="#">Sort by newness</a></li>
                                                        <li><a href="#">Sort by price: low to high</a></li>
                                                        <li><a href="#">Sort by price: high to low</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!--   
                                <div class="advanced-product-filters">
                                    <div class="product-filter">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="product-widget product-widget--price">
                                                    <h3 class="widget-title">Price</h3>
                                                    <ul class="product-widget__list">
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span class="ammount">$20.00</span>
                                                                <span> - </span>
                                                                <span class="ammount">$40.00</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span class="ammount">$40.00</span>
                                                                <span> - </span>
                                                                <span class="ammount">$50.00</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span class="ammount">$50.00</span>
                                                                <span> - </span>
                                                                <span class="ammount">$60.00</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span class="ammount">$60.00</span>
                                                                <span> - </span>
                                                                <span class="ammount">$80.00</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span class="ammount">$80.00</span>
                                                                <span> - </span>
                                                                <span class="ammount">$100.00</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span class="ammount">$100.00</span>
                                                                <span> + </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="product-widget product-widget--brand">
                                                    <h3 class="widget-title">Brands</h3>
                                                    <ul class="product-widget__list">
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span>Airi</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span>Mango</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span>Valention</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span>Zara</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="product-widget product-widget--color">
                                                    <h3 class="widget-title">Color</h3>
                                                    <ul class="product-widget__list product-color-swatch">
                                                        <li>
                                                            <a href="shop-sidebar.html" class="product-color-swatch-btn blue">
                                                                <span class="product-color-swatch-label">Blue</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html" class="product-color-swatch-btn green">
                                                                <span class="product-color-swatch-label">Green</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html" class="product-color-swatch-btn pink">
                                                                <span class="product-color-swatch-label">Pink</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html" class="product-color-swatch-btn red">
                                                                <span class="product-color-swatch-label">Red</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html" class="product-color-swatch-btn grey">
                                                                <span class="product-color-swatch-label">Grey</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="product-widget product-widget--size">
                                                    <h3 class="widget-title">Size</h3>
                                                    <ul class="product-widget__list">
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span>L</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span>M</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span>S</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span>XL</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span>XXL</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn-close"><i class="dl-icon-close"></i></a>
                                    </div>
                                </div>
                            -->
                            </div>
                            <div class="shop-products"> 
                                <div class="row grid-space-20 xxl-block-grid-4">
<?php
$items = array();
$key = 0;
$tmp = mysqli_fetch_array($rows1,MYSQLI_ASSOC);
$rows_count = @$tmp['cc']; 
while($value=mysqli_fetch_array($rows,MYSQLI_ASSOC)) {  
  $items[$value['prd_id']] = array(
    'prd_id'=>$value['prd_id'],
    'PrdPhoto'=>$value['PrdPhoto'],
    'prd_name'=>urlencode($value['prd_name']).' ('.urlencode($value['unit_name']).')',
    'price'=>$value['price_tag'],
    'price_tag'=>$value['price_tag'],
    'price_retail'=>$value['price_retail'],
    'price_wholesale'=>$value['price_wholesale'],
    'prd_descr'=>urlencode($value['prd_descr']),
    'unit_name'=>urlencode($value['unit_name']),
    'brand_name'=>urlencode($value['brand_name']),
    'cate_id'=>$value['cate_id'],
    'prd_code'=>$value['prd_code'],
    'unit_id'=>$value['unit_id'],
    'cate_name'=>urlencode($value['cate_name']),
    'badge_status'=>$value['badge_status']
  );
  /*
  if($type!=$value['type'] && $type!="") {
    continue;
  }
  */
  ?>

                                    <div class="col-lg-4 col-sm-6 mb--40 mb-md--30">
                                        <div class="airi-product">
                                            <div class="product-inner">
                                                <figure class="product-image">
                                                    <div class="product-image--holder">
                                                        <a href="javascipt:void(0)" data-toggle="modal" data-target="#productModal" onclick="productSet(<?php echo $value['prd_id'];?>)">
                     
                                                                <img onerror="noimage(this)" style="margin-left: 7px;object-fit: cover; width: 400px; height: 400px;" src="../../files/product-o/<?php echo $value['PrdPhoto'];?>" alt="Product Image" class="primary-image">
  
                                                                <img onerror="noimage(this)" style="margin-left: 7px;z-index:0;object-fit: cover; width: 400px; height: 400px;" src="../../files/product-o/<?php echo $value['PrdPhoto'];?>" alt="Product Image" class="secondary-image">
                                                        
                                                            
                                                        </a>
                                                    </div>
                                                    <div class="airi-product-action">
                                                        <div class="product-action">
                                                            <a class="quickview-btn action-btn" data-toggle="tooltip" data-placement="top" title="Quick Shop">
                                                                <span data-toggle="modal" data-target="#productModal" onclick="productSet(<?php echo $value['prd_id'];?>)">
                                                                    <i class="dl-icon-view"></i>
                                                                </span>
                                                            </a>
                                                            <a class="add_to_cart_btn action-btn" href="javascript:void(0)"  onclick="add2Cart(<?php echo $value['prd_id'];?>,1)" data-toggle="tooltip" data-placement="top" title="หยิบใส่ตะกร้า">
                                                                <i class="dl-icon-cart29"></i>
                                                            </a>
                                                            <!--
                                                            <a class="add_wishlist action-btn" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                                <i class="dl-icon-heart4"></i>
                                                            </a>
                                                            <a class="add_compare action-btn" href="compare.html" data-toggle="tooltip" data-placement="top" title="Add to Compare">
                                                                <i class="dl-icon-compare"></i>
                                                            </a>
                                                        -->
                                                        </div>
                                                    </div>
                                                    <?php 
                                                    //$sts = $status[rand(0,3)];
                                                    ?>
                                                    <span class="product-badge <?php echo $value['badge_status'];?>"><?php echo $value['badge_status'];?>;?></span>
                                                </figure>
                                                <div class="product-info text-center">
                                                    <h3 class="product-title">
                                                        <a href="product-details.html"><?php echo $value['prd_name'].' ('.$value['unit_name'].')';?></a>
                                                    </h3>
                                                    <span class="product-price-wrapper">
                                                        <span class="money">$<?php echo number_format($value['price_wholesale'],2);?></span>
                                                        <span class="product-price-old">
                                                            <span class="money">$<?php echo number_format($value['price_tag'],2);?></span>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php
} 
?>

                                </div>
                            </div>

                            <style>
                                .pagination {
                                    width: 90%;
                                    margin: 0 auto;
                                }
                                .pagination li {
                                    float:left; width:50px;
                                }
                            </style>
                            <nav class="pagination-wrap">
                                <ul class="pagination" style="display: table;">
                                <?php 
                                $page_pre_start = $pagestart_count-$page_count;
                                $page_pre_start = $page_pre_start<0?0:$page_pre_start;
                                $page_pre_end = (($pageend_count+1)-$page_count)-1;
                                $page_pre_end = $page_pre_end<0?$page_count:$page_pre_end;
                                ?>
                                    <li><a href="?pagestart_count=<?php echo $page_pre_start;?>&pageend_count=<?php echo $page_pre_end;?>" class="prev page-number"><i class="fa fa-angle-double-left"></i></a></li>
                                <?php
                                 
                                $count = ($rows_count/$page_count);
                                $count = (int)$count;
                                if($rows_count%$page_count>0) {
                                    $count = $count+1;
                                }  

                                $page_stop_next_start = "";
                                $page_stop_next_end = "";                              
                                for($i=0;$i<$count;$i++){
                                ?>
                                    <li><a href="?pagestart_count=<?php echo ($i*$page_count);?>&pageend_count=<?php echo ((($i+1)*$page_count)-1);?>" class="<?php if($i==($pagestart_count/$page_count)){?> current <?php }?> page-number"><?php echo ($i+1);?></a></li>
                                <?php
                                    if(($i+1)==$count) {
                                       $page_stop_next_start = ($i*$page_count);
                                       $page_stop_next_end = ((($i+1)*$page_count)-1);
                                    }
                                }
                                $page_next_start = $pagestart_count+20;
                                $page_next_start = $page_next_start>$page_stop_next_start?$page_stop_next_start:$page_next_start;
                                $page_next_end = $pageend_count+20;
                                $page_next_end = $page_next_end>$page_stop_next_end?$page_stop_next_end:$page_next_end;
                                ?>
                                    <li><a href="?pagestart_count=<?php echo $page_next_start;?>&pageend_count=<?php echo $page_next_end;?>" class="next page-number"><i class="fa fa-angle-double-right"></i></a></li>

                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Wrapper Start -->




        <!-- Search from Start --> 
        <div class="searchform__popup" id="searchForm">
            <a href="#" class="btn-close"><i class="dl-icon-close"></i></a>
            <div class="searchform__body">
                <p>LalaBeauty Shop</p>
                <!-- <form class="searchform"> -->
                    <div class="searchform">
                    <input type="text" value="<?php echo $q;?>" name="search" id="search" class="searchform__input" placeholder="ค้นหาสินค้าที่ต้องการ...">
                    <button type="submit" class="searchform__submit" onclick="formSearchLoad()"><i class="dl-icon-search10"></i></button>
                <!-- </form> -->
                    </div>
            </div>
        </div>
        <!-- Search from End --> 

        <!-- Breadcrumb area Start -->

        <div class="breadcrumb-area bg--white-6 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">Shop Sidebar</h1>
                        <ul class="breadcrumb justify-content-center">
                            <li><a href="index.html">Home</a></li>
                            <li class="current"><span>Shop Pages</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb area End -->

        <!-- Mini Cart Start -->
        <!--
        <aside class="mini-cart" id="miniCart">
            <div class="mini-cart-wrapper">
                <a href="" class="btn-close"><i class="dl-icon-close"></i></a>
                <div class="mini-cart-inner">
                    <h5 class="mini-cart__heading mb--40 mb-lg--30">Shopping Cart</h5>
                    <div class="mini-cart__content">
                        <ul class="mini-cart__list">
                            <li class="mini-cart__product">
                                <a href="#" class="remove-from-cart remove">
                                    <i class="dl-icon-close"></i>
                                </a>
                                <div class="mini-cart__product__image">
                                    <img src="assets/img/products/prod-17-1-70x91.jpg" alt="products">
                                </div>
                                <div class="mini-cart__product__content">
                                    <a class="mini-cart__product__title" href="product-details.html">Chain print bermuda shorts  </a>
                                    <span class="mini-cart__product__quantity">1 x $49.00</span>
                                </div>
                            </li>
                            <li class="mini-cart__product">
                                <a href="#" class="remove-from-cart remove">
                                    <i class="dl-icon-close"></i>
                                </a>
                                <div class="mini-cart__product__image">
                                    <img src="assets/img/products/prod-18-1-70x91.jpg" alt="products">
                                </div>
                                <div class="mini-cart__product__content">
                                    <a class="mini-cart__product__title" href="product-details.html">Waxed-effect pleated skirt</a>
                                    <span class="mini-cart__product__quantity">1 x $49.00</span>
                                </div>
                            </li>
                            <li class="mini-cart__product">
                                <a href="#" class="remove-from-cart remove">
                                    <i class="dl-icon-close"></i>
                                </a>
                                <div class="mini-cart__product__image">
                                    <img src="assets/img/products/prod-19-1-70x91.jpg" alt="products">
                                </div>
                                <div class="mini-cart__product__content">
                                    <a class="mini-cart__product__title" href="product-details.html">Waxed-effect pleated skirt</a>
                                    <span class="mini-cart__product__quantity">1 x $49.00</span>
                                </div>
                            </li>
                            <li class="mini-cart__product">
                                <a href="#" class="remove-from-cart remove">
                                    <i class="dl-icon-close"></i>
                                </a>
                                <div class="mini-cart__product__image">
                                    <img src="assets/img/products/prod-2-1-70x91.jpg" alt="products">
                                </div>
                                <div class="mini-cart__product__content">
                                    <a class="mini-cart__product__title" href="product-details.html">Waxed-effect pleated skirt</a>
                                    <span class="mini-cart__product__quantity">1 x $49.00</span>
                                </div>
                            </li>
                        </ul>
                        <div class="mini-cart__total">
                            <span>Subtotal</span>
                            <span class="ammount">$98.00</span>
                        </div>
                        <div class="mini-cart__buttons">
                            <a href="cart.html" class="btn btn-fullwidth btn-style-1">View Cart</a>
                            <a href="checkout.html" class="btn btn-fullwidth btn-style-1">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    -->
        <!-- Mini Cart End -->

        <!-- Global Overlay Start -->
        <div class="ai-global-overlay"></div>
        <!-- Global Overlay End -->

        <!-- Modal Start -->
        <div class="modal fade product-modal" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close custom-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="dl-icon-close"></i></span>
                </button>
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-image-carousel nav-vertical-center nav-style-1">
                            <div class="product-image">
                                <div class="product-image--holder">
                                    <a href="product-details.html">
                                        <img onerror="noimage(this)" id="PrdPhoto" src="assets/img/products/prod-9-1.jpg" alt="Product Image" class="primary-image">
                                    </a>
                                </div>
                                <span id="status" class="product-badge new">new</span>
                            </div>
                            <!--
                            <div class="product-image">
                                <div class="product-image--holder">
                                    <a href="product-details.html">
                                        <img src="assets/img/products/prod-10-1.jpg" alt="Product Image" class="primary-image">
                                    </a>
                                </div>
                                <span class="product-badge new">new</span>
                            </div>
                            <div class="product-image">
                                <div class="product-image--holder">
                                    <a href="product-details.html">
                                        <img src="assets/img/products/prod-11-1.jpg" alt="Product Image" class="primary-image">
                                    </a>
                                </div>
                                <span class="product-badge hot">hot</span>
                            </div>
                            -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="modal-box product-summary">
                        <!--   
                            <div class="product-navigation mb--10">
                                <a href="#" class="prev"><i class="dl-icon-left"></i></a>
                                <a href="#" class="next"><i class="dl-icon-right"></i></a>
                            </div>
                        -->
                            <h3 class="product-title mb--15" id="prd_name" style="word-break: break-all;">&nbsp;</h3>
                            <span class="product-price-wrapper mb--20">
                                <input type="hidden" id="prd_id" value="0">
                                <span class="money">$<span id="price_tag">00.00</span></span>
                                <span class="product-price-old">
                                    <span class="money">$<span id="price_wholesale">00.00</span></span>
                                </span>
                            </span>
                            <p class="product-short-description mb--25 mb-md--20" id="prd_descr" style="word-break: break-all;">&nbsp;</p>
                            <div class="product-action d-flex flex-row align-items-center mb--30">
                                <div class="quantity">
                                    <input type="number" class="quantity-input" name="qty" step="1" id="qty" value="1" min="1" max="10">
                                </div>
                                <button type="button" class="btn btn-style-1 btn-semi-large add-to-cart" onclick="add2Cart($('#prd_id').val(),$('#qty').val())">
                                    หยิบใส่ตะกร้า
                                </button>
                            <!--   
                                <a href="wishlist.html"><i class="dl-icon-heart2"></i></a>
                                <a href="compare.html"><i class="dl-icon-compare2"></i></a>
                            -->
                            </div>  
                        <!--   
                            <div class="product-extra mb--30">
                                <a href="#" class="font-size-12"><i class="fa fa-map-marker"></i>Find store near you</a>
                                <a href="#" class="font-size-12"><i class="fa fa-exchange"></i>Delivery and return</a>
                            </div>
                        -->
                            <div class="product-meta float-left">
                                <span class="sku_wrapper font-size-12">SKU: <span class="sku" id="brand_name">&nbsp;</span></span>
                                <span class="posted_in font-size-12">Categories: <a href="shop-sidebar.html" rel="tag" id="cate_name">&nbsp;</a></span>
                                <br/>
                            </div>
                        <!--
                            <div class="product-share-box float-right">
                                <span class="font-size-12">Share With</span>
                                <!-- Social Icons Start Here -->
                        <!--
                                <ul class="social social-small">
                                    <li class="social__item">
                                        <a href="facebook.com" class="social__link">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="social__item">
                                        <a href="twitter.com" class="social__link">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="social__item">
                                        <a href="plus.google.com" class="social__link">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="social__item">
                                        <a href="plus.google.com" class="social__link">
                                            <i class="fa fa-pinterest-p"></i>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Social Icons End Here -->
                        <!--
                            </div>
                        -->
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal End -->



    </div>
    <!-- Main Wrapper End -->

        <!-- Modal Line API -->
        <div class="modal fade lineapi" id="lineapi" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <div id="lineapi_content">
                    <!--
                    <div class="buttongroup">
               
                        <div class="buttonrow">
                            <button id="openwindowbutton">Open Window</button>
                            <button id="closewindowbutton">Close Window</button>
                        </div>
            
                        <div class="buttonrow">
                            <button id="getaccesstoken">Get Access Token</button>
                            <button id="getprofilebutton">Get Profile</button>
                            <button id="sendmessagebutton">Send Message</button>
                        </div>
                    </div>
                    -->
                 
                    <div id="accesstokendata" style="display: block">
                        <h2>Access Token</h2>
                        <!-- <a href="#" onclick="toggleAccessToken()">Close Access Token</a> -->
                        <table border="1">
                            <tr>
                                <th>accessToken</th>
                                <td id="accesstokenfield"></td>
                            </tr>
                        </table>
                    </div>
                 
                    <div id="profileinfo" style="display: block">
                        <h2>Profile</h2>
                        <!-- <a href="#" onclick="toggleProfileData()">Close Profile</a>-->
                        <div id="profilepicturediv">
                        </div>
                        <table border="1">
                            <tr>
                                <th>userId</th>
                                <td id="useridprofilefield"></td>
                            </tr>
                            <tr>
                                <th>displayName</th>
                                <td id="displaynamefield"></td>
                            </tr>
                            <tr>
                                <th>statusMessage</th>
                                <td id="statusmessagefield"></td>
                            </tr>
                        </table>
                    </div>
                 
                    <div id="liffdata">
                        <h2>LIFF Data</h2>
                        <table border="1">
                            <tr>
                                <th>language</th>
                                <td id="languagefield"></td>
                            </tr>
                            <tr>
                                <th>context.viewType</th>
                                <td id="viewtypefield"></td>
                            </tr>
                            <tr>
                                <th>context.userId</th>
                                <td id="useridfield"></td>
                            </tr>
                            <tr>
                                <th>context.utouId</th>
                                <td id="utouidfield"></td>
                            </tr>
                            <tr>
                                <th>context.roomId</th>
                                <td id="roomidfield"></td>
                            </tr>
                            <tr>
                                <th>context.groupId</th>
                                <td id="groupidfield"></td>
                            </tr>
                        </table>
                    </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <!-- Modal End -->


    <!-- ************************* JS Files ************************* -->

    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery.min.js"></script>

    <!-- Bootstrap and Popper Bundle JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- All Plugins Js -->
    <script src="assets/js/plugins.js"></script>

    <!-- Ajax Mail Js -->
    <script src="assets/js/ajax-mail.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- REVOLUTION JS FILES -->
    <script src="assets/js/revoulation/jquery.themepunch.tools.min.js"></script>
    <script src="assets/js/revoulation/jquery.themepunch.revolution.min.js"></script>    

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="assets/js/revoulation/extensions/revolution.extension.actions.min.js"></script>
    <script src="assets/js/revoulation/extensions/revolution.extension.carousel.min.js"></script>
    <script src="assets/js/revoulation/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="assets/js/revoulation/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="assets/js/revoulation/extensions/revolution.extension.migration.min.js"></script>
    <script src="assets/js/revoulation/extensions/revolution.extension.navigation.min.js"></script>
    <script src="assets/js/revoulation/extensions/revolution.extension.parallax.min.js"></script>
    <script src="assets/js/revoulation/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="assets/js/revoulation/extensions/revolution.extension.video.min.js"></script>

    <!-- REVOLUTION ACTIVE JS FILES -->
    <script src="assets/js/revoulation.js"></script>

    <script>  
    <?php
      echo 'var cus_id="";'; 
      echo 'var rows_count="'.number_format($rows_count).'";'; echo 'var pagestart_count="'.number_format($pagestart_count+1).'";'; echo 'var pageend_count="'.number_format($pageend_count+1).'";';  echo 'var cate_id="'.$cate_id.'";'; echo 'var order="'.$order.'";';
      echo "var shop_items=JSON.parse('".json_encode($items)."');";
      echo "var items=JSON.parse('".json_encode($_SESSION['items'])."');";

      echo 'var cart_total='.$_SESSION['cart_total'].';';
    ?>
      function productSet(id) {
        setDefaultProductModal();
        console.log(id);
        $('#prd_id').val(shop_items[id].prd_id);
        $('#qty').val(1);
        $("#cate_name").html(decodeURIComponent(shop_items[id].cate_name));
        $("#brand_name").html(decodeURIComponent(shop_items[id].brand_name));
        $("#prd_descr").html(decodeURIComponent(shop_items[id].prd_descr));
        $("#price_wholesale").html(currencyFormat(parseFloat(shop_items[id].price_wholesale)));
        $("#price_tag").html(currencyFormat(parseFloat(shop_items[id].price_tag)));
        $("#prd_name").html(decodeURIComponent(shop_items[id].prd_name));
        //var status = ['new','hot','sale','Unknown']
        //var sts_txt = status[Math.floor(Math.random() * 4)];
        $("#status").removeClass("new sale hot Unknown"); $("#status").addClass(shop_items[id].badge_status); $("#status").html(shop_items[id].badge_status);
        $("#PrdPhoto").attr("src","../../files/product-o/"+shop_items[id].PrdPhoto);
      }
      function setDefaultProductModal() {
        $("#cate_name").html("");
        $("#brand_name").html("");
        $("#prd_descr").html("");
        $("#price_wholesale").html("");
        $("#price_tag").html("");
        $("#prd_name").html("");
        $("#status").removeClass("new sale hot"); $("#status").html("");
        $("#PrdPhoto").attr("src","assets/img/products/prod-9-1.jpg");
      }
      function formSearchLoad() {
        if($("#search").val()!='') {
            window.location.replace("?q="+$("#search").val()+"&pagestart_count="+pagestart_count+"&pageend_count="+pageend_count+"&cate_id="+cate_id+"&order="+order);
        }else {
           $("#search").focus(); 
        }
      }
    </script>

    <script>
        $(document).ready(function(){
            setTimeout(function(){
                if($("#search").val()=='') {
                    $(".search-btn.toolbar-btn").click();
                    $("#search").focus();
                }
            },400);
            $("#rows_count").html(rows_count); $("#pagestart_count").html(pagestart_count); $("#pageend_count").html(pageend_count);

            setTimeout(function(){
                fullaction();
            },1000);

        });
    </script>
    
</body>
    <script src="cart.js"></script>
<?php
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if($uriSegments[1]!='lala') {
?>
    <script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
    <script src="liff-starter.js"></script>
<?php
}
?>
</html>
