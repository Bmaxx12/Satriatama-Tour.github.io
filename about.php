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

    <link rel="stylesheet" href="style.css" />

    <style>
    .paragraph {
        line-height: 1.5;
    }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?> 
    <section id="page-header" class="about-header">
<h2>#TravelWithUs</h2>
<p>#TravelWithUs - Providing Unforgettable Travel Experiences</p>
</section>

<section id="about-head" class="section-p1">
    <img src="img/about/x2.jpg" alt="" />
    <div>
        <h2>About Us</h2>
        <p class="paragraph">
            SatriatamaTour adalah agen tour & travel online yang menyediakan berbagai paket wisata berkualitas tinggi.
            Didirikan pada tahun 2010, kami berkomitmen untuk memberikan pengalaman liburan yang tak terlupakan bagi pelanggan kami,
            melalui layanan yang profesional, website yang ramah pengguna, serta destinasi wisata terbaik di dalam dan luar negeri.
            Pesan perjalanan Anda bersama kami dan nikmati pengalaman liburan yang aman, nyaman, dan menyenangkan.
        </p>
        <br /><br />
        <marquee direction="right" bgcolor="#ccc" loop="-1" scrollamount="5">Liburan Lebih Seru Bersama SatriatamaTour!</marquee>
    </div>
</section>

<section id="vision-mission" class="section-p1">
    <div>
        <h2>Visi Kami</h2>
        <p class="paragraph">
            Menjadi agen tour & travel online terpercaya yang menyediakan pengalaman liburan berkualitas dengan pelayanan terbaik,
            membantu pelanggan menciptakan momen berharga di setiap destinasi.
        </p>
    </div>
    <div>
        <h2>Misi Kami</h2>
        <p class="paragraph">
            1. Menawarkan berbagai pilihan paket wisata dengan harga kompetitif dan kualitas terbaik.<br>
            2. Memberikan kemudahan dalam proses pemesanan secara online, cepat, dan aman.<br>
            3. Memberikan layanan pelanggan yang profesional, ramah, dan responsif.<br>
            4. Membangun hubungan jangka panjang dengan pelanggan melalui kepercayaan dan kepuasan.<br>
            5. Terus berinovasi untuk menghadirkan destinasi dan pengalaman wisata terbaru sesuai kebutuhan pelanggan.
        </p>
    </div>
</section>


    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="img/features/f1.png" alt="" />
            <h6>Free Shipping</h6>
        </div>
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
window.addEventListener("unload", function() {
  // Call a PHP script to log out the user
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "logout.php", false);
  xhr.send();
});
</script>
