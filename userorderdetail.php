<?php

include 'config.php';

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};
?>

<body>
    <h1 class="title">placed orders</h1>
    <section id="cart-container" class="container1 my-5">
        <table width="80%">
            <thead>
                <tr>
                    <td> placed on </td>
                    <td> total products</td>
                    <td> total price </td>
                    <td> payment method </td>
                    <td>Payment Status</td>
                </tr>
            </thead>
            <?php
        
$select_orders = mysqli_query($conn, "SELECT * FROM `orders`where user_id='$user_id'") or die('query failed');
if(mysqli_num_rows($select_orders) > 0){
 while($fetch_orders = mysqli_fetch_assoc($select_orders)){
?>
            <tr>
                <td><?php echo $fetch_orders['placed_on']; ?> </td>
                <td><?php echo $fetch_orders['total_products']; ?></td>
                <td>$<?php echo $fetch_orders['total_price']; ?>/- </td>
                <td><?php echo $fetch_orders['method']; ?></td>
                <td><?php echo $fetch_orders['payment_status']; ?></span></td>
            </tr>
        </table>
    </section>
    <?php
 }
}else{
 echo '<p class="empty">no orders placed yet!</p>';
}
?>
</body>