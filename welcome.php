<?php
include("database.php");



?>


<!DOCTYPE html>
<html lang="en">
<head>
<html lang="en">
  <head>
    <meta charset="UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scale=1.0">
    <title> Coffee Shop </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
  </head>
</head>
<body>
<header class="header">
      <a href="#" class="logo">
        <img src="images/logo.png" alt=""> 
      </a>

      <nav class="navbar">
            <a href="#menu"> Our menu </a>
        <a href="#products"> Our Products </a>
        <a href="Clientcontact.php"> Contact </a>
        <a href="index3.php"> Log-Out </a>
      </nav>

      <div class="icons">
        <div class="fas fa-search" id="search-btn"> </div>
        <div class="fas fa-shopping-cart" id="cart-btn"> </div>
        <div class="fas fa-bars" id="menu-btn"> </div> 

      <div class="search-form">
        <input type="search" id="search-box" placeholder="search here..." >
        <label for="search-box" class="fas fa-search"> </label>
       
      </div> 
    

      <div class="cart-items-container">

        

        

        

        
        <a href="#" class="btn"> checkout now </a>
     
      </div>
    </header>
    <section class="menu" id="menu"> 
     
     <h1 class="heading"> our <span> menu </span> </h1> 
     
     <div class="box-container" id="uploadedDataContainer"> 
       
       <div class="box item-1"> 
         <img src="images/coffe1.jpg" alt="">
         <h3> Cappuccino </h3>
         <div class="price"> $5.00  <span> $15.00 </span> </div>
         <a  class="btn" onclick="addHTML('Cappuccino','coffe1', '5.00')"> add to cart </a>
       </div>

       <div class="box"> 
         <img src="images/coffe2.jpg" alt="">
         <h3> Americano </h3>
         <div class="price"> $5.00  <span> $15.00 </span> </div>
         <a  class="btn " onclick="addHTML('Americano','coffe2' ,'5.00')"> add to cart </a>
       </div>

       <div class="box"> 
         <img src="images/coffe3.jpg" alt="">
         <h3> Espresso </h3>
         <div class="price"> $5.00  <span> $15.00 </span> </div>
         <a class="btn" onclick="addHTML('Espresso','coffe3' ,'5.00')"> add to cart </a>
       </div>

       <div class="box"> 
         <img src="images/coffe4.jpg" alt="">
         <h3> Caffè macchiato </h3>
         <div class="price"> $5.00  <span> $15.00 </span> </div>
         <a  class="btn" onclick="addHTML('Caffè macchiato','coffe4' ,'5.00')"> add to cart </a>
       </div>

       <div class="box"> 
         <img src="images/coffe5.jpg" alt="">
         <h3> Caffè mocha </h3>
         <div class="price"> $5.00 <span> $15.00 </span> </div>
         <a class="btn" onclick="addHTML('Caffe mocha','coffe5', '5.00')"> add to cart </a>
       
       </div>

       <div class="box"> 
         <img src="images/coffe6.jpg" alt="">
         <h3> Cortado </h3>
         <div class="price"> $5.00  <span> 15.00 </span> </div>
         <a class="btn" onclick="addHTML('Cortado','coffe6' , '5.00')"> add to cart </a>
         
       </div>
       <?php
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="box item-1">';
                echo '<img src="' . $row['image_path'] . '" alt="' . $row['name'] . '">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<div class="price">$' . $row['price'] . ' <span>$15.00</span></div>';
                echo '<a class="btn" onclick="addHTML(\'' . $row['name'] . '\', \'' . $row['image_path'] . '\', \'' . $row['price'] . '\')">add to cart</a>';
                echo '</div>';
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        ?>
     </div>

   </section>
   <section class="products" id="products">
      <h1 class="heading"> Morning <span> Menu </span></h1>

      <div class="box-container">
        <div class="box"> 
           <div class="icons">
            <a class="fas fa-shopping-cart" onclick="addHTML('Croassant & Coffee','Croassant' , '8.00');"> </a>
         
           </div>

           <div class="image">  
            <img src="images/Croassant.jpg" alt=""> <!-- ADD IMAGE --> 
           </div>

           <div class="content"> 
              <h3> Croassant & Coffee </h3>
              <div class="stars"> 
                <i class="fas fa-star"> </i>
                <i class="fas fa-star"> </i>
                <i class="fas fa-star"> </i>
                <i class="fas fa-star"> </i>
                <i class="fas fa-star-half-alt"> </i>
              </div>
              <div class="price"> $8.00 <span> $15.00 </span></div>
           </div>
        </div>

        <div class="box"> 
          <div class="icons">
           <a class="fas fa-shopping-cart"onclick="addHTML('Limon & Coffe','Limon', '9.00');"> </a>
         
          </div>

          <div class="image"> 
           <img src="images/Limon.jpg">
          </div>

          <div class="content"> 
             <h3> Limon & Coffee </h3>
             <div class="stars"> 
               <i class="fas fa-star"> </i>
               <i class="fas fa-star"> </i>
               <i class="fas fa-star"> </i>
               <i class="fas fa-star"> </i>
               <i class="fas fa-star-half-alt"> </i>
             </div>
             <div class="price"> $9.00 <span> $15.00 </span></div>
          </div>
       </div>

        <div class="box"> 
          <div class="icons">
         <a  class="fas fa-shopping-cart" onclick="addHTML('Chocolate & Coffee','Chocolate', '10.00');"> </a>
    
          </div>

          <div class="image"> 
         <img src="images/Chocolate.jpg">
          </div>

           <div class="content"> 
           <h3> Chocolate & Coffee </h3>
           <div class="stars"> 
             <i class="fas fa-star"> </i>
             <i class="fas fa-star"> </i>
             <i class="fas fa-star"> </i>
             <i class="fas fa-star"> </i>
             <i class="fas fa-star-half-alt"> </i>
           </div>
           <div class="price"> $10.00 <span> $15.00 </span></div>
          </div>
        

            </div>
          <!---duhet me add the morning menu knej 
        --><?php
        $query = "SELECT * FROM menu_items";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="box">';
                echo '<div class="icons">';
                echo '<a class="fas fa-shopping-cart" onclick="addHTML(\'' . $row['name'] . '\', \'' . $row['image_path'] . '\', \'' . $row['price'] . '\');"></a>';
                echo '</div>';
                echo '<div class="image">';
                echo '<img src="' . $row['image_path'] . '" alt="">';
                echo '</div>';
                echo '<div class="content">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<div class="stars">';
                // Your star rating goes here...
                echo '</div>';
                echo '<div class="price">$' . $row['price'] . '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            echo '</section>';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        
        ?>
           </div>
    </section>
    <div class="row"> 
    
    </div>
    
</body>
<script src = "script.js"> </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Use jQuery to load the PHP output into the specified element
        $(document).ready(function() {
            $('#uploadedDataContainer').load('get_uploaded_data.php');
        });
    </script>
</html>