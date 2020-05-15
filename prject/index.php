<!DOCTYPE html>
<html>

<head>
  <title>Love Connection</title>
  <link rel="icon" type="image/png" href="images/icon.png" type="text/css" />
  <link rel="stylesheet" href="css/home-style.css" type="text/css" />
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" type="text/css" />

  <?php include 'config.php';
  ?>

<body>


  <?php include 'views/header.php'; ?>
  <div class="container">

    <!-- Full-width images with caption text -->
    <div class="image-sliderfade fade">
      <img src="images/1.png" style="width:100%">
      <div class="text">On Love Connection, you’re more than just a photo. You have stories to tell, and passions to share, and things to talk about that are more interesting than the weather. Get noticed for who you are, not what you look like. Because you deserve what dating deserves: better.</div>
      <?php if (!isset($_SESSION['uid'])) : ?>
        <div class="button">
          <a href="signup.php">Join Now</a>
        </div>
      <?php endif; ?>
    </div>


    <div class="image-sliderfade fade">
      <img src="images/2.png" style="width:100%">
      <div class="text">On Love Connection, you’re more than just a photo. You have stories to tell, and passions to share, and things to talk about that are more interesting than the weather. Get noticed for who you are, not what you look like. Because you deserve what dating deserves: better.</div>

      <?php if (!isset($_SESSION['uid'])) : ?>
        <div class="button">
          <a href="signup.php">Join Now</a>
        </div>
      <?php endif; ?>

    </div>


    <div class="image-sliderfade fade">
      <img src="images/3.png" style="width:100%">
      <div class="text">On Love Connection, you’re more than just a photo. You have stories to tell, and passions to share, and things to talk about that are more interesting than the weather. Get noticed for who you are, not what you look like. Because you deserve what dating deserves: better.</div>
      <?php if (!isset($_SESSION['uid'])) : ?>
        <div class="button">
          <a href="signup.php">Join Now</a>
        </div>
      <?php endif; ?>
    </div>

    <div class="image-sliderfade fade">
      <img src="images/4.png" style="width:100%">
      <div class="text">On Love Connection, you’re more than just a photo. You have stories to tell, and passions to share, and things to talk about that are more interesting than the weather. Get noticed for who you are, not what you look like. Because you deserve what dating deserves: better.</div>
      <?php if (!isset($_SESSION['uid'])) : ?>
        <div class="button">
          <a href="signup.php">Join Now</a>
        </div>
      <?php endif; ?>
    </div>


  </div>
  <br>

  <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
  </div>


  <?php include 'views/footer.php'; ?>
  <script>
    var slideIndex = 0;
    showSlides(); // call showslide method 

    function showSlides() {
      var i;

      // get the array of divs' with classname image-sliderfade 
      var slides = document.getElementsByClassName("image-sliderfade");

      // get the array of divs' with classname dot 
      var dots = document.getElementsByClassName("dot");

      for (i = 0; i < slides.length; i++) {
        // initially set the display to  
        // none for every image. 
        slides[i].style.display = "none";
      }

      // increase by 1, Global variable 
      slideIndex++;

      // check for boundary 
      if (slideIndex > slides.length) {
        slideIndex = 1;
      }

      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.
        replace(" active", "");
      }

      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";

      // Change image every 2 seconds 
      setTimeout(showSlides, 3000);
    }
  </script>

</body>

</html>