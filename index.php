<?php

include 'config.php';
session_start();
$user_id = $_SESSION['userid'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
      $message[] = 'product added to cart!';
   }

};

if(isset($_POST['update_cart'])){
   $update_quantity = $_POST['cart_quantity'];
   $update_id = $_POST['cart_id'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
   $message[] = 'cart quantity updated successfully!';
}

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
   header('location:index.php');
}
  
if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
  
   

</head>
<body>
   
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
<?php include 'header.php'; ?>
<div class="container">

<div class="user-profile">

   <?php
      $select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
   ?>

   <p> username : <span><?php echo $fetch_user['name']; ?></span> </p>
   <p> email : <span><?php echo $fetch_user['email']; ?></span> </p>
   <div class="flex">
      <a href="login.php" class="btn">login</a>
      <a href="register.php" class="option-btn">register</a>
      <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">logout</a>
   </div>


</div>
  <div class="fulimg">
      <img src="images/h2.jpg" alt="">
  </div>

<div class="products">
   <h1 class="heading">Products Gallary</h1>
   <!-- image fillte -->
   <div class="main">
   <div id="myBtnContainer">
  <button class="btn1 active" onclick="filterSelection('all')"> Show all</button>
  <button class="btn1" onclick="filterSelection('nature')">Home Accessories</button>
  <button class="btn1" onclick="filterSelection('cars')">HeadPhone & Accessories </button>
  <button class="btn1" onclick="filterSelection('people')">Smart Electronic Gadgets </button>
</div>

<!-- Portfolio Gallery Grid -->
<div class="row">
  <div class="column nature">
    <div class="content">
      <img src="images/home2.jpg" alt="" style="width:100%">
      <h4>Juicer & Blender</h4>
      <p>$45/-</p>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
      <img src="images/home6.jpg" alt="" style="width:100%">
      <h4>Electric Tiffon</h4>
      <p>$45/-</p>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
      <img src="images/home5.jpeg" alt="" style="width:100%">
      <h4>Cuisinart Griddler Dulance</h4>
      <p>$45/-</p>
    </div>
  </div>

  <div class="column cars">
    <div class="content">
      <img src="images/small4.jpg" alt="" style="width:100%">
      <h4>Retro</h4>
      <p>$45/-</p>
    </div>
  </div>
  <div class="column cars">
    <div class="content">
      <img src="images/small3.jpg" alt="" style="width:100%">
      <h4>Fast</h4>
      <p>$45/-</p>
    </div>
  </div>
  <div class="column cars">
    <div class="content">
      <img src="images/small2.jpg" alt="" style="width:100%">
      <h4>Classic</h4>
      <p>$45/-</p>
    </div>
  </div>

  <div class="column people">
    <div class="content">
      <img src="images/small1.jpg" alt="" style="width:100%">
      <h4>2 in 1 Design Combine Phone Holder</h4>
      <p>$45/-</p>
    </div>
  </div>
  <div class="column people">
    <div class="content">
      <img src="images/smart.jpg" alt="" style="width:100%">
      <h4>Clear Phone Apple iPhone 11 pro Max</h4>
      <p>$45/-</p>
    </div>
  </div>
  <div class="column people">
    <div class="content">
      <img src="images/sremote.jpg" alt="" style="width:100%">
      <h4>Electrical Music Instrument</h4>
      <p>$45/-</p>
    </div>
  </div>
<!-- END GRID -->
</div>
</div>
<!-- image fillterring end -->
<div class="fulimg">
      <img src="images/h1.jpg" alt="">
  </div>
   <h1 class="heading">latest products</h1>

   <div class="box-container">

   <?php
      $select_product = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
      if(mysqli_num_rows($select_product) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_product)){
   ?>
      <form method="post" class="box" action="">
         <img src="images/<?php echo $fetch_product['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_product['name']; ?></div>
         <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
        
         <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
         <div class="rating">
                    <i class="bi bi-star-fill"></i>               
                    <i class="bi bi-star-fill"></i>               
                    <i class="bi bi-star-fill"></i>               
                    <i class="bi bi-star-half"></i>
                    <i class="bi bi-star"></i>   
                  </div>       
        
                  <div class="flexbox">
        <input type="number" min="1" name="product_quantity" value="1">
         <input type="submit" value="add to cart" name="add_to_cart" class="btn">
        </div>
      </form>
   <?php
      };
   };
   ?>

   </div>

</div>
<br><br><br>
<div class="fulimg">
      <img src="images/h8.jpg" alt="">
  </div>
<div class="shopping-cart">

   <h1 class="heading">shopping cart</h1>

   <table>
      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>
      <tbody>
      <?php
         $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
      ?>
         <tr>
            <td><img src="images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>$<?php echo $fetch_cart['price']; ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                  <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                  <input type="submit" name="update_cart" value="update" class="option-btn">
               </form>
            </td>
            <td>$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
            <td><a href="index.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('remove item from cart?');">remove</a></td>
         </tr>
      <?php
         $grand_total += $sub_total;
            }
         }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
         }
      ?>
      <tr class="table-bottom">
         <td colspan="4">Grand Total :</td>
         <td>$<?php echo $grand_total; ?>/-</td>
         <td><a href="index.php?delete_all" onclick="return confirm('delete all from cart?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">delete all</a></td>
      </tr>
   </tbody>
   </table>

   <div class="cart-btn">  
      <a href="#" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
   </div>

</div>

</div>
<script>
   filterSelection("all")
   function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("column");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
</body>
<!-- footer -->
<footer class="footer">
       <div class="container">
           <div class="row">
                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">our services</a></li>
                        <li><a href="#">privacy policy</a></li>
                        <li><a href="#">affiliate program</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Get Help</h4>
                    <ul>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">shippings</a></li>
                        <li><a href="#">returns</a></li>
                        <li><a href="#">order status</a></li>
                        <li><a href="#">payment options</a></li>
                        
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Online Shop</h4>
                    <ul>
                        <li><a href="#">Home luxries</a></li>
                        <li><a href="#">Accesries</a></li>
                        <li><a href="#">Electronic</a></li>
                        <li><a href="#">Watches</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow Us</h4>
                    <ul>
                        <div class="social">
                            <div class="icons">
                                <i class="fa-brands fa-youtube"></i>
                                <i class="fa-brands fa-instagram"></i>
                                <i class="fa-brands  fa-facebook"></i>
                                <i class="fa-brands  fa-twitter"></i>
                                <i class="fa-brands  fa-linkedin"></i>
                            </div>                         
                        </div>
                                             
                    </ul>
                </div>
           </div>
       </div>
</footer>
</html>