<?php
session_start();
include("include/connect.php");

// Validasi awal session
if (!isset($_SESSION['aid'])) {
  $_SESSION['aid'] = -1;
}
$aid = $_SESSION['aid'];

// Ambil pid dari URL jika ada
$pid = isset($_GET['pid']) ? intval($_GET['pid']) : 0;

// Proses Tambah ke Cart
if (isset($_POST['submit']) && $pid > 0) {
  $qty = intval($_POST['qty']);
  if ($aid < 0) {
    header("Location: login.php");
    exit();
  }

  $query = "SELECT * FROM cart WHERE aid = $aid AND pid = $pid";
  $result = mysqli_query($con, $query);

  if (mysqli_fetch_assoc($result)) {
    echo "<script>alert('Item already added to cart')</script>";
    header("Location: cart.php");
    exit();
  } else {
    $query = "INSERT INTO cart (aid, pid, cqty) VALUES ($aid, $pid, $qty)";
    mysqli_query($con, $query);
    header("Location: shop.php");
    exit();
  }
}

// Tambah Wishlist
if (isset($_GET['w'])) {
  $pid = intval($_GET['w']);
  if ($aid < 0) {
    header("Location: login.php");
    exit();
  }

  $query = "INSERT INTO wishlist (aid, pid) VALUES ($aid, $pid)";
  mysqli_query($con, $query);
  header("Location: sproduct.php?pid=$pid");
  exit();
}

// Hapus Wishlist
if (isset($_GET['nw'])) {
  $pid = intval($_GET['nw']);
  $query = "DELETE FROM wishlist WHERE aid = $aid AND pid = $pid";
  mysqli_query($con, $query);
  header("Location: sproduct.php?pid=$pid");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WeComputer</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <style>
    .heart { margin-left: 25px; display: inline-flex; justify-content: center; align-items: center; }
    .star i { font-size: 12px; color: rgb(243, 181, 25); }
    .tb { max-height: 400px; overflow-x: auto; overflow-y: auto; }
    .tb tr { height: 60px; }
    .tb td { text-align: center; padding-left: 40px; padding-right: 40px; }
    .rev { margin: 70px; }
  </style>
</head>
<body>

<section id="header">
  <a href="index.php"><img src="img/aku.png" class="logo" alt="" /></a>
  <div>
    <ul id="navbar">
      <li><a href="index.php">Home</a></li>
      <li><a class="active" href="shop.php">Shop</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="contact.php">Contact</a></li>
      <?php
        if ($aid < 0) {
          echo "<li><a href='login.php'>Login</a></li><li><a href='signup.php'>SignUp</a></li>";
        } else {
          echo "<li><a href='profile.php'>Profile</a></li>";
        }
      ?>
      <li><a href="admin.php">Admin</a></li>
      <li id="lg-bag"><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
      <a href="#" id="close"><i class="far fa-times"></i></a>
    </ul>
  </div>
  <div id="mobile">
    <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
    <i id="bar" class="fas fa-outdent"></i>
  </div>
</section>

<?php
if ($pid > 0) {
  $query = "SELECT * FROM products WHERE pid = $pid";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);

  if ($row) {
    $pname = $row['pname'];
    $desc = $row['description'];
    $qty = $row['qtyavail'];
    $price = $row['price'];
    $cat = $row['category'];
    $img = $row['img'];

    $wishlist_query = "SELECT * FROM wishlist WHERE aid = $aid AND pid = $pid";
    $wishlist_result = mysqli_query($con, $wishlist_query);
    $wish = mysqli_fetch_assoc($wishlist_result);

    echo "
    <section id='prodetails' class='section-p1'>
      <div class='single-pro-image'>
        <img src='product_images/$img' width='100%' id='MainImg' alt='' />
      </div>
      <div class='single-pro-details'>
        <h2>$pname</h2>
        <h4>Rp$price</h4>
        <form method='post'>
          <input type='number' name='qty' value='1' min='1' max='$qty'/>
          <button class='normal' name='submit'>Add to Cart</button>";

    if ($wish)
      echo "<a class='heart' href='sproduct.php?nw=$pid'><img src='img/full.png' width='40' height='40' alt='Full Heart'/></a>";
    else
      echo "<a class='heart' href='sproduct.php?w=$pid'><img src='img/empty.png' width='40' height='40' alt='Empty Heart'/></a>";

    echo "</form>
          <h4>Product Details</h4>
          <span>$desc</span>
        </div>
      </section>";
  }

  // Tampilkan review
  $review_query = "SELECT * FROM reviews 
                   JOIN orders ON reviews.oid = orders.oid 
                   JOIN accounts ON orders.aid = accounts.aid 
                   WHERE reviews.pid = $pid";
  $review_result = mysqli_query($con, $review_query);

  if (mysqli_num_rows($review_result) > 0) {
    echo "<div class='rev'>
    <h2>Reviews</h2>
    <div class='tb'>
    <table><thead><tr><th>Username</th><th style='min-width:100px;'>Rating</th><th>Text</th></tr></thead><tbody>";

    while ($row = mysqli_fetch_assoc($review_result)) {
      $user = $row['username'];
      $rtext = $row['rtext'];
      $stars = intval($row['rating']);
      $empty = 5 - $stars;

      echo "<tr><td>$user</td><td style='min-width: 200px;'><div class='star'>";
      echo str_repeat("<i class='fas fa-star'></i>", $stars);
      echo str_repeat("<i class='far fa-star'></i>", $empty);
      echo "</div></td><td><span>$rtext</span></td></tr>";
    }

    echo "</tbody></table></div></div>";
  }
}
?>

<footer class="section-p1">
  <div class="col">
    <img class="logo" src="img/aku.png" />
    <h4>Contact</h4>
    <p><strong>Address:</strong> Sawah Dan Kebun, Jurangmangu, Pemalang, Jawa Tengah</p>
    <p><strong>Phone:</strong> +6281806336701</p>
    <p><strong>Hours:</strong> 9am-5pm</p>
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
    <p>2025. SatriatamaTour. Copyright</p>
  </div>
</footer>

<script>
  var MainImg = document.getElementById("MainImg");
  var smallimg = document.getElementsByClassName("small-img");
  for (let i = 0; i < smallimg.length; i++) {
    smallimg[i].onclick = function () {
      MainImg.src = smallimg[i].src;
    };
  }
</script>
<script src="script.js"></script>

<script>
  window.addEventListener("unload", function () {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "logout.php", false);
    xhr.send();
  });
</script>
</body>
</html>
