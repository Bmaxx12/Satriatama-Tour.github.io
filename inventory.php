<?php
include("include/connect.php");

if (isset($_POST['ins'])) {
	$pname = $_POST['name'];
	$category = $_POST['category'];
	$description = $_POST['description'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$image = $_FILES['photo']['name'];
	$temp_image = $_FILES['photo']['tmp_name'];

	if ($category == "all") {
		echo "<script> alert('select category'); setTimeout(function(){ window.location.href = 'inventory.php'; }, 100); </script>";
		exit();
	}

	move_uploaded_file($temp_image, "product_images/$image");

	$query = "insert into `products`(pname, category, description, price, qtyavail, img) values ('$pname', '$category', '$description', '$price', '$quantity', '$image')";

	$result = mysqli_query($con, $query);

	if ($result) {
		echo "<script> alert('Produk Berhasil Dimasukkan!') </script>";
	}
}

if (isset($_GET['pid'])) {

	$id = $_GET['pid'];
	$query = "DELETE FROM products WHERE pid = '$id'";

	$result = mysqli_query($con, $query);

    if ($result) {
		echo "<script> alert('Produk Berhasil Dihapus!') </script>";
	}

}

if (isset($_POST['submitt'])) {
	$pname = $_POST['name1'];
	$category = $_POST['category1'];
	$description = $_POST['description1'];
	$quantity = $_POST['quantity1'];
	$price = $_POST['price1'];
	$image = $_FILES['photo1']['name'];
	$temp_image = $_FILES['photo1']['tmp_name'];
	$pid2 = $_POST['pid1'];
	$image2 = $_POST['prevphoto'];
	$prevcat = $_POST['prev'];
	if ($category == "all") {
		$category = $prevcat;
	}

	if (!empty($image))
		move_uploaded_file($temp_image, "product_images/$image");

	if (!empty($image))
		$query = "Update `products` set pname = '$pname', category = '$category', description = '$description', qtyavail = $quantity, price = $price, img ='$image' where pid = $pid2";
	else
		$query = "Update `products` set pname = '$pname', category = '$category', description = '$description', qtyavail = $quantity, price = $price, img ='$image2' where pid = $pid2";

	$result = mysqli_query($con, $query);

	if ($result) {
		echo "<script> alert('Produk Berhasil di Update') </script>";
	}
}

if (isset($_GET['odd'])) {
	$oid = $_GET['odd'];

	$query = "UPDATE orders set datedel = CURDATE() where oid = $oid";

	$result = mysqli_query($con, $query);

	header("Location: inventory.php");
	exit();
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Manajemen SatriatamaTour</title>
    <link rel="stylesheet" href="style.css">
    <style>
    #d1 {


        width: 100%;
    }

    .container11 {
        max-width: 100%;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        overflow: auto;

    }

    #tab1 tr {
        width: 100%;
        height: 80px;

    }

    .btns {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .order-container h1 {
        margin-bottom: 0;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }

    .container1 {
        max-width: 100%;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
    }

    .form-container {
        width: 35%;
    }


    h1 {
        font-size: 36px;
        text-align: center;
        margin-bottom: 40px;
    }

    h2 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .search-container {
        width: 60%;
    }

    .form-container,
    .search-container {
        margin-bottom: 40px;
        padding: 20px;
        background-color: #f5f5f5;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .order-container {
        margin-bottom: 40px;
        padding: 20px;
        justify-content: center;
        background-color: #f5f5f5;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: 100%;
        overflow: auto;


    }

    #tb1 tr {
        height: 60px;
    }

    .form-container label,
    .search-container label {
        display: flex;
        margin-bottom: 10px;
        font-size: 16px;
        font-weight: bold;
    }

    .form-container input,
    .search-container input,
    .form-container select,
    .search-container select {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .form-container input[type="file"] {
        display: inline-block;
    }

    .inventory-container {
        padding: 20px;
        background-color: #f5f5f5;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .product {
        margin-bottom: 20px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        position: relative;
        display: flex;
    }

    .product-checkbox {
        position: absolute;
        top: 20px;
        right: 20px;
    }

    .product p {
        margin: 0;
        font-size: 16px;
        line-height: 1.5;
    }

    .product p span {
        font-weight: bold;
    }

    #delete-btn,
    #update-btn,
    #insert-btn,
    #search-btn,
    #all-btn,
    #delivered-btn,
    #undelivered-btn,
    #oupdate-btn,
    #up-btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        border: none;
        color: #fff;
        background-color: #088178;
        cursor: pointer;
        margin-right: 20px;
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 20px;
    }

    .insert-btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        border: none;
        color: #fff;
        background-color: #088178;
        cursor: pointer;
        margin-right: 20px;
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 20px;
    }

    #delete-btn:hover,
    #update-btn:hover,
    #insert-btn:hover,
    #search-btn:hover {
        background-color: #3e8e41;
    }

    #product-list {
        overflow-x: auto;
        height: 20%;
    }

    table {
        border-collapse: collapse;
        height: 350px;
        display: inline-block;
        width: 100%;
        overflow: auto;
    }

    .order-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .random {
        display: flex;
        justify-content: center;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
        white-space: nowrap;
    }

    th {
        background-color: #f2f2f2;

        position: sticky;
        top: 0;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    td img {
        max-width: 50px;
        max-height: 50px;
        margin-right: 10px;
    }

    td input[type="checkbox"] {
        margin-right: 10px;
    }

    td input[type="checkbox"]:hover {
        cursor: pointer;


    }

    #tab1 {
        height: auto;
        max-height: 900px;
        overflow-y: auto;
        overflow-x: auto;
    }

    .hidden {
        display: none;
    }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <div class="container1">
        <div class="form-container">
            <h2>Insert Trip</h2>
            <form id="insert-form" action="inventory.php" enctype="multipart/form-data" method="post">
                <label for="name">Nama Trip:</label>
                <input type="text" id="name" name="name" required>
                <label for="category">Kategori:</label>
                <select id="category-filter" name="category" required>
                    <option value="all">All</option>
                    <option value="Open Trip">Open Trip</option>
                    <option value="Private Trip">Private Trip</option>
                    <option value="Wisata Domestik">Wisata Domestik</option>
                    <option value="Wisata Internasional">Wisata Internasional</option>
                    <option value="Haji">Haji</option>
                    <option value="Umroh">Umroh</option>
                </select>
                <label for="description">Deskripsi:</label>
                <input type="text" id="description" name="description" required>
                <label for="price">Harga:</label>
                <input type="number" id="price" name="price" required min='0'>
                <label for="quantity">Jumlah Kuota:</label>
                <input type="number" id="quantity" name="quantity" required min='0'>
                <label for="image">Gambar:</label>
                <input type="file" name="photo" id="fileInput" required>
                <button name="ins" type="submit" class="insert-btn">simpan</button>
            </form>
        </div>
        <div class="search-container">
            <h2>Search Trip</h2>
            <form id="search-form" action="inventory.php" method="post">
                <label for="search">Search:</label>
                <input type="text" id="search" name="search">
                <label for="category-filter">Kategori:</label>
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
            <div class="inventory-container">
                <div id="product-list">

                <?php
                    if (isset($_GET['pidd'])) {
                        $id = $_GET['pidd'];
                        $query = "SELECT * FROM products WHERE pid = $id";

                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_assoc($result);
                        $pid = $row['pid'];
                        $pname = $row['pname'];
                        $desc = $row['description'];
                        $qty = $row['qtyavail'];
                        $price = $row['price'];
                        $cat = $row['category'];
                        $img = $row['img'];

                        echo "<form id='insert-form' action='inventory.php' enctype='multipart/form-data' method='post'>
                                <input type='number' style='display: none;' name='pid1' value=$pid>
                                <input type='text' style='display: none;' name='prevphoto' value=$img>
                                <input type='text' style='display: none;' name='prev' value=$cat>
                                <label for='name'>Product Nama:</label>
                                <input type='text' id='name' name='name1' value='$pname' required>
                                <label for='category'>Kategori:</label>
                                <select id='category-filter' name='category1'>
                                    <option value='all'>All</option>
                                    <option value='Open_Trip'>Open Trip</option>
                                    <option value='Private_Trip'>Private Trip</option>
                                    <option value='Wisata_Domestik'>Wisata Domestik</option>
                                    <option value='Wisata_Internasional'>Wisata Internasional</option>
                                    <option value='Umroh'>Umroh</option>
                                    <option value='Haji'>Haji</option>
                                </select>
                                <label for='description'>Deskripsi:</label>
                                <input type='text' id='description' name='description1' value='$desc' required>
                                <label for='price'>Harga:</label>
                                <input type='number' id='price' name='price1' value=$price required min='0'>
                                <label for='quantity'>jumlah:</label>
                                <input type='number' id='quantity' name='quantity1' value=$qty required min='0'>
                                <label for='image'>Gambar:</label>
                                <input type='file' name='photo1' id='fileInput'>
                                <button name='submitt' type='submit' class='insert-btn'>Simpan</button>
                            </form>";
                    }
					if (isset($_POST['search1'])) {
						$search = $_POST['search'];
						$category = $_POST['cat'];
						$query = "";
						if (!empty($search))
							$query = "select* from `products` where ((pname like '%$search%') or (category like '%$search%') or (description like '%$search%'))";
						else
							$query = "select * from `products`";

						if ($category != "all") {
							if (empty($search)) {
								$query = $query . "where category = '$category'";
							} else {
								$query = $query . "and category = '$category'";
							}
						}

						$result = mysqli_query($con, $query);

						if ($result) {
							echo "
										<table>
										<thead>
											<tr>
												<th>Nama Trip</th>
												<th>Deskripsi</th>
												<th>Kategori</th>
												<th>harga</th>
												<th>Jumlah Kuota</th>
												<th>Gambar</th>
												<th>Hapus</th>
												<th>Update</th>
											</tr>
										</thead>
										<tbody>
										";
						}
						while ($row = mysqli_fetch_assoc($result)) {
							$pid = $row['pid'];
							$pname = $row['pname'];
							$desc = $row['description'];
							$qty = $row['qtyavail'];
							$price = $row['price'];
							$cat = $row['category'];
							$img = $row['img'];

							echo "<tr>
										<td>$pname</td>
										<td style='max-width: 300px; max-height: 100px; overflow-x: auto; overflow-y: auto;'>$desc</td>
										<td>$cat</td>
										<td>$price</td>
										<td>$qty</td>
										<td><img src='product_images/$img' alt='' /></td>
									
										<td><a href ='inventory.php?pid=$pid' class='insert-btn'>Hapus</button></td>
										<td><a href ='inventory.php?pidd=$pid' class='insert-btn'>Update</button></td>

										</tr>";
						}

						if ($result) {
							echo "
										</tbody>
										</table>
										";
						}
					}
					?>


                </div>
            </div>

        </div>
    </div>



    <div class="container11">
        <div class="order-container">

            <h1>list Booking</h1>
            <div class="btns">
                <a href='inventory.php?a=1'><button id="all-btn">All</button></a>
                <a href='inventory.php?d=1'><button id="delivered-btn">Confirmed</button></a>
                <a href='inventory.php?u=1'><button id="undelivered-btn">Unconfirmed</button></a>

            </div>


            <table id="tab1" style="width: auto; margin: 0 auto;">
                <thead>
                    <tr>
                        <th> UserName</th>
                        <th>OrderID</th>
                        <th>BookingDate</th>
                        <th>BookingConfirm</th>
                        <th>PaymentMethod</th>
                        <th>Address</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					if (isset($_GET['d'])) {
						include("include/connect.php");
						$query = "SELECT * FROM orders join accounts on orders.aid = accounts.aid where datedel is not NULL";


						$result = mysqli_query($con, $query);

						while ($row = mysqli_fetch_assoc($result)) {
							$aname = $row['username'];
							$oid = $row['oid'];
							$dateod = $row['dateod'];
							$datedel = $row['datedel'];
							$add = $row['address'];
                            $pri = $row['total'];

							if (empty($datedel))
								$datedel = "Not Delivered";
							echo "
										

										<tr>
										<td>$aname</td>
										<td>$oid</td>
												<td>$dateod</td>
												<td>$datedel</td>
										<td>$pri</td>
										<td>$add</td>
										";
							if ($datedel == "Not Delivered")
								echo "<td><a href='inventory.php?odd=$oid'><button id='oupdate-btn'>SET</button></a></td>";


							echo "</tr>";
						}
					} elseif (isset($_GET['u'])) {
						include("include/connect.php");
						$query = "SELECT * FROM orders join accounts on orders.aid = accounts.aid where datedel is NULL";


						$result = mysqli_query($con, $query);

						while ($row = mysqli_fetch_assoc($result)) {
							$aname = $row['username'];
							$oid = $row['oid'];
							$dateod = $row['dateod'];
							$datedel = $row['datedel'];
							$add = $row['address'];
                            $pri = $row['total'];

							if (empty($datedel))
								$datedel = "Not Delivered";
							echo "
										

										<tr>
										<td>$aname</td>
										<td>$oid</td>
												<td>$dateod</td>
												<td>$datedel</td>
										<td>$pri</td>
										<td>$add</td>
										";
							if ($datedel == "Not Delivered")
								echo "<td><a href='inventory.php?odd=$oid'><button id='oupdate-btn'>SET</button></a></td>";


							echo "</tr>";
						}
					} elseif (isset($_GET['a'])) {
						include("include/connect.php");
						$query = "SELECT * FROM orders join accounts on orders.aid = accounts.aid";


						$result = mysqli_query($con, $query);

						while ($row = mysqli_fetch_assoc($result)) {
							$aname = $row['username'];
							$oid = $row['oid'];
							$dateod = $row['dateod'];
							$datedel = $row['datedel'];
							$add = $row['address'];
                            $pri = $row['total'];

							if (empty($datedel))
								$datedel = "Not Delivered";
							echo "
										

										<tr>
										<td>$aname</td>
										<td>$oid</td>
												<td>$dateod</td>
												<td>$datedel</td>
										<td>$pri</td>
										<td>$add</td>
										";
							if ($datedel == "Not Delivered")
								echo "<td><a href='inventory.php?odd=$oid'><button id='oupdate-btn'>SET</button></a></td>";


							echo "</tr>";
						}
					} else {

						include("include/connect.php");
						$query = "SELECT * FROM orders join accounts on orders.aid = accounts.aid";


						$result = mysqli_query($con, $query);

						while ($row = mysqli_fetch_assoc($result)) {
							$aname = $row['username'];
							$oid = $row['oid'];
							$dateod = $row['dateod'];
							$datedel = $row['datedel'];
							$add = $row['address'];
                            $pri = $row['total'];


							if (empty($datedel))
								$datedel = "Not Delivered";
							echo "
										

										<tr>
										<td>$aname</td>
										<td>$oid</td>
												<td>$dateod</td>
												<td>$datedel</td>
										<td>$pri</td>
										<td>$add</td>
										";
							if ($datedel == "Not Delivered")
								echo "<td><a href='inventory.php?odd=$oid'><button id='oupdate-btn'>CONFIRM</button></a></td>";


							echo "</tr>";
						}

					}
					?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

<script>
window.addEventListener("unload", function() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "logout.php", false);
  xhr.send();
});
</script>