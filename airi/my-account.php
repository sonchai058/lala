<?php
 include("./inc-items-data.php");
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    
    <link rel="shortcut icon" href="assets/lala/logo.PNG" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/lala/logo.PNG">
    <link rel="icon" href="assets/lala/logo.PNG" type="image/x-icon">

    <!-- Title -->
    <title>โปรไฟล์</title>

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
                    <div class="row pt--80 pt-md--60 pt-sm--40 pb--80 pb-md--60 pb-sm--40">
                        <div class="col-12">
                            <div class="user-dashboard-tab flex-column flex-md-row">
                                <div style="display:none" class="user-dashboard-tab__head nav flex-md-column" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link" data-toggle="pill" role="tab" href="#accountdetails" aria-controls="accountdetails" aria-selected="true">โปรไฟล์ (ที่อยู่)</a>
                                    <a class="nav-link" data-toggle="pill" role="tab" href="#orders" aria-controls="orders">ออเดอร์ของฉัน</a>
                                </div>
                                <div class="user-dashboard-tab__content tab-content">
                                    <div class="tab-pane fade show active" id="dashboard">
                                        <p>Hello <strong>John</strong> (not <strong>John</strong>? <a href="login.html">Log out</a>)</p>
                                        <p>From your account dashboard. you can easily check &amp; view your <a href="">recent orders</a>, manage your <a href="">shipping and billing addresses</a> and <a href="">edit your password and account details</a>.</p>
                                    </div>
                                    <div class="tab-pane fade" id="orders">
                                        <div class="message-box mb--30 d-none">
                                            <p><i class="fa fa-check-circle"></i>No order has been made yet.</p>
                                            <a href="shop-sidebar.html">Go Shop</a>
                                        </div>
                                        <div class="table-content table-responsive">
                                            <table class="table text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td class="wide-column">September 19, 2018</td>
                                                        <td>Processing</td>
                                                        <td class="wide-column">$49.00 for 1 item</td>
                                                        <td><a href="product-details.html" class="btn btn-medium btn-style-1">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td class="wide-column">September 19, 2018</td>
                                                        <td>Processing</td>
                                                        <td class="wide-column">$49.00 for 1 item</td>
                                                        <td><a href="product-details.html" class="btn btn-medium btn-style-1">View</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="downloads">
                                        <div class="message-box mb--30 d-none">
                                            <p><i class="fa fa-exclamation-circle"></i>No downloads available yet.</p>
                                            <a href="shop-sidebar.html">Go Shop</a>
                                        </div>
                                        <div class="table-content table-responsive">
                                            <table class="table text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Downloads</th>
                                                        <th>Expires</th>
                                                        <th>Download</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="wide-column">Airi - Ecommerce Bootstrap Template</td>
                                                        <td>August 10, 2018 </td>
                                                        <td class="wide-column">Never</td>
                                                        <td><a href="#" class="btn btn-medium btn-style-1">Download File</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="wide-column">Airi - Ecommerce Bootstrap Template</td>
                                                        <td>August 10, 2018 </td>
                                                        <td class="wide-column">Never</td>
                                                        <td><a href="#" class="btn btn-medium btn-style-1">Download File</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="addresses">
                                        <p class="mb--20">The following addresses will be used on the checkout page by default.</p>
                                        <div class="row">
                                            <div class="col-md-6 mb-sm--20">
                                                <div class="text-block">
                                                    <h4 class="mb--20">Billing address</h4>
                                                    <a href="">Edit</a>
                                                    <p>You have not set up this type of address yet.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-block">
                                                    <h4 class="mb--20">Shopping address</h4>
                                                    <a href="">Edit</a>
                                                    <p>You have not set up this type of address yet.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="accountdetails">
                                        <form action="#" class="form form--account" name="profile" id="profile" method="post">
                                            <input type="hidden" name="useridprofilefield">
                                            <div id="load" style="display: none;position:absolute; right:0; top:0">กำลังเชื่อมโยงกับไลน์...</div> 
                                            <div class="row grid-space-30 mb--20">
                                                <div class="col-md-6 mb-sm--20">
                                                    <div class="form__group">
                                                        <label class="form__label" for="cus_fname">ชื่อ <span class="required">*</span></label>
                                                        <input type="text" name="cus_fname" id="cus_fname" class="form__input">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form__group">
                                                        <label class="form__label" for="cus_lname">นามสกุล</label>
                                                        <input type="text" name="cus_lname" id="cus_lname" class="form__input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb--20">
                                                <div class="col-6">
                                                    <div class="form__group">
                                                        <label class="form__label" for="mobile_no">มือถือ <span class="required">*</span></label>
                                                        <input type="text" name="mobile_no" id="mobile_no" class="form__input">

                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form__group">
                                                    <label class="form__label" for="bt_search_mobile">&nbsp;</label>
                                                        <a href="javascript:void(0)" class="btn btn-style-1 btn-submit" id="bt_search_mobile" style="margin-top: -3px;margin-left: -10px;color:#fff;/* width: 15px !important; */padding: 17px;"><i class="dl-icon-search10">&nbsp;ค้นจากเบอร์&nbsp;&nbsp;</i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb--20">
                                                <div class="col-12">
                                                    <div class="form__group">
                                                        <label class="form__label" for="email_addr">อีเมล</label>
                                                        <input type="email" name="email_addr" id="email_addr" class="form__input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb--20">
                                                <div class="col-12">
                                                    <div class="form__group">
                                                        <label class="form__label" for="iso_code">ISO Code</label>
                                                        <div style="float:left;">  
                                                            <input checked type="radio" value="TH" name="iso_code" id="" class="form__input"> TH &nbsp;&nbsp;
                                                        </div>
                                                        <div style="float:left">
                                                            <input type="radio" value="EN" name="iso_code" id="" class="form__input"> EN &nbsp;&nbsp;
                                                        </div>
                                                        <div style="float:left">
                                                        <input type="radio" value="CH" name="iso_code" id=""     class="form__input"> CH &nbsp;&nbsp;
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <fieldset class="form__fieldset mb--20">
                                                <legend class="form__legend">(ที่อยู่สำหรับจัดส่งสินค้า)</legend>
                                                <div class="row mb--20">
                                                    <div class="col-12">
                                                        <div class="form__group">
                                                            <label class="form__label" for="cur_pass">ที่อยู่</label>
                                                            <textarea name="addr_line1" id="addr_line1" class="" rows="7" style="width:100%"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb--20">
                                                    <div class="col-12">
                                                        <div class="form__group">
                                                            <label class="form__label" for="addr_prov">จังหวัด <span class="required">*</span></label>
                                                            <select type="text" name="addr_prov" id="addr_prov" class="form__input">
                                                                <option value="">เลือกจังหวัด</option>
                                                            <?php
                                                            $rows = mysqli_query($conn,"select * from sys_area where area_type='Province' AND iso_code='TH'");
                                                                while($value=mysqli_fetch_array($rows,MYSQLI_ASSOC)){
                                                            ?>
                                                                <option value="<?php echo $value['area_code'];?>"><?php echo $value['area_name'];?></option>
                                                            <?php 
                                                            }
                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb--20">
                                                    <div class="col-12">
                                                        <div class="form__group">
                                                            <label class="form__label" for="addr_city">อำเภอ <span class="required">*</span></label>
                                                            <select type="text" name="addr_city" id="addr_city" class="form__input">
                                                                <option>เลือกอำเภอ</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb--20">
                                                    <div class="col-12">
                                                        <div class="form__group">
                                                            <label class="form__label" for="addr_suburb">ตำบล <span class="required">*</span></label>
                                                            <select type="text" name="addr_suburb" id="addr_suburb" class="form__input">
                                                                <option>เลือกตำบล</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="row mb--20">
                                                <div class="col-12">
                                                    <div class="form__group">
                                                        <label class="form__label" for="addr_zipcode">รหัสไปรณีย์ <span class="required">*</span></label>
                                                        <input type="text" name="addr_zipcode" id="addr_zipcode" class="form__input">
                                                    </div>
                                                </div>
                                            </div>
                                            </fieldset>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form__group">
                                                        <input type="button" disabled="true" id="bt_submit" value="บันทึกข้อมูล" class="btn btn-style-1 btn-submit">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                <p>Start typing and press Enter to search</p>
                <form class="searchform">
                    <input type="text" name="search" id="search" class="searchform__input" placeholder="Search Entire Store...">
                    <button type="submit" class="searchform__submit"><i class="dl-icon-search10"></i></button>
                </form>
            </div>
        </div>
        <!-- Search from End --> 
        
        <!-- Breadcrumb area Start -->

        <div style="background-color: #f5bcbc !important;" class="breadcrumb-area bg--white-6 breadcrumb-bg-1 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">โปรไฟล์</h1>
                        <ul class="breadcrumb justify-content-center">
                            <li><a href="/shop-sidebar.php">หน้าหลัก</a></li>
                            <li class="current"><span>โปรไฟล์</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb area End -->

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
                            <div class="product-action d-flex flex-row align-items-center mb--30 mb-md--20">
                                <div class="quantity">
                                    <input type="number" class="quantity-input" name="qty" id="quick-qty" value="1" min="1">
                                </div>
                                <button type="button" class="btn btn-style-1 btn-semi-large add-to-cart" onclick="window.location.href='cart.html'">
                                    Add To Cart
                                </button>
                                <a href="wishlist.html"><i class="dl-icon-heart2"></i></a>
                                <a href="compare.html"><i class="dl-icon-compare2"></i></a>
                            </div>  
                            <div class="product-extra mb--30 mb-md--20">
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

    <script>
        setTimeout(function(){
            $(".nav-link:eq(0)").click();
        },400);

        $(document).ready(function(){
            setTimeout(function(){
                fullaction();
            },1000);
        });

    </script>
    <script src="info.js"></script>
</body>
<?php
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if($uriSegments[1]!='lala') {
?>
    <script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
    <script src="liff-starter.js"></script>
<?php
}
mysqli_close($conn);
?>
</html>