<?php

include 'config.php';
session_start();

?>

<head>
    <link rel="stylesheet" href="usercss/home.css">
</head>
<?php
  $select_products = mysqli_query($conn, "SELECT * FROM `products` where id ='$_GET[pid]'") or die('query failed');
  if(mysqli_num_rows($select_products) > 0){
     while($fetch_products = mysqli_fetch_assoc($select_products)){
?>
<form action="" method="post">
    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="" width="100%" id="MainImg" alt="">
        </div>
        <div class="single-pro-details">
            <h6><a href="home.php">Home</a>/<a href="shop.php">Feature</a></h6>
            <h4>
                <div class="name"><?php echo $fetch_products['name']; ?></div>
            </h4>
            <h2>
                <div class="price">NRP <?php echo $fetch_products['price']; ?>/-</div>
            </h2>
            <button class="addtocart">Add to Cart</button>
            <h4>Product Details</h4>
            <p>
            <div class="product_desc"><br><?php echo $fetch_products['product_desc']; ?></div>
            </p>
        </div>
    </section>
</form>
<?php
     }
    }