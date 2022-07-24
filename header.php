<!-- <?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?> -->

<head>
    <link rel="stylesheet" href="usercss/home.css">
</head>

<header class="header">
    <div class="header-1">
        <a href="#" class="logo"><i class=" fas fa-book"></i>bookly</a>
        <form action="" class="search-form">
            <input type="search" name="" placeholder="Search Here" id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-shopping-cart cart"></a>
            <a href="userlogin.html" id="login-btn" class="fas fa-user"></a>
        </div>
    </div>

    <!-- navi -->
    <div class="header-2">
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="feature.php">Featured</a>
            <a href="shop.php">Shop</a>
            <a href="latestproduct.php">latest product</a>
            <a href="#blogs">blogs</a>
        </nav>

    </div>
</header>