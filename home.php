<?php
session_start();

if (empty($_SESSION['aid']))
    $_SESSION['aid'] = -1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SatriatamaTour</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" />


</head>

<body>
<?php include 'navbar.php'; ?> 
    <section id="hero">
        <h4>Limited-Time Travel Offer</h4>
        <h2>Exclusive Deals for Trip</h2>
        <h1>On All Destinations</h1>
        <p>Save big with special coupons & discounts up to 70% — Book now and travel smart!</p>
        <a href="shop.php">
            <button>Book Now</button>
        </a>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="img/features/f2.png" alt="" />
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f3.png" alt="" />
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f4.png" alt="" />
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f5.png" alt="" />
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f6.png" alt="" />
            <h6>24/7 Support</h6>
        </div>
    </section>


    <section id="banner" class="section-m1">
        <h4>Summer Holiday Deals</h4>
        <h2>Save up to <span>70% Off</span> on All Destinations</h2>
        <a href="shop.php">
            <button class="normal">Explore More</button>
        </a>
    </section>

    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>Hot Deals</h4>
            <h2>Book a tour, get a free travel kit</h2>
            <span>The best tour packages are now on sale at SatriatamaTour</span>
            <a href="shop.php">
                <button class="white">Learn More</button>
            </a>
        </div>
        <div class="banner-box banner-box2">
            <h4>Coming This Week</h4>
            <h2>Summer Escape Deals</h2>
            <span>The best destinations with special discounts at WeTravel</span>
            <a href="shop.php">
                <button class="white">Explore</button>
            </a>
        </div>
    </section>

        <section id="banner3">
            <div class="banner-box">
                <h2>Bali Adventure</h2>
                <h3>25% OFF</h3>
            </div>
            <div class="banner-box banner-box2">
                <h2>Thailand Getaway</h2>
                <h3>30% OFF</h3>
            </div>
            <div class="banner-box banner-box3">
                <h2>Europe Tour</h2>
                <h3>50% OFF</h3>
            </div>
        </section>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="img/aku.png" />
            <h4>Contact</h4>
            <p>
                <strong>Address: </strong> Sawah Dan Kebun, Jurangmangu, Kec. Pulosari, Kabupaten Pemalang, Jawa Tengah

            </p>
            <p>
                <strong>Phone: </strong> +6281806336701
            </p>
            <p>
                <strong>Hours: </strong> 9am-5pm
            </p>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="cart.php">View Cart</a>
            <a href="wishlist.php">My Wishlist</a>
        </div>
        <div class="col install">
            <p>Secured Payment Gateways</p>
            <img src="img/pay/pay.png" />
        </div>
        <div class="copyright">
            <p>2025. SatriatamaTour. copyright </p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>

<script>
window.addEventListener("onunload", function() {
  // Call a PHP script to log out the user
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "logout.php", false);
  xhr.send();
});
</script>
