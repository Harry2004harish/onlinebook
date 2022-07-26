<?php
include 'config.php';
session_start();
$user_id =$_SESSION['user_id'];
if(!isset($user_id)){
    header('location:login.php');

}
// update cart
if (isset($_POST['update_cart'])){
    $cart_id =$_POST['cart_id'];
    $cart_quantity=$_POST['cart_quantity'];
    mysqli_query($conn,"UPDATE `cart` SET quantity='$cart_quantity' where id ='$cart_id") or die ('query failed');
    $message[]='cart quantity updated';
}
//delete
if (isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id ='$delete_id")or die ('query failed');
    header('location:cart.php');
}
if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cart` where user_id ='$user_id'") or die('query failed');
    header('location:cart.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cart.css">
</head>

<body>
    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>product</td>
                    <td>Price</td>
                    <td>Quantiy</td>
                    <td>Subtotal</td>
                    <td>REMOVE</td>
                </tr>
            </thead>
            <tbody>
                <?php
         $grand_total = 0;
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
      ?>
                <tr>
                    <td><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt=""></td>
                    <td>
                        <div class="name"><?php echo $fetch_cart['name']; ?></div>
                    </td>
                    <td>
                        <div class="price">$<?php echo $fetch_cart['price']; ?>/-</div>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                            <input type="number" min="1" name="cart_quantity"
                                value="<?php echo $fetch_cart['quantity']; ?>">
                            <input type="submit" name="update_cart" value="update" class="option-btn">
                        </form>
                    </td>
                    <td>
                        <div class="sub-total"> sub total :
                            <span>$<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?>/-</span>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 2rem; text-align:center;">
                            <a href="cart.php?delete_all"
                                class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>"
                                onclick="return confirm('delete all from cart?');">delete all</a>
                        </div>
                    </td>
                </tr>
                <?php
      $grand_total += $sub_total;
         }
      }else{
         echo '<p class="empty">your cart is empty</p>';
      }
      ?>
            </tbody>
        </table>
    </section>

</body>

</html>