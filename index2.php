<?php
include("database.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scale=1.0">
    <title> Coffee Shop </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  </head>
</head>
<body>
   <h1 class="heading"><span>Feeling</span> of our coffe</h1>
   <?php
$query = "SELECT * FROM about_us_content";
$result = mysqli_query($conn, $query);

// Check if there is data
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Output the HTML with the fetched data
        echo '<section class="about" id="about">';
        echo '<div class="row">';
        echo '<div class="image">';
        echo '<img src="' . $row['image_path'] . '" alt="About Us Image">';
        echo '</div>';
        echo '<div class="content">';
        echo '<h3>' . $row['heading'] . '</h3>';
        echo '<p>' . $row['content'] . '<span style="padding-left: 200%;">  added by our admin ' . $row['added_by'] . '</span></p>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
    }
} else {
    // Handle the case where there is no data
    echo '<p>No content available</p>';
}

// Close the database connection
mysqli_close($conn);
?>

      
      



</body>
</html>