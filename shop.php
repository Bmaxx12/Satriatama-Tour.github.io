<?php
session_start();
if (empty($_SESSION['aid']))
    $_SESSION['aid'] = -1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SatriatamaTour</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .search-container {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            background: #e3e6f3;
            padding: 10px;
        }

        #category-filter, #search {
            padding: 6px;
            margin-right: 10px;
            border: none;
            border-radius: 4px;
        }

        #search-btn {
            padding: 10px 30px;
            background-color: navy;
            color: white;
            border-radius: 1rem;
            cursor: pointer;
        }

        .ticket-card {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            width: 90%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .ticket-image {
            width: 150px;
            height: 150px;
            background-color: #eee;
            margin-right: 20px;
            flex-shrink: 0;
        }

        .ticket-info {
            flex-grow: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ticket-details {
            display: flex;
            flex-direction: column;
        }

        .ticket-details h5 {
            margin: 0 0 10px;
        }

        .ticket-details .label {
            background-color: orange;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .ticket-details .meta {
            margin-top: 5px;
            color: #555;
        }

        .star {
            min-width: 120px;
            text-align: right;
        }

        .star i {
            color: gold;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<section id="page-header">
    <h2>SATRIATAMATOUR</h2>
</section>

<div class="search-container">
    <form id="search-form" method="post">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search">
        <label for="category-filter">Category:</label>
        <select id="category-filter" name="cat">
            <option value="all">All</option>
            <option value="Open Trip">Open Trip</option>
            <option value="Private Trip">Private Trip</option>
            <option value="Wisata Domestik">Wisata Domestik</option>
            <option value="Wisata Internasional">Wisata Internasional</option>
            <option value="Haji">Haji</option>
            <option value="Umroh">Umroh</option>
        </select>
        <button type="submit" id="search-btn" name="search1">Search</button>
    </form>
</div>

<?php
include("include/connect.php");
if (isset($_POST['search1'])) {
    $search = $_POST['search'];
    $category = $_POST['cat'];
    $query = "";
    if (!empty($search))
        $query = "select* from products where ((pname like '%$search%') or (brand like '%$search%') or (description like '%$search%'))";
    else
        $query = "select * from products";

    if ($category != "all") {
        if (empty($search)) {
            $query = $query . " where category = '$category'";
        } else {
            $query = $query . " and category = '$category'";
        }
    }

    $result = mysqli_query($con, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pid = $row['pid'];
            $pname = strlen($row['pname']) > 35 ? substr($row['pname'], 0, 35) . '...' : $row['pname'];
            $desc = $row['description'];
            $qty = $row['qtyavail'];
            $price = $row['price'];
            $cat = $row['category'];
            $img = $row['img'];

            $query2 = "SELECT pid, AVG(rating) AS average_rating FROM reviews where pid = $pid GROUP BY pid ";
            $result2 = mysqli_query($con, $query2);
            $row2 = mysqli_fetch_assoc($result2);
            $stars = $row2 ? round($row2['average_rating'], 0) : 0;
            $empty = 5 - $stars;

            echo "
            <div class='ticket-card' onclick='topage($pid)'>
                <img class='ticket-image' src='product_images/$img' alt='Product Image' />
                <div class='ticket-info'>
                    <div class='ticket-details'>
                        <span class='label'>$cat</span>
                        <h5>$pname</h5>
                        <div class='meta'>Rp$price</div>
                    </div>
                    <div class='star'>";
            for ($i = 1; $i <= $stars; $i++) echo "<i class='fas fa-star'></i>";
            for ($i = 1; $i <= $empty; $i++) echo "<i class='far fa-star'></i>";
            echo "</div>
                </div>
            </div>";
        }
    }
} else {
    $select = "Select* from products where qtyavail > 0 order by rand()";
    $result = mysqli_query($con, $select);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pid = $row['pid'];
            $pname = strlen($row['pname']) > 35 ? substr($row['pname'], 0, 35) . '...' : $row['pname'];
            $desc = $row['description'];
            $qty = $row['qtyavail'];
            $price = $row['price'];
            $cat = $row['category'];
            $img = $row['img'];

            $query2 = "SELECT pid, AVG(rating) AS average_rating FROM reviews where pid = $pid GROUP BY pid ";
            $result2 = mysqli_query($con, $query2);
            $row2 = mysqli_fetch_assoc($result2);
            $stars = $row2 ? round($row2['average_rating'], 0) : 0;
            $empty = 5 - $stars;

            echo "
            <div class='ticket-card' onclick='topage($pid)'>
                <img class='ticket-image' src='product_images/$img' alt='Product Image' />
                <div class='ticket-info'>
                    <div class='ticket-details'>
                        <span class='label'>$cat</span>
                        <h5>$pname</h5>
                        <div class='meta'>Rp$price</div>
                    </div>
                    <div class='star'>";
            for ($i = 1; $i <= $stars; $i++) echo "<i class='fas fa-star'></i>";
            for ($i = 1; $i <= $empty; $i++) echo "<i class='far fa-star'></i>";
            echo "</div>
                </div>
            </div>";
        }
    }
}
?>

<footer class="section-p1">
    <div class="col">
        <img class="logo" src="img/aku.png" />
        <h4>Contact</h4>
        <p><strong>Address:</strong> Sawah Dan Kebun, Jurangmangu, Kec. Pulosari, Kabupaten Pemalang, Jawa Tengah</p>
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
        <p>2025. SatriatamaTour. copyright </p>
    </div>
</footer>

<script>
function topage(pid) {
    window.location.href = `sproduct.php?pid=${pid}`;
}

window.addEventListener("unload", function() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "logout.php", false);
    xhr.send();
});
</script>

</body>
</html>