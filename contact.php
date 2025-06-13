<?php
session_start();
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

</head>

<body>
<?php include 'navbar.php'; ?>

    <section id="contact-details" class="section-p1">
        <div class="details">
            <h2>Kunjungi salah satu lokasi agensi kami atau hubungi kami hari ini</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="fal fa-map"></i>
                    <p>Jl. Padjajaran Jl. Ring Road Utara No.104, Ngropoh, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283</p>
                </li>
                <li>
                    <i class="fal fa-envelope"></i>
                    <p>upnyk.ac.id</p>
                </li>
                <li>
                    <i class="fal fa-phone-alt"></i>
                    <p>+6281806336701</p>
                </li>
                <li>
                    <i class="fal fa-clock"></i>
                    <p>Monday to Saturday: 9am to 5pm</p>

                </li>
            </div>
        </div>
        <div class="map">
            <iframe
                src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=upn%20veteran%20yogyakarta%20Yogyakarta+(UPN%20%22VETERAN%22%20YOGYAKARTA)&amp;t=k&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
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