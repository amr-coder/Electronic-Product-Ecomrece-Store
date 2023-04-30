<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
   <link rel="stylesheet" href="css/style1.css">
   <link rel="stylesheet" href="css/style.css">
   <title>Document</title>
</head>
<header class="header">

   <div class="flex">

      <a href="index.php" class="logo">Electronic <span>Gala</span></a>

      <nav class="navbar">
         <a href="index.php">Home</a>
         <a href="admin.php">add products</a>
         <a href="products.php">view products</a>
         <a href="checkout.php">Order Details</a>
      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>
<body>
   
</body>

</html>
