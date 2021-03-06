<?php
     include("./inc-items-data.php");
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
    <title>ตระกร้า</title>

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
      var useridprofilefield = "<?php echo $_SESSION['useridprofilefield'];?>";
      var displaynamefield = "";
      var pictureUrl = "";
      var statusmessagefield = "";
      var cus_id = "<?php echo $_SESSION['cus_id'];?>";
      var url_back = "<?php echo @$_GET['url_back'];?>";
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

        <!-- Main Content Wrapper Start -->
        <div id="content" class="main-content-wrapper">
            <div class="page-content-inner">
                <div class="container">
                    <div class="row pt--80 pb--80 pt-md--45 pt-sm--25 pb-md--60 pb-sm--40">
                        <div class="col-lg-8 mb-md--30">
                            <form class="cart-form" action="#">
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <div class="table-content table-responsive">
                                            <table class="table text-center">
                                                <thead>
                                                    <tr>
                                                        <th>&nbsp;</th>
                                                        <th>&nbsp;</th>
                                                        <th class="text-left" style="font-size:15px">สินค้า</th></th>
                                                        <th style="font-size:15px">ราคา</th>
                                                        <th style="font-size:15px">จำนวน</th>
                                                        <th style="font-size:15px">รวม</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
<?php
$sub_total = 0; $shipping = 0; $total = 0; $discount = 0; $ship_fee_status = "Yes";
                                    foreach ($_SESSION['items'] as $key => $value) {
                                      $sub_total=$sub_total+$value['price'];
                                      
                                      if($value['ship_fee_status']=='No') {
                                        $ship_fee_status = "No";
                                      }
?>                                                    
                                                    <tr>
                                                        <td class="product-remove text-left"><a href="javascript:void(0)" onclick="del('<?php echo $value['prd_id'];?>')"><i class="dl-icon-close"></i></a></td>
                                                        <td class="product-thumbnail text-left">
                                                            <img onerror="noimage(this)" width="70px" height="81px" src="../../files/product-o/<?php echo $value['PrdPhoto'];?>" alt="Product Thumnail">
                                                        </td>
                                                        <td class="product-name text-left wide-column">
                                                            <h3>
                                                                <a href="product-details.html"><?php echo urldecode($value['detail']);?></a>
                                                            </h3>
                                                        </td>
                                                        <td class="product-price">
                                                            <span class="product-price-wrapper">
                                                                <span class="money">$<?php echo number_format($value['price_tag'],2);?></span>
                                                            </span>
                                                        </td>
                                                        <td class="product-quantity">
                                                            <div class="quantity">
                                                                <input type="number" class="quantity-input" name="qty" id="quatity<?php echo $key;?>" data-id="<?php echo $value['prd_id'];?>" data-key="<?php echo $key;?>" value="<?php echo $value['quatity'];?>" min="1">
                                                            </div>
                                                        </td>
                                                        <td class="product-total-price">
                                                            <span class="product-price-wrapper">
                                                                <span class="money"><strong>$<?php echo number_format($value['price'],2);?></strong></span>
                                                            </span>
                                                        </td>
                                                    </tr>
<?php
}  if(count($_SESSION['items'])<1) { ?>
                                      <tr>
                                        <td colspan="5">ไม่มีรายการ..</td>
                                    </tr>
<?php
}
if($ship_fee_status=='No') {
   $ship_fee = 0;  
}else {
    $ship_fee = 50;
}
$ship_fee = count($_SESSION['items'])!=0?$ship_fee:0;

$discount = 0;

$vat_amt = ($sub_total*7)/107;
$sub_total_vat = $sub_total-$vat_amt;
$grand_total = $sub_total + $ship_fee;
/*
$total= $shipping+$subtotal-$discount;
$total = $total <0?0:$total;
*/

$sub_total = $sub_total <0?0:$sub_total;
$ship_fee = $ship_fee <0?0:$ship_fee;
$grand_total = $grand_total <0?0:$grand_total;
?>
                                                </tbody>
                                            </table>
                                            <br/>
                                            <a href="shop-sidebar.php"><b><< กลับไปเลือกสินค้า</b></a>
                                        </div>  
                                    </div>
                                </div>
                                <!--
                                <div class="row no-gutters border-top pt--20 mt--20">
                                    <div class="col-sm-6">
                                        <div class="coupon">
                                            <input type="text" id="coupon" name="coupon" class="cart-form__input" placeholder="Coupon Code">
                                            <button type="submit" class="cart-form__btn">Apply Coupon</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-sm-right">
                                        <button type="submit" class="cart-form__btn">Clear Cart</button>
                                        <button type="submit" class="cart-form__btn">Update Cart</button>
                                    </div>
                                </div>
                                -->
                            </form>
                        </div>
                        <div class="col-lg-4">
                            <div class="cart-collaterals">
                                <div class="cart-totals">
                                    <h5 class="mb--15">ราคาในตะกร้า</h5>
                                    <div class="table-content table-responsive">
                                        <table class="table order-table">
                                            <tbody>
                                                <tr>
                                                    <th>ราคา</th>
                                                    <td>$<?php echo number_format($sub_total,2);?></td>  
                                                </tr>
                                                <tr>
                                                    <th>ค่าจัดส่ง</th>
                                                    <td>$<?php echo number_format($ship_fee,2);?></td>  
                                                </tr>
                                                <!--
                                                <tr>
                                                    <th>จัดส่ง</th>
                                                    <td>
                                                        <span>Flat rate: $20.00</span>
                                                        <div class="shipping-calculator-wrap">
                                                            <a href="#shipping_calculator" class="expand-btn">Calculate Shipping</a>
                                                            <form id="shipping_calculator" class="form shipping-calculator-form hide-in-default">
                                                                <div class="form__group mb--10">
                                                                    <select id="calc_shipping_country" name="calc_shipping_country" class="nice-select">
                                                                        <option value="">Select a country…</option>
                                                                        <option value="AF">Afghanistan</option>
                                                                        <option value="AL">Albania</option>
                                                                        <option value="DZ">Algeria</option>
                                                                        <option value="AR">Argentina</option>
                                                                        <option value="AM">Armenia</option>
                                                                        <option value="AU">Australia</option>
                                                                        <option value="AT">Austria</option>
                                                                        <option value="AZ">Azerbaijan</option>
                                                                        <option value="BH">Bahrain</option>
                                                                        <option value="BD" selected="selected">Bangladesh</option>
                                                                        <option value="BD">Brazil</option>
                                                                        <option value="CN">China</option>
                                                                        <option value="EG">Egypt</option>
                                                                        <option value="FR">France</option>
                                                                        <option value="DE">Germany</option>
                                                                        <option value="HK">Hong Kong</option>
                                                                        <option value="HU">Hungary</option>
                                                                        <option value="IS">Iceland</option>
                                                                        <option value="IN">India</option>
                                                                        <option value="ID">Indonesia</option>
                                                                        <option value="IR">Iran</option>
                                                                        <option value="IQ">Iraq</option>
                                                                        <option value="IE">Ireland</option>
                                                                        <option value="IT">Italy</option>
                                                                        <option value="JP">Japan</option>
                                                                        <option value="KW">Kuwait</option>
                                                                        <option value="MY">Malaysia</option>
                                                                        <option value="MV">Maldives</option>
                                                                        <option value="MX">Mexico</option>
                                                                        <option value="MC">Monaco</option>
                                                                        <option value="NP">Nepal</option>
                                                                        <option value="RU">Russia</option>
                                                                        <option value="KR">South Korea</option>
                                                                        <option value="SS">South Sudan</option>
                                                                        <option value="ES">Spain</option>
                                                                        <option value="LK">Sri Lanka</option>
                                                                        <option value="SD">Sudan</option>
                                                                        <option value="SZ">Swaziland</option>
                                                                        <option value="SE">Sweden</option>
                                                                        <option value="CH">Switzerland</option>
                                                                        <option value="TN">Tunisia</option>
                                                                        <option value="TR">Turkey</option>
                                                                        <option value="UA">Ukraine</option>
                                                                        <option value="AE">United Arab Emirates</option>
                                                                        <option value="GB">United Kingdom (UK)</option>
                                                                        <option value="US">United States (US)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form__group mb--10">
                                                                    <select id="calc_shipping_district" name="calc_shipping_district" class="nice-select">
                                                                        <option value="">Select a District…</option>
                                                                        <option>BARISAL</option>
                                                                        <option>BHOLA</option>
                                                                        <option>BANDARBAN</option>
                                                                        <option>BRAHMANBARIA</option>
                                                                        <option>CHANDPUR</option>
                                                                        <option>CHITTAGONG</option>
                                                                        <option>COMILLA</option>
                                                                        <option>COX'S BAZAR</option>
                                                                        <option>DHAKA</option>
                                                                        <option>FARIDPUR</option>
                                                                        <option>FENI</option>
                                                                        <option>GAZIPUR</option>
                                                                        <option>GOPALGANJ</option>
                                                                        <option>JAMALPUR</option>
                                                                        <option>KHAGRACHHARI</option>
                                                                        <option>KISHOREGONJ</option>
                                                                        <option>LAKSHMIPU</option>
                                                                        <option>RMADARIPUR</option>
                                                                        <option>MUNSHIGANJ</option>
                                                                        <option>MYMENSINGH</option>
                                                                        <option>NARAYANGANJ</option>
                                                                        <option>NARSINGDI</option>
                                                                        <option>NETRAKONA</option>
                                                                        <option>NOAKHALI</option>
                                                                        <option>RANGAMATI </option>
                                                                        <option>RAJBARI</option>
                                                                        <option>SHARIATPUR</option>
                                                                        <option>SHERPUR</option>
                                                                        <option>TANGAIL</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form__group mb--10">
                                                                    <input type="text" name="calc_shipping_city" id="calc_shipping_city" placeholder="Town / City">
                                                                </div>

                                                                <div class="form__group mb--10">
                                                                    <input type="text" name="calc_shipping_zip" id="calc_shipping_zip" placeholder="Postcode / Zip">
                                                                </div>

                                                                <div class="form__group">
                                                                    <input type="submit" value="Update Totals">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </td>  
                                                </tr>
                                                -->
                                                <tr class="order-total">
                                                    <th>รวม</th>
                                                    <td>
                                                        <span class="product-price-wrapper">
                                                            <span class="money">$<?php echo number_format($grand_total,2);?></span>
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <a href="checkout.php" class="btn btn-fullwidth btn-style-1">
                                    ดำเนินการขั้นตอนต่อไป
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Wrapper Start -->

        <!-- Breadcrumb area Start -->

        <div style="background-color: #f5bcbc !important;" class="breadcrumb-area bg--white-6 breadcrumb-bg-1 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">ตะกร้า</h1>
                        <ul class="breadcrumb justify-content-center">
                            <li><a href="/shop-sidebar.php">หน้าหลัก</a></li>
                            <li class="current"><span>ตะกร้า</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb area End -->


        <!-- Search from Start --> 
        <div class="searchform__popup" id="searchForm">
            <a href="#" class="btn-close"><i class="dl-icon-close"></i></a>
            <div class="searchform__body">
                <p>Start typing and press Enter to search</p>
                <form class="searchform">
                    <input type="text" name="search" id="search" class="searchform__input" placeholder="Search Entire Store...">
                    <button type="submit" class="searchform__submit"><i class="dl-icon-search10"></i></button>
                </form>
            </div>
        </div>
        <!-- Search from End --> 
        

        <!-- Mini Cart Start -->
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
                        <div class="airi-element-carousel product-image-carousel nav-vertical-center nav-style-1"
                                data-slick-options='{
                                    "slidesToShow": 1,
                                    "slidesToScroll": 1,
                                    "arrows": true,
                                    "prevArrow": "dl-icon-left",
                                    "nextArrow": "dl-icon-right"
                                }'
                        >
                            <div class="product-image">
                                <div class="product-image--holder">
                                    <a href="product-details.html">
                                        <img src="assets/img/products/prod-9-1.jpg" alt="Product Image" class="primary-image">
                                    </a>
                                </div>
                                <span class="product-badge sale">sale</span>
                            </div>
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
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="modal-box product-summary">
                            <div class="product-navigation mb--10">
                                <a href="#" class="prev"><i class="dl-icon-left"></i></a>
                                <a href="#" class="next"><i class="dl-icon-right"></i></a>
                            </div>
                            <h3 class="product-title mb--15">Waxed-effect pleated skirt</h3>
                            <span class="product-price-wrapper mb--20">
                                <span class="money">$49.00</span>
                                <span class="product-price-old">
                                    <span class="money">$60.00</span>
                                </span>
                            </span>
                            <p class="product-short-description mb--25 mb-md--20">Donec accumsan auctor iaculis. Sed suscipit arcu ligula, at egestas magna molestie a. Proin ac ex maximus, ultrices justo eget, sodales orci. Aliquam egestas libero ac turpis pharetra, in vehicula lacus scelerisque. Vestibulum ut sem laoreet, feugiat tellus at, hendrerit arcu.</p>
                            <div class="product-action d-flex flex-row align-items-center mb--30">
                                <div class="quantity">
                                    <input type="number" class="quantity-input" name="qty" id="qty" value="1" min="1">
                                </div>
                                <button type="button" class="btn btn-style-1 btn-semi-large add-to-cart" onclick="window.location.href='cart.html'">
                                    Add To Cart
                                </button>
                                <a href="wishlist.html"><i class="dl-icon-heart2"></i></a>
                                <a href="compare.html"><i class="dl-icon-compare2"></i></a>
                            </div>  
                            <div class="product-extra mb--30">
                                <a href="#" class="font-size-12"><i class="fa fa-map-marker"></i>Find store near you</a>
                                <a href="#" class="font-size-12"><i class="fa fa-exchange"></i>Delivery and return</a>
                            </div>
                            <div class="product-summary-footer d-flex justify-content-between flex-sm-row flex-column flex-sm-row flex-column">
                                <div class="product-meta">
                                    <span class="sku_wrapper font-size-12">SKU: <span class="sku">REF. LA-887</span></span>
                                    <span class="posted_in font-size-12">Categories: <a href="shop-sidebar.html" rel="tag">Fashions</a></span>
                                </div>
                                <div class="product-share-box">
                                    <span class="font-size-12">Share With</span>
                                    <!-- Social Icons Start Here -->
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
                                </div>
                            </div>
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
    
</body>
    <script>
    <?php
      echo 'var cus_id="";'; 
    ?>       
        $(document).ready(function(){
            $(".quantity .qtybutton.dec").click(function(){
                //console.log($(this).prev().val());
                del2Cart($(this).prev().data('id'));
            });
            $(".quantity .qtybutton.inc").click(function(){
                //console.log($(this).prev().prev().val());
                add2Cart($(this).prev().prev().data('id'),1);
            });
        });

        //$(".inc.qtybutton").val();        
    </script>
    <script src="cart.js"></script>
    <script src="info.js"></script>

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