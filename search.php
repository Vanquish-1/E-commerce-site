<?php
  include("connect.php");
  if (!isset($_GET["search"])) {
    header("location:./");
    die;
  } 
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SEARCH</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="shortcut icon" href="./images/ubani fav1.png" style="height: 390px;">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
   <!----> <div class="offcanvas-menu-overlay"></div>
   <!----> <div class="offcanvas-menu-wrapper">
       <!---- <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>-->
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
            <a href="#"><img src="img/icon/heart.png" alt=""></a>
            <a href="#"><img src="img/icon/cart.png" alt=""> <span></span></a>
            <div class="price"></div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p></p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
  <!---- <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <a href="#"></a>
                                <a href="#"></a>
                            </div>
                            <div class="header__top__hover">
                                <span> <i class="arrow_carrot-down"></i></span>
                                <ul>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/Utp1.png" alt="" style="width:96px; height:29px;"></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="./index.html">Home</a></li>
                            <li><a href="#">Shop</a>
                                <ul class="dropdown">
                                    <li><a href="./shop.html">Watch</a></li>
                                    <li><a href="./shop.html">Jewellery</a></li>
                                    <li><a href="./shop.html">Shoes</a></li>
                                    <li><a href="./shop.html">Bags</a></li>
                                    <li><a href="./shop.html">Pants</a></li>
                                    <li><a href="./shop.html">Dildo</a></li>
                                    <li><a href="./shop.html">Lubs</a></li>
                                    <li><a href="./shop.html">Earpods</a></li>
                                </ul>
                            </li>
                            <li><a href="./about.html">About Us</a></li>
                            </li>
                        
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""action="search.php" method="GET"></a>
                        <a href="#"><img src="img/icon/heart.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>

<div class="jumbotron">
    <center>
<form action="search.php" method="GET">
    <?php
        $search = strip_tags($_GET["search"]);
    ?>
    <input class="form-control searchbar" type="search" placeholder="Search" aria-label="Search" name="search" value="<?php echo $search; ?>">
    <br/>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
</center>
</div>
<div id="search">
<div class="container">
<div class="row">
  <?php
    $q = mysqli_query($db, "SELECT * FROM products WHERE product_title LIKE '%$search%' OR product_category LIKE '%$search%' ORDER BY RAND()");
    $search = mysqli_real_escape_string($db, $_GET["search"]);
    if (mysqli_num_rows($q) == 0) {?>
        <div class="col-sm-12">
            <br/>
            <center><h3>No results matching your search terms</h4></center>
            <br/>
        </div>
    <?php
    }
    else {?>
        <div class="col-sm-12">
            <br/>
            <center><h3><?php echo mysqli_num_rows($q); ?> result(s) found</h4></center>
            <br/>
        </div>
    <?php
    }
    while ($r = mysqli_fetch_array($q)) {?>
      <div class="col-sm">        
          <img src="<?php echo $r['product_image']; ?>" style="height:400px;width:282px;">
          <i>$<?php echo $r['product_price']; ?></i>
          <br/>
          <br/>
          <center><cite style="width:100%;color:black;font-size:11px;font-weight:bold"><?php echo $r['product_title']; ?></cite></center>
          <center><a href="single-product.php?id=<?php echo $r['id']; ?>"><button class="btn btn-outline-light btn-sm" style="background-color:#">ORDER NOW</button></a></center>
      </div class="col-sm">
    <?php
    }
  ?>
</div>
</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js" integrity="sha256-fIkQKQryItPqpaWZbtwG25Jp2p5ujqo/NwJrfqAB+Qk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js" integrity="sha256-lPE3wjN2a7ABWHbGz7+MKBJaykyzqCbU96BJWjio86U=" crossorigin="anonymous"></script>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>