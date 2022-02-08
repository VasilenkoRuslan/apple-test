<?php

class ThemeHeader
{
  public $acf_fields;
  function __construct() {
    $this->acf_fields = get_field('header','options');
  }
  /*
   * header top
   */
  function get_header_top()
  {
    global $temp_site_dir; //Todo: delete before production
    $block = <<<HTML
<!-- header top start -->
<div class="header-top theme1 bg-dark py-15">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-7 order-last order-md-first">
                <div class="static-info text-center text-md-left">
                    <p class="text-white">Join our showroom and get <span class="theme-color">50 % off</span> !
                        Coupon code : <span class="theme-color">Junno50</span></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-5">
                <nav class="navbar-top pb-2 pb-md-0 position-relative">
                    <ul class="d-flex justify-content-center justify-content-md-end align-items-center">
                        <li>
                            <a href="#" id="dropdown1" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">Setting <i class="ion ion-ios-arrow-down"></i></a>
                            <ul class="topnav-submenu dropdown-menu" aria-labelledby="dropdown1">
                                <li><a href="myaccount.html">My account</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="login.html">Sign out</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" id="dropdown2" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">USD $ <i class="ion ion-ios-arrow-down"></i> </a>
                            <ul class="topnav-submenu dropdown-menu" aria-labelledby="dropdown2">
                                <li class="active"><a href="#">EUR €</a></li>
                                <li><a href="#">USD $</a></li>
                            </ul>
                        </li>
                        <li class="english">
                            <a href="#" id="dropdown3" class="pr-0" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <img src="{$temp_site_dir}assets/img/logo/us-flag.jpg" alt="us flag">
                                English
                                <i class="ion ion-ios-arrow-down"></i>
                            </a>
                            <ul class="topnav-submenu dropdown-menu" aria-labelledby="dropdown3">
                                <li class="active">
                                    <a href="#"><img src="{$temp_site_dir}assets/img/logo/us-flag.jpg"
                                                     alt="us flag">
                                        English</a>
                                </li>
                                <li>
                                    <a href="#"><img src="{$temp_site_dir}assets/img/logo/france.jpg"
                                                     alt="france flag">
                                        Français</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- header top end -->
HTML;
    return $block;
  }

  /*
   * header logo
   */
  function get_logo()
  {
    $logo_url = home_url('/');
    $logo_image = $this->acf_fields['logo']['sizes']['thumbnail'];
    $block = <<<HTML
<div class="col-sm-6 col-lg-2 order-first">
  <div class="logo text-center text-sm-left mb-30 mb-sm-0">
    <a href="{$logo_url}"><img src="{$logo_image}" alt="logo"></a>
  </div>
</div>
HTML;
    return $block;
  }

  /*
 * header Phone,icons, toggle btn menu
 */
  function get_phone()
  {
    global $temp_site_dir; //Todo: delete before production

    $phone_title = $this->acf_fields['phone']['phone_title'];
    $phone_number = $this->acf_fields['phone']['phone_number'];
    $block = <<<HTML
        <div class="media static-media mr-50 d-none d-lg-flex">
            <img class="mr-3 align-self-center" src="{$temp_site_dir}assets/img/icon/1.png"
                 alt="icon">
            <div class="media-body">
                <div class="phone">
                    <span class="text-muted">{$phone_title}</span>
                </div>
                <div class="phone">
                    <a href="tel:{$phone_number}" class="text-dark">{$phone_number}</a>
                </div>
            </div>
        </div>
HTML;
    return $block;
  }
  function get_main_icons()
  {
    $block = <<<HTML
        <!-- static-media end -->
        <div class="cart-block-links theme1">
            <ul class="d-flex">
                <li>
                    <a href="compare.html">
                    <span class="position-relative">
                        <i class="icon-shuffle"></i>
                        <span class="badge cbdg1">1</span>
                    </span>
                    </a>
                </li>
                <li>
                    <a class="offcanvas-toggle" href="#offcanvas-wishlist">
                    <span class="position-relative">
                        <i class="icon-heart"></i>
                        <span class="badge cbdg1">3</span>
                    </span>
                    </a>
                </li>
                <li class="mr-0 cart-block position-relative">
                    <a class="offcanvas-toggle" href="#offcanvas-cart">
                    <span class="position-relative">
                        <i class="icon-bag"></i>
                        <span class="badge cbdg1">3</span>
                    </span>
                        <span class="cart-total position-relative">$90.00</span>
                    </a>
                </li>
                <!-- cart block end -->
            </ul>
        </div>
HTML;
    return $block;
  }
  function get_toggle_btn()
  {
    $block = <<<HTML
<div class="mobile-menu-toggle theme1 d-lg-none">
    <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
        <svg viewbox="0 0 800 600">
            <path
                    d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                    id="top"></path>
            <path d="M300,320 L540,320" id="middle"></path>
            <path
                    d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                    id="bottom"
                    transform="translate(480, 320) scale(1, -1) translate(-480, -318)">
            </path>
        </svg>
    </a>
</div>
HTML;
    return $block;
  }
  function get_phone_and_icons_toggleBtn() {
    $html_phone = $this->get_phone();
    $html_icons = $this->get_main_icons();
    $html_toggle_btn = $this->get_toggle_btn();
    $html_block = <<<HTML
<div class="col-sm-6 col-lg-5 col-xl-4">
    <!-- search-form end -->
    <div class="d-flex align-items-center justify-content-center justify-content-sm-end">
        {$html_phone}
        {$html_icons}
        {$html_toggle_btn}
    </div>
</div>
HTML;
    return $html_block;
  }
  function get_mobile_menu() {
	  $mein_menu = wp_nav_menu( [
		  'theme_location'  => 'main',
		  'menu'            => '',
		  'container'       => 'div',
		  'container_class' => 'offcanvas-menu',
		  'container_id'    => '',
		  'menu_class'      => 'menu-text',
		  'menu_id'         => '',
		  'echo'            => false,
		  'fallback_cb'     => 'wp_page_menu',
		  'before'          => '',
		  'after'           => '',
		  'link_before'     => '',
		  'link_after'      => '',
		  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		  'depth'           => 0,
		  'walker'          => '',
	  ] );
    $block = <<<HTML
    <!-- offcanvas-mobile-menu start -->
    <div id="offcanvas-mobile-menu" class="offcanvas theme1 offcanvas-mobile-menu">
        <div class="inner">
            <div class="border-bottom mb-4 pb-4 text-right">
                <button class="offcanvas-close">×</button>
            </div>
            <div class="offcanvas-head mb-4">
                <nav class="offcanvas-top-nav">
                    <ul class="d-flex justify-content-center align-items-center">
                        <li class="mx-4"><a href="compare.html"><i class="ion-ios-loop-strong"></i> Compare
                                <span>(0)</span>
                            </a></li>
                        <li class="mx-4">
                            <a href="wishlist.html"> <i class="ion-android-favorite-outline"></i> Wishlist
                                <span>(0)</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
                                {$mein_menu}
            <div class="offcanvas-social py-30">
                <ul>
                    <li>
                        <a href="#"><i class="icon-social-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-social-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-social-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-social-google"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-social-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- offcanvas-mobile-menu end -->
HTML;
    return $block;
  }
  function get_wishlist() {
    global $temp_site_dir; //Todo: delete before production
    $block = <<<HTML
    <!-- OffCanvas Wishlist Start -->
    <div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist theme1">
        <div class="inner">
            <div class="head d-flex flex-wrap justify-content-between">
                <span class="title">Wishlist</span>
                <button class="offcanvas-close">×</button>
            </div>
            <ul class="minicart-product-list">
                <li>
                    <a href="single-product.html" class="image"><img
                                src="{$temp_site_dir}assets/img/product/4.jpg"
                                alt="Cart product Image"></a>
                    <div class="content">
                        <a href="single-product.html" class="title">Walnut Cutting Board</a>
                        <span class="quantity-price">1 x <span class="amount">$100.00</span></span>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
                <li>
                    <a href="single-product.html" class="image"><img
                                src="{$temp_site_dir}assets/img/product/5.jpg"
                                alt="Cart product Image"></a>
                    <div class="content">
                        <a href="single-product.html" class="title">Lucky Wooden Elephant</a>
                        <span class="quantity-price">1 x <span class="amount">$35.00</span></span>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
                <li>
                    <a href="single-product.html" class="image"><img
                                src="{$temp_site_dir}assets/img/product/6.jpg"
                                alt="Cart product Image"></a>
                    <div class="content">
                        <a href="single-product.html" class="title">Fish Cut Out Set</a>
                        <span class="quantity-price">1 x <span class="amount">$9.00</span></span>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
            </ul>
            <a href="wishlist.html" class="btn theme--btn-default btn--lg d-block d-sm-inline-block rounded-5 mt-30">view
                wishlist</a>
        </div>
    </div>
    <!-- OffCanvas Wishlist End -->
HTML;
    return $block;
  }
  function get_cart() {
    global $temp_site_dir; //Todo: delete before production
    $block = <<<HTML
    <!-- OffCanvas Cart Start -->
    <div id="offcanvas-cart" class="offcanvas offcanvas-cart theme1">
        <div class="inner">
            <div class="head d-flex flex-wrap justify-content-between">
                <span class="title">Cart</span>
                <button class="offcanvas-close">×</button>
            </div>
            <ul class="minicart-product-list">
                <li>
                    <a href="single-product.html" class="image"><img
                                src="{$temp_site_dir}assets/img/product/1.jpg"
                                alt="Cart product Image"></a>
                    <div class="content">
                        <a href="single-product.html" class="title">Walnut Cutting Board</a>
                        <span class="quantity-price">1 x <span class="amount">$100.00</span></span>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
                <li>
                    <a href="single-product.html" class="image"><img
                                src="{$temp_site_dir}assets/img/product/2.jpg"
                                alt="Cart product Image"></a>
                    <div class="content">
                        <a href="single-product.html" class="title">Lucky Wooden Elephant</a>
                        <span class="quantity-price">1 x <span class="amount">$35.00</span></span>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
                <li>
                    <a href="single-product.html" class="image"><img
                                src="{$temp_site_dir}assets/img/product/3.jpg"
                                alt="Cart product Image"></a>
                    <div class="content">
                        <a href="single-product.html" class="title">Fish Cut Out Set</a>
                        <span class="quantity-price">1 x <span class="amount">$9.00</span></span>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
            </ul>
            <div class="sub-total d-flex flex-wrap justify-content-between">
                <strong>Subtotal :</strong>
                <span class="amount">$144.00</span>
            </div>
            <a href="cart.html" class="btn theme--btn-default btn--lg d-block d-sm-inline-block rounded-5 mr-sm-2">view
                cart</a>
            <a href="checkout.html"
               class="btn theme-btn--dark1 btn--lg d-block d-sm-inline-block mt-4 mt-sm-0 rounded-5">checkout</a>
            <p class="minicart-message">Free Shipping on All Orders Over $100!</p>
        </div>
    </div>
    <!-- OffCanvas Cart End -->
HTML;
    return $block;
  }
  function get_main_menu() {
    $mein_menu = wp_nav_menu( [
      'theme_location'  => 'main',
      'menu'            => '',
      'container'       => 'div',
      'container_class' => '',
      'container_id'    => '',
      'menu_class'      => 'main-menu d-flex',
      'menu_id'         => '',
      'echo'            => false,
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      'depth'           => 0,
      'walker'          => '',
    ] );
    $block = <<<HTML
    <!-- header bottom start -->
    <nav id="sticky" class="header-bottom theme1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-10 offset-lg-2 d-flex flex-wrap align-items-center position-relative">
                    {$mein_menu}
                </div>
            </div>
        </div>
    </nav>
    <!-- header bottom end -->
HTML;
    return $block;
  }
  function get_mobile_categories() {
    $block = <<<HTML
<div class="mobile-category-nav theme1 d-lg-none py-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--=======  category menu  =======-->
                <div class="hero-side-category">
                    <!-- Category Toggle Wrap -->
                    <div class="category-toggle-wrap">
                        <!-- Category Toggle -->
                        <button class="category-toggle"><i class="fa fa-bars"></i> All Categories</button>
                    </div>

                    <!-- Category Menu -->
                    <nav class="category-menu">
                        <ul>
                            <li class="menu-item-has-children menu-item-has-children-1">
                                <a href="#">Accessories & Parts<i class="ion-ios-arrow-down"></i></a>
                                <!-- category submenu -->
                                <ul class="category-mega-menu category-mega-menu-1">
                                    <li><a href="#">Cables & Adapters</a></li>
                                    <li><a href="#">Batteries</a></li>
                                    <li><a href="#">Chargers</a></li>
                                    <li><a href="#">Bags & Cases</a></li>
                                    <li><a href="#">Electronic Cigarettes</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children menu-item-has-children-2">
                                <a href="#">Camera & Photo<i class="ion-ios-arrow-down"></i></a>
                                <!-- category submenu -->
                                <ul class="category-mega-menu category-mega-menu-2">
                                    <li><a href="#">Digital Cameras</a></li>
                                    <li><a href="#">Camcorders</a></li>
                                    <li><a href="#">Camera Drones</a></li>
                                    <li><a href="#">Action Cameras</a></li>
                                    <li><a href="#">Photo Studio Supplies</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children menu-item-has-children-3">
                                <a href="#">Smart Electronics <i class="ion-ios-arrow-down"></i></a>
                                <!-- category submenu -->
                                <ul class="category-mega-menu category-mega-menu-3">
                                    <li><a href="#">Wearable Devices</a></li>
                                    <li><a href="#">Smart Home Appliances</a></li>
                                    <li><a href="#">Smart Remote Controls</a></li>
                                    <li><a href="#">Smart Watches</a></li>
                                    <li><a href="#">Smart Wristbands</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children menu-item-has-children-4">
                                <a href="#">Audio & Video <i class="ion-ios-arrow-down"></i></a>
                                <!-- category submenu -->
                                <ul class="category-mega-menu category-mega-menu-4">
                                    <li><a href="#">Televisions</a></li>
                                    <li><a href="#">TV Receivers</a></li>
                                    <li><a href="#">Projectors</a></li>
                                    <li><a href="#">Audio Amplifier Boards</a></li>
                                    <li><a href="#">TV Sticks</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children menu-item-has-children-5">
                                <a href="#">Portable Audio & Video <i class="ion-ios-arrow-down"></i></a>
                                <!-- category submenu -->
                                <ul class="category-mega-menu category-mega-menu-5">
                                    <li><a href="#">Headphones</a></li>
                                    <li><a href="#">Speakers</a></li>
                                    <li><a href="#">MP3 Players</a></li>
                                    <li><a href="#">VR/AR Devices</a></li>
                                    <li><a href="#">Microphones</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children menu-item-has-children-6">
                                <a href="#">Video Game <i class="ion-ios-arrow-down"></i></a>
                                <!-- category submenu -->
                                <ul class="category-mega-menu category-mega-menu-6">
                                    <li><a href="#">Handheld Game Players</a></li>
                                    <li><a href="#">Game Controllers</a></li>
                                    <li><a href="#">Joysticks</a></li>
                                    <li><a href="#">Stickers</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Televisions</a></li>
                            <li><a href="#">Digital Cameras</a></li>
                            <li><a href="#">Headphones</a></li>
                            <li><a href="#">Wearable Devices</a></li>
                            <li><a href="#">Smart Watches</a></li>
                            <li><a href="#">Game Controllers</a></li>
                            <li><a href="#"> Smart Home Appliances</a></li>
                            <li class="hidden"><a href="#">Projectors</a></li>
                            <li>
                                <a href="#" id="more-btn"><i class="ion-ios-plus-empty"></i>
                                    More Categories</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=======  End of category menu =======-->
HTML;
    return $block;
  }
}